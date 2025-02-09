<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['image', 'category_id', 'brand_id', 'display_order', 'stock', 'status', 'created_at'];


    /**
     * @return MorphMany
     */
    public function webTranslations(): MorphMany
    {
        return $this->morphMany(WebTranslation::class, 'translatable');
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->attributes['category_id'];
    }

    /**
     * @param int $value
     * @return void
     */
    public function setCategoryId(int $value): void
    {
        $this->attributes['category_id'] = $value;
    }

    public function getBrandId(): int
    {
        return $this->attributes['brand_id'];
    }

    public function setBrandId(int $value): void
    {
        $this->attributes['brand_id'] = $value;
    }

    public function getDisplayOrder(): int
    {
        return $this->attributes['display_order'];
    }

    public function setDisplayOrder(int $value): void
    {
        $this->attributes['display_order'] = $value;
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function setStock(int $value): void
    {
        $this->attributes['stock'] = $value;
    }

    public function getStatus(): bool
    {
        return $this->attributes['status'];
    }

    public function setStatus(bool $value): void
    {
        $this->attributes['status'] = $value;
    }
}
