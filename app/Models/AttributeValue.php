<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttributeValue extends Model
{
    use HasFactory;

    protected $table = 'attribute_values';

    protected $fillable = ['attribute_id', 'extra', 'display_order', 'status'];

    /**
     * @return int
     */
    public function getAttributeId(): int
    {
        return $this->attributes['attribute_id'];
    }

    /**
     * @param int $value
     * @return void
     */
    public function setAttributeId(int $value): void
    {
        $this->attributes['attribute_id'] = $value;
    }

    /**
     * @return string|null
     */
    public function getExtra(): ?string
    {
        return $this->attributes['extra'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setExtra(?string $value): void
    {
        $this->attributes['extra'] = $value;
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
