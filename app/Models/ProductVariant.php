<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ProductVariant extends Model
{
    use HasFactory;

    protected $table = 'product_variants';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $fillable = ['product_id', 'attribute_value_id', 'ean','stock','sku','display_order','status'];

    /**
     * @return HasMany
     */
    public function attribute(): HasMany{
        return $this->HasMany(AttributeValue::class);
    }


    /**
     * @return MorphTo
     */
    public function varianttable(): MorphTo
    {
        return $this->morphTo();
    }

}
