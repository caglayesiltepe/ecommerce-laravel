<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductVariant extends Model
{
    use HasFactory;

    protected $table = 'product_variants';

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return HasMany
     */
    public function attribute(): HasMany{
        return $this->HasMany(AttributeValue::class);
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->attributes['product_id'];
    }

    /**
     * @param int $value
     * @return void
     */
    public function setProductId(int $value): void
    {
        $this->attributes['product_id'] = $value;
    }

    /**
     *
     * @return int
     */
    public function getAttributeValueId(): int
    {
        return $this->attributes['attribute_value_id'];
    }

    /**
     *
     * @param int $value
     * @return void
     */
    public function setAttributeValueId(int $value): void
    {
        $this->attributes['attribute_value_id'] = $value;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    /**
     * @param int $value
     * @return void
     */
    public function setStock(int $value): void
    {
        $this->attributes['stock'] = $value;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->attributes['sku'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setSku(string $value): void
    {
        $this->attributes['sku'] = $value;
    }

    /**
     * @return string
     */
    public function getEan(): string
    {
        return $this->attributes['ean'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setEan(string $value): void
    {
        $this->attributes['ean'] = $value;
    }

    /**
     * @return int
     */
    public function getDisplayOrder(): int
    {
        return $this->attributes['display_order'];
    }

    /**
     * @param int $value
     * @return void
     */
    public function setDisplayOrder(int $value): void
    {
        $this->attributes['display_order'] = $value;
    }

    /**
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->attributes['status'];
    }

    /**
     * @param bool $value
     * @return void
     */
    public function setStatus(bool $value): void
    {
        $this->attributes['status'] = $value;
    }
}
