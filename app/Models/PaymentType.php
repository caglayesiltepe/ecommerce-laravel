<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    use HasFactory;

    protected $table = 'payment_types';

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName($value): void
    {
        $this->attributes['name'] = $value;
    }

    public function getDescription(): ?string
    {
        return $this->attributes['description'];
    }

    public function setDescription($value): void
    {
        $this->attributes['description'] = $value;
    }

    public function getDisplayOrder(): int
    {
        return $this->attributes['display_order'];
    }

    public function setDisplayOrder($value): void
    {
        $this->attributes['display_order'] = $value;
    }

    public function getStatus(): int
    {
        return $this->attributes['status'];
    }

    public function setStatus($value): void
    {
        $this->attributes['status'] = $value;
    }

}
