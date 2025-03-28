<?php

namespace App\Services;

use App\Interfaces\RepositoryInterface;
use App\Models\Category;

class CategoryService
{
    protected RepositoryInterface $categoryRepository;
    const LANGUAGE = 'TR';

    public function __construct(RepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategoryData(): object
    {
        $categories = $this->categoryRepository->getAllData(self::LANGUAGE);
        return $this->categoryDatatableFormat($categories);
    }

    private function categoryDatatableFormat($categories): object
    {
        return collect($categories)->map(function ($category) {
            return (object)[
                'id' => $category['id'],
                'name' => $category['web_translations'][0]['name'] ?? '',
                'slug' => $category['web_translations'][0]['slug'] ?? '',
                'status' => $category['status'],
            ];
        });
    }

    public function getCategory(int $id): array
    {
        return $this->categoryRepository->getFindById($id);
    }

    public function getAllCategory(): array
    {
        $categories = $this->categoryRepository->getAllData(self::LANGUAGE);

        return $this->categorySelectFormat($categories);
    }

    private function categorySelectFormat($categories): array
    {
        $formattedCategories = $this->formatCategories($categories);

        return $this->buildCategorySelect($formattedCategories);
    }

    private function formatCategories($categories): array
    {
        $categoryMap = [];

        foreach ($categories as $category) {
            $categoryMap[$category['parent_id']][] = $category;
        }

        return $categoryMap;
    }

    private function buildCategorySelect($categoryMap, $parentId = 0, $prefix = ''): array
    {
        $formattedCategories = [];

        if (isset($categoryMap[$parentId])) {
            foreach ($categoryMap[$parentId] as $category) {

                $formattedCategories[] = [
                    'id' => $category['id'],
                    'name' => $prefix . $category['web_translations'][0]['name'] ?? 'No Name',
                ];

                $formattedCategories = array_merge($formattedCategories, $this->buildCategorySelect($categoryMap, $category['id'], $prefix . '--'));
            }
        }

        return $formattedCategories;
    }

    public function categoryCreate(array $data): Category
    {
        $imagePath = $this->storeImage($data['image'] ?? null);
        $smallImagePath = $this->storeImage($data['small_image'] ?? null);
        $iconPath = $this->storeImage($data['icon'] ?? null);

        return $this->categoryRepository->create([
            'parent_id' => $data['parent_id'],
            'display_order' => $data['display_order'],
            'status' => $data['status'],
            'image' => $imagePath,
            'small_image' => $smallImagePath,
            'icon' => $iconPath
        ]);
    }

    private function storeImage($image)
    {
        if ($image) {
            return $image->store('images/category', 'public');
        }
        return null;
    }

    public function categoryUpdate(int $id, array $data): Category
    {
        $updateData = [
            'parent_id' => $data['parent_id'],
            'display_order' => $data['display_order'],
            'status' => $data['status'],
        ];

        if (!empty($data['image'])) {
            $updateData['image'] = $this->storeImage($data['image']);
        }

        if (!empty($data['small_image'])) {
            $updateData['small_image'] = $this->storeImage($data['small_image']);
        }

        if (!empty($data['icon'])) {
            $updateData['icon'] = $this->storeImage($data['icon']);
        }

        return $this->categoryRepository->update($id, $updateData);
    }

    public function delete(int $categoryId): bool
    {
        return $this->categoryRepository->delete($categoryId);
    }
}
