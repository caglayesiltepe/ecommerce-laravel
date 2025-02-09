<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    use HasFactory;

    protected $table = 'payment_statuses';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->attributes['name'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setName($value): void
    {
        $this->attributes['name'] = $value;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setDescription($value): void
    {
        $this->attributes['description'] = $value;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->attributes['key'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setKey($value): void
    {
        $this->attributes['key'] = $value;
    }

    /**
     * @return int
     */
    public function getDisplayOrder(): int
    {
        return $this->attributes['display_order'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setDisplayOrder($value): void
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
     * @param $value
     * @return void
     */
    public function setStatus($value): void
    {
        $this->attributes['status'] = $value;
    }
}
