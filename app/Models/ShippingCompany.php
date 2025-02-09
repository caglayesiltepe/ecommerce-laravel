<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCompany extends Model
{
    use HasFactory;

    protected $table = 'shipping_companies';

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function setTitle(string $value): void
    {
        $this->attributes['title'] = $value;
    }

    public function getLogo(): string
    {
        return $this->attributes['logo'];
    }

    public function setLogo(string $value): void
    {
        $this->attributes['logo'] = $value;
    }

    public function getStatus(): int
    {
        return $this->attributes['status'];
    }

    public function setStatus(int $value): void
    {
        $this->attributes['status'] = $value;
    }

    public function getDescription(): ?string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $value): void
    {
        $this->attributes['description'] = $value;
    }

    public function getPrice(): ?float
    {
        return $this->attributes['price'];
    }

    public function setPrice(float $value): void
    {
        $this->attributes['price'] = $value;
    }

    public function getRate(): ?float
    {
        return $this->attributes['rate'];
    }

    public function setRate(float $value): void
    {
        $this->attributes['rate'] = $value;
    }

    public function getIsSameDay(): bool
    {
        return $this->attributes['is_same_day'];
    }

    public function setIsSameDay(bool $value): void
    {
        $this->attributes['is_same_day'] = $value;
    }
}
