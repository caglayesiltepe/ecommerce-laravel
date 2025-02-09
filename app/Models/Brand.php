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
        return $this->morphMany(WebTranslation::class, 'translatable');
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->attributes['logo'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setLogo(string $value): void
    {
        $this->attributes['logo'] = $value;
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
     * @return int
     */
    public function getStatus(): int
    {
        return $this->attributes['status'];
    }

    /**
     * @param int $value
     * @return void
     */
    public function setStatus(int $value): void
    {
        $this->attributes['status'] = $value;
    }
}
