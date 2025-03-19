<?php

namespace App\Services;

use App\Interfaces\RepositoryInterface;
use App\Models\Brand;

class BrandService
{
    protected RepositoryInterface $brandRepository;
    const LANGUAGE = 'TR';

    public function __construct(RepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function getAllBrandData(): object
    {
        $brands = $this->brandRepository->getAllData(self::LANGUAGE);
        return $this->brandDatatableFormat($brands);
    }

    private function brandDatatableFormat($brands): object
    {
        return collect($brands)->map(function ($brand) {
            return (object)[
                'id' => $brand['id'],
                'name' => $brand['web_translations'][0]['name'] ?? '',
                'slug' => $brand['web_translations'][0]['slug'] ?? '',
                'logo' => $brand['logo'],
                'status' => $brand['status'],
            ];
        });
    }

    public function getBrand(int $id): array
    {
        return $this->brandRepository->getFindById($id);
    }

    public function brandCreate(array $data): Brand
    {
        $logoPath = $this->storeImage($data['logo'] ?? null);

        return $this->brandRepository->create([
            'display_order' => $data['display_order'],
            'status' => $data['status'],
            'logo' => $logoPath,
        ]);
    }

    private function storeImage($image)
    {
        if ($image) {
            return $image->store('images/brand', 'public');
        }
        return null;
    }

    public function brandUpdate(int $id, array $data): Brand
    {
        $updateData = [
            'display_order' => $data['display_order'],
            'status' => $data['status'],
        ];

        if (!empty($data['logo'])) {
            $updateData['logo'] = $this->storeImage($data['logo']);
        }

        return $this->brandRepository->update($id, $updateData);
    }

    public function delete(int $brandId): bool
    {
        return $this->brandRepository->delete($brandId);
    }
    public function getAllBrand(): array
    {
        $brands =  $this->brandRepository->getAllData(self::LANGUAGE);
        return $this->brandSelectFormat($brands);
    }

    private function brandSelectFormat($brands): array
    {
        $formattedBrands = [];

        if (!empty($brands)) {
            foreach ($brands as $brand) {

                $formattedBrands[] = [
                    'id' => $brand['id'],
                    'name' => $brand['web_translations'][0]['name'] ?? 'No Name',
                ];

            }
        }

        return $formattedBrands;
    }
}
