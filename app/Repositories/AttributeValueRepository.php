<?php

namespace App\Repositories;

use App\Models\AttributeValue;
use Illuminate\Support\Facades\Redis;
use App\Interfaces\RepositoryInterface;
use Exception;

class AttributeValueRepository implements RepositoryInterface
{
    /**
     * @param ?string $language
     * @return mixed
     */
    public function getAllData(?string $language): mixed
    {
        $redisKey = 'attributes_values_list';

        $attributesValues = Redis::get($redisKey);

        if ($attributesValues) {
            return json_decode($attributesValues, true);
        } else {
            $attributesValues = AttributeValue::with(['webTranslations' => function ($query) use ($language) {
                $query->where('language_code', $language);
            }])->where('attribute_id',0)->orderBy('display_order', 'DESC')->get()->toArray();
            Redis::setex($redisKey, 3600, json_encode($attributesValues));
            return $attributesValues;
        }
    }

    /**
     * @param int $id
     * @param string $where
     * @return mixed
     */
    public function getFindById(int $id,string $where = 'id'): mixed
    {
        return AttributeValue::with(['webTranslations'])->where($where, $id)->orderBy('display_order', 'DESC')->get()->toArray();
    }

    /**
     * @param array $data
     * @return AttributeValue
     */
    public function create(array $data): AttributeValue
    {
        return AttributeValue::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return AttributeValue
     * @throws Exception
     */
    public function update(int $id, array $data): AttributeValue
    {
        $attributesValue = AttributeValue::find($id);
        if (!$attributesValue) {
            throw new Exception("AttributeValue not found.");
        }
        $attributesValue->update($data);
        return $attributesValue;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return AttributeValue::destroy($id);
    }

}
