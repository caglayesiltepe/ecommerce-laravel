<?php

namespace App\Services;

use App\Interfaces\RepositoryInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductService
{
    protected RepositoryInterface $productRepository;
    const LANGUAGE = 'TR';

    public function __construct(RepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProductData(): object
    {
        $products = $this->productRepository->getAllData(self::LANGUAGE);
        return $this->productDatatableFormat($products);
    }

    private function productDatatableFormat($products): object
    {
        return collect($products)->map(function ($product) {
            return (object)[
                'id' => $product['id'],
                'name' => $product['web_translations'][0]['name'] ?? '',
                'slug' => $product['web_translations'][0]['slug'] ?? '',
                'category' => $product['category']['web_translations'][0]['name'] ?? '',
                'brand' => $product['brand']['web_translations'][0]['name'] ?? '',
                'stock' => $product['stock'],
                'status' => $product['status'],
            ];
        });
    }

    public function getProduct(int $id): array
    {
        return $this->productRepository->getFindById($id);
    }

    public function productCreate(array $data): Product
    {
        $imagePath = $this->storeImage($data['image'] ?? null);

        return $this->productRepository->create([
            'category_id' => $data['category_id'],
            'brand_id' => $data['brand_id'],
            'display_order' => $data['display_order'],
            'status' => $data['status'],
            'image' => $imagePath,
            'stock' => $data['stock']
        ]);
    }

    private function storeImage($image)
    {
        if ($image) {
            return $image->store('images/product', 'public');
        }
        return null;
    }

    public function productUpdate(int $id, array $data): Product
    {
        $updateData = [
            'category_id' => $data['category_id'],
            'brand_id' => $data['brand_id'],
            'display_order' => $data['display_order'],
            'status' => $data['status'],
            'stock' => $data['stock']
        ];

        if (!empty($data['image'])) {
            $updateData['image'] = $this->storeImage($data['image']);
        }

        return $this->productRepository->update($id, $updateData);
    }

    public function delete(int $productId): bool
    {
        return $this->productRepository->delete($productId);
    }

    public function createPrice(Model $model, $request): void
    {
        $priceData = $this->priceData($request);

        foreach ($priceData as $languageCode => $data) {
            $model->prices()->create([
                'price' => $data['price'] ?? 0,
                'sale_price' => $data['sale_price'] ?? 0,
                'tax_price' => $data['tax_price'] ?? 0,
                'tax_sale_price' => $data['tax_sale_price'] ?? 0,
                'discount' => $data['discount'] ?? 0,
                'discount_type' => $data['discount_type'] ?? 0,
                'currency' => strtoupper($languageCode),
            ]);
        }
    }

    public function createVariant(Model $model, $attributeValueIds, $request)
    {
        foreach ($attributeValueIds as $key => $value) {
            $attributeId = explode('_', $key)[0];

            foreach ($value as $attributeValueId) {
                $sku = $request->get("{$attributeId}_attribute_value_sku") ?? null;
                $ean = $request->get("{$attributeId}_attribute_value_ean") ?? null;
                $stock = $request->get("{$attributeId}_attribute_value_stock") ?? 0;

                $model->variants()->create([
                    'attribute_value_id' => $attributeValueId,
                    'sku' => $sku,
                    'ean' => $ean,
                    'stock' => $stock,
                    'display_order' => 1,
                    'status' => 1
                ]);
            }
        }
    }



    private function priceData($request): array
    {
        return collect($request->all())
            ->filter(function ($value, $key) {
                return preg_match('/^(\w{3})_(price|sale_price|tax_price|tax_sale_price|discount|discount_type)$/', $key);
            })
            ->mapToGroups(function ($value, $key) {
                preg_match('/^(\w{3})_(price|sale_price|tax_price|tax_sale_price|discount|discount_type)$/', $key, $matches);
                return [$matches[1] => [$matches[2] => $value]];
            })
            ->map(function ($items) {
                return array_merge(...$items);
            })->toArray();
    }
}
