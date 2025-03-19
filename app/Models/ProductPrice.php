<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ProductPrice extends Model
{
    use HasFactory;

    protected $table = 'product_prices';

    protected $fillable = ['price','sale_price','tax_price','tax_sale_price','discount','discount_type','currency'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @return MorphTo
     */
    public function pricesable(): MorphTo
    {
        return $this->morphTo();
    }

}
