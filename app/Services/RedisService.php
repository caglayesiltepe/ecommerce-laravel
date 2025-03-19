<?php

namespace App\Services;

use App\Repositories\RedisRepository;

class RedisService
{
    protected RedisRepository $redisRepository;

    public function __construct(RedisRepository $redisRepository)
    {
        $this->redisRepository = $redisRepository;
    }

    public function getCache(string $key): ?array
    {
        return $this->redisRepository->getCachedData($key);
    }

    public function cacheCreate(array $data): void
    {
        $this->redisRepository->setRedisCache($data);
    }

    public function cacheDelete(string $redisKey): void
    {
        $this->redisRepository->delRedisCache($redisKey);
    }
}
