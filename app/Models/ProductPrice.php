<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPrice extends Model
{
    use HasFactory;

    protected $table = 'product_prices';

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return BelongsTo
     */
    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->attributes['product_id'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setProductId($value): void
    {
        $this->attributes['product_id'] = $value;
    }

    /**
     * @return int
     */
    public function getProductVariantId(): int
    {
        return $this->attributes['product_variant_id'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setProductVariantId($value): void
    {
        $this->attributes['product_variant_id'] = $value;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setPrice($value): void
    {
        $this->attributes['price'] = $value;
    }

    /**
     * @return float
     */
    public function getSalePrice(): float
    {
        return $this->attributes['sale_price'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setSalePrice($value): void
    {
        $this->attributes['sale_price'] = $value;
    }

    /**
     * @return float
     */
    public function getTaxPrice(): float
    {
        return $this->attributes['tax_price'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setTaxPrice($value): void
    {
        $this->attributes['tax_price'] = $value;
    }

    /**
     * @return float
     */
    public function getTaxSalePrice(): float
    {
        return $this->attributes['tax_sale_price'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setTaxSalePrice($value): void
    {
        $this->attributes['tax_sale_price'] = $value;
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->attributes['discount'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setDiscount($value): void
    {
        $this->attributes['discount'] = $value;
    }

    /**
     * @return int
     */
    public function getDiscountType(): int
    {
        return $this->attributes['discount_type'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setDiscountType($value): void
    {
        $this->attributes['discount_type'] = $value;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->attributes['currency'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setCurrency($value): void
    {
        $this->attributes['currency'] = $value;
    }

}
