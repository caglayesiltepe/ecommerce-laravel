<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'parent_id',
        'display_order',
        'image',
        'small_image',
        'icon',
        'status',
    ];

    /**
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * @return int
     */
    public function getParentId(): int
    {
        return $this->attributes['parent_id'];
    }

    /**
     * @param int $id
     * @return void
     */
    public function setParentId(int $id): void
    {
        $this->attributes['parent_id'] = $id;
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
     * @return string
     */
    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setImage(string $value): void
    {
        $this->attributes['image'] = $value;
    }

    /**
     * @return string
     */
    public function getSmallImage(): string
    {
        return $this->attributes['small_image'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setSmallImage(string $value): void
    {
        $this->attributes['small_image'] = $value;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->attributes['icon'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setIcon(string $value): void
    {
        $this->attributes['icon'] = $value;
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
