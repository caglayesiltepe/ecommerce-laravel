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
     * @return MorphMany
     */
    public function prices():MorphMany
    {
        return $this->morphMany(ProductPrice::class, 'pricesable');
    }

    /**
     * @return MorphMany
     */
    public function variants(): MorphMany
    {
        return $this->morphMany(ProductVariant::class, 'varianttable');
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

}
