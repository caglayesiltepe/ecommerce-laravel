<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Redis;

class RedisRepository
{
    /**
     * @param ?string $redisKey
     * @return ?array
     */
    public function getCachedData(?string $redisKey): ?array
    {
        $redisCache = Redis::get($redisKey);

        return $redisCache ? json_decode($redisCache, true) : null;
    }

    /**
     * @param array $data
     * @return void
     */
    public function setRedisCache(array $data): void
    {
         Redis::setex($data['redisKey'], $data['time'], json_encode($data['data']));
    }

    /**
     * @param string $redisKey
     * @return void
     */
    public function delRedisCache(string $redisKey): void
    {
         Redis::del($redisKey);
    }
}
