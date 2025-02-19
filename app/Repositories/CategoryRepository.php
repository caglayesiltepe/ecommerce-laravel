<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\Redis;
use App\Interfaces\RepositoryInterface;
use Exception;

class CategoryRepository implements RepositoryInterface
{
    /**
     * @param ?string $language
     * @return mixed
     */
    public function getAllData(?string $language): mixed
    {
        $redisKey = 'categories_list';

        $categories = Redis::get($redisKey);

        if ($categories) {
            return json_decode($categories, true);
        } else {
            $categories = Category::with(['webTranslations' => function ($query) use ($language) {
                $query->where('language_code', $language);
            }])->get()->toArray();
            Redis::setex($redisKey, 3600, json_encode($categories));
            return $categories;
        }
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getFindById(int $id): mixed
    {
        return Category::with(['webTranslations'])->where('id', $id)->get()->toArray();
    }

    /**
     * @param array $data
     * @return Category
     */
    public function create(array $data): Category
    {
        return Category::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Category
     * @throws Exception
     */
    public function update(int $id, array $data): Category
    {
        $category = Category::find($id);
        if (!$category) {
            throw new Exception("Category not found.");
        }
        $category->update($data);
        return $category;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return Category::destroy($id);
    }
}
