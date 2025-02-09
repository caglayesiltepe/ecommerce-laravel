<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons';

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->attributes['code'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setCode(string $value): void
    {
        $this->attributes['code'] = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->attributes['name'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setName(string $value): void
    {
        $this->attributes['name'] = $value;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->attributes['description'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setDescription(?string $value): void
    {
        $this->attributes['description'] = $value;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->attributes['type'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setType(string $value): void
    {
        $this->attributes['type'] = $value;
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->attributes['discount'];
    }

    /**
     * @param float $value
     * @return void
     */
    public function setDiscount(float $value): void
    {
        $this->attributes['discount'] = $value;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->attributes['start_date'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setStartDate(string $value): void
    {
        $this->attributes['start_date'] = $value;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->attributes['end_date'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setEndDate(string $value): void
    {
        $this->attributes['end_date'] = $value;
    }

    /**
     * @return int
     */
    public function getUserTypeId(): int
    {
        return $this->attributes['user_type_id'];
    }

    /**
     * @param int $value
     * @return void
     */
    public function setUserTypeId(int $value): void
    {
        $this->attributes['user_type_id'] = $value;
    }

    /**
     * @return bool
     */
    public function getStatus(): bool
    {
        return (bool) $this->attributes['status'];
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
