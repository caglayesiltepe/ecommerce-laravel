<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class WebTranslation extends Model
{
    use HasFactory;

    protected $table = 'web_translations';

    protected $fillable = [
        'translatable_id',
        'name',
        'slug',
        'short_description',
        'description',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'language_code',
        'translatable_type'
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @return MorphTo
     */
    public function translatable(): MorphTo
    {
        return $this->morphTo();
    }
}
