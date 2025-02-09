<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    use HasFactory;

    protected $table = 'payment_gateways';

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
     * @return string
     */
    public function getSlug(): string
    {
        return $this->attributes['slug'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setSlug(string $value): void
    {
        $this->attributes['slug'] = $value;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setDescription(string $value): void
    {
        $this->attributes['description'] = $value;
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
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->attributes['api_url'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setApiUrl(string $value): void
    {
        $this->attributes['api_url'] = $value;
    }

    /**
     * @return string
     */
    public function getSandboxUrl(): string
    {
        return $this->attributes['sandbox_url'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setSandboxUrl(string $value): void
    {
        $this->attributes['sandbox_url'] = $value;
    }

    /**
     * @return bool
     */
    public function getActive(): bool
    {
        return $this->attributes['active'];
    }

    /**
     * @param bool $value
     * @return void
     */
    public function setActive(bool $value): void
    {
        $this->attributes['active'] = $value;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->attributes['username'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setUsername(string $value): void
    {
        $this->attributes['username'] = $value;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setPassword(string $value): void
    {
        $this->attributes['password'] = $value;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->attributes['token'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setToken(string $value): void
    {
        $this->attributes['token'] = $value;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->attributes['api_key'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setApiKey(string $value): void
    {
        $this->attributes['api_key'] = $value;
    }

    /**
     * @return string
     */
    public function getSecretKey(): string
    {
        return $this->attributes['secret_key'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setSecretKey(string $value): void
    {
        $this->attributes['secret_key'] = $value;
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
     * @param int $value
     * @return void
     */
    public function setStatus(int $value): void
    {
        $this->attributes['status'] = $value;
    }

}
