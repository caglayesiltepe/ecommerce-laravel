<?php

namespace App\Repositories;

use App\Models\Product;
use App\Services\RedisService;
use App\Interfaces\RepositoryInterface;
use Exception;

class ProductRepository implements RepositoryInterface
{
    protected RedisService $redisService;
    const REDIS_LIST_KEY = 'products_list';

    public function __construct(RedisService $redisService)
    {
        $this->redisService = $redisService;
    }

    /**
     * @param ?string $language
     * @return mixed
     */
    public function getAllData(?string $language): mixed
    {
        $products = $this->redisService->getCache(self::REDIS_LIST_KEY);

        if ($products) {
            return $products;
        } else {
            $products = Product::with([
                'webTranslations' => function ($query) use ($language) {
                    $query->where('language_code', $language);
                },
                'category.webTranslations' => function ($query) use ($language) {
                    $query->where('language_code', $language);
                },
                'brand.webTranslations' => function ($query) use ($language) {
                    $query->where('language_code', $language);
                }
            ])->orderBy('display_order', 'DESC')->get()->toArray();

            if ($products) {
                $this->redisService->cacheCreate(['redisKey' => self::REDIS_LIST_KEY, 'time' => 3600, 'data' => $products]);
            }
            return $products;
        }
    }

    /**
     * @param int $id
     * @param string $where
     * @return mixed
     */
    public function getFindById(int $id,string $where = 'id'): mixed
    {
        return Product::with(['webTranslations', 'category.webTranslations', 'brand.webTranslations','prices'])->where($where, $id)->orderBy('display_order', 'DESC')->get()->toArray();
    }

    /**
     * @param array $data
     * @return Product
     */
    public function create(array $data): Product
    {
        $this->redisService->cacheDelete(self::REDIS_LIST_KEY);
        return Product::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Product
     * @throws Exception
     */
    public function update(int $id, array $data): Product
    {
        $this->redisService->cacheDelete(self::REDIS_LIST_KEY);
        $product = Product::find($id);
        if (!$product) {
            throw new Exception("Product not found.");
        }
        $product->update($data);
        return $product;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $this->redisService->cacheDelete(self::REDIS_LIST_KEY);
        return Product::destroy($id);
    }
}
