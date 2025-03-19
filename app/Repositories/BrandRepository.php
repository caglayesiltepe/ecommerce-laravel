<?php

namespace App\Repositories;

use App\Models\Brand;
use Illuminate\Support\Facades\Redis;
use App\Interfaces\RepositoryInterface;
use Exception;

class BrandRepository implements RepositoryInterface
{
    /**
     * @param ?string $language
     * @return mixed
     */
    public function getAllData(?string $language): mixed
    {
        $redisKey = 'brands_list';

        $brands = Redis::get($redisKey);

        if ($brands) {
            return json_decode($brands, true);
        } else {
            $brands = Brand::with([
                'webTranslations' => function ($query) use ($language) {
                    $query->where('language_code', $language);
                },
            ])->orderBy('display_order', 'DESC')->get()->toArray();

            Redis::setex($redisKey, 3600, json_encode($brands));
            return $brands;
        }
    }

    /**
     * @param int $id
     * @param string $where
     * @return mixed
     */
    public function getFindById(int $id,string $where = 'id'): mixed
    {
        return Brand::with(['webTranslations'])->where($where, $id)->orderBy('display_order', 'DESC')->get()->toArray();
    }

    /**
     * @param array $data
     * @return Brand
     */
    public function create(array $data): Brand
    {
        return Brand::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Brand
     * @throws Exception
     */
    public function update(int $id, array $data): Brand
    {
        $brand = Brand::find($id);
        if (!$brand) {
            throw new Exception("Brand not found.");
        }
        $brand->update($data);
        return $brand;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return Brand::destroy($id);
    }
}
