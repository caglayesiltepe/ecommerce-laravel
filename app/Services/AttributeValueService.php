<?php

namespace App\Services;

use App\Interfaces\RepositoryInterface;
use App\Models\attributeValue;

class AttributeValueService
{
    protected RepositoryInterface $attributeValueRepository;
    const LANGUAGE = 'TR';

    public function __construct(RepositoryInterface $attributeValueRepository)
    {
        $this->attributeValueRepository = $attributeValueRepository;
    }

    public function getAllAttributeValueData(): object
    {
        $attributeValues = $this->attributeValueRepository->getAllData(self::LANGUAGE);
        return $this->attributeValueDatatableFormat($attributeValues);
    }

    private function attributeValueDatatableFormat($attributeValues): object
    {
        return collect($attributeValues)->map(function ($attributeValue) {
                return (object)[
                    'id' => $attributeValue['id'],
                    'name' => $attributeValue['web_translations'][0]['name'] ?? '',
                    'status' => $attributeValue['status'],
                ];
        })->filter();
    }

    public function getAttributeValue(int $id): array
    {
        $attributes =  $this->attributeValueRepository->getFindById($id,'attribute_id');
        return $this->attributeValuesSelectFormat($attributes);
    }

    public function getAllAttributeValue(): array
    {
        $attributeValues = $this->attributeValueRepository->getAllData(self::LANGUAGE);
        return $this->attributeValueSelectFormat($attributeValues);
    }

    private function attributeValueSelectFormat($attributeValues): array
    {
        $formattedAttributeValues = $this->formatAttributeValues($attributeValues);

        return $this->buildattributeValueSelect($formattedAttributeValues);
    }

    private function attributeValuesSelectFormat($attributeValues):array
    {
        $attributeValueMap = [];
        foreach ($attributeValues as $attributeValue) {
            $attributeValueMap[] = ['id'=>$attributeValue['id'],'name'=>$attributeValue['web_translations'][0]['name'] ?? 'No Name'];
        }

        return $attributeValueMap;
    }

    private function formatAttributeValues($attributeValues): array
    {
        $attributeValueMap = [];
        foreach ($attributeValues as $attributeValue) {
            $attributeValueMap[$attributeValue['attribute_id']][] = $attributeValue;
        }

        return $attributeValueMap;
    }

    private function buildAttributeValueSelect($attributeValueMap, $parentId = 0, $prefix = ''): array
    {
        $formattedAttributeValues = [];

        if (isset($attributeValueMap[$parentId])) {
            foreach ($attributeValueMap[$parentId] as $attributeValue) {

                $formattedAttributeValues[] = [
                    'id' => $attributeValue['id'],
                    'name' => $prefix . $attributeValue['web_translations'][0]['name'] ?? 'No Name',
                ];

                $formattedAttributeValues = array_merge($formattedAttributeValues, $this->buildAttributeValueSelect($attributeValueMap, $attributeValue['id'], $prefix . '--'));
            }
        }

        return $formattedAttributeValues;
    }

    public function attributeValueCreate(array $data): attributeValue
    {
        return $this->attributeValueRepository->create([
            'attribute_id' => $data['attribute_id'],
            'extra' => $data['extra'],
            'display_order' => $data['display_order'],
            'status' => $data['status'],
        ]);
    }


    public function attributeValueUpdate(int $id, array $data): attributeValue
    {
        $updateData = [
            'attribute_id' => $data['attribute_id'],
            'extra' => $data['extra'],
            'display_order' => $data['display_order'],
            'status' => $data['status'],
        ];

        return $this->attributeValueRepository->update($id, $updateData);
    }

    public function delete(int $attributeValueId): bool
    {
        return $this->attributeValueRepository->delete($attributeValueId);
    }

}
