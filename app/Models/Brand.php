<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    /**
     * @return MorphMany
     */
    public function webTranslations(): MorphMany
    {
        return $this->morphMany(WebTranslation::class, 'translatable', 'type', 'foreign_id');
    }
}
