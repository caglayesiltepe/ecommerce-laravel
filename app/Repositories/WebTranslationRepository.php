<?php

namespace App\Repositories;

use App\Models\WebTranslation;
use Illuminate\Support\Facades\Redis;
use App\Interfaces\RepositoryInterface;

class WebTranslationRepository implements RepositoryInterface
{
    /**
     * @param ?string $language
     * @return mixed
     */
    public function getAllData(?string $language):mixed
    {
       /* $redisKey = 'categories_list';

        $categories = Redis::get($redisKey);

        if ($categories) {
            return json_decode($categories, true);
        } else {
            $categories = Category::with(['webTranslations' => function ($query) use ($language) {
                $query->where('language', $language);
            }])->get();

            Redis::setex($redisKey, 3600, json_encode($categories));
            return $categories;
        }*/

        $webTranslations ='';
        return $webTranslations;


    }

    /**
     * @param int $id
     * @return Category
     */
    public function getFindById(int $id) :Category
    {
        return Category::findOrFail($id);
    }

    /**
     * @param array $data
     * @return Category
     */
    public function create(array $data):Category
    {
        return Category::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Category
     */
    public function update(int $id, array $data):Category
    {
        $category = Category::findOrFail($id);
        $category->update($data);
        return $category;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id):bool
    {
        return Category::destroy($id);
    }
}
