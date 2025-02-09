<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $table = 'settings';

    public function getKey(): ?string
    {
        return $this->attributes['key'];
    }

    public function setKey($value): void
    {
        $this->attributes['key'] = strtolower($value);
    }

    public function getSetting(): ?string
    {
        return $this->attributes['setting'];
    }

    public function setSetting($value): void
    {
        $this->attributes['setting'] = $value;
    }

    public function getValue(): ?string
    {
        return $this->attributes['value'];
    }

    public function setValue($value): void
    {
        $this->attributes['value'] = $value;
    }

    public function getDescription(): ?string
    {
        return $this->attributes['description'];
    }

    public function setDescription($value): void
    {
        $this->attributes['description'] = $value;
    }

    public function getStatus(): bool
    {
        return $this->attributes['status'];
    }

    public function setStatus($value): void
    {
        $this->attributes['status'] = $value;
    }

}
