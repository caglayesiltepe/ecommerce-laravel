<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserIban extends Model
{
    use HasFactory;

    protected $table = 'user_ibans';

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setUserId($value): void
    {
        $this->attributes['user_id'] = $value;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->attributes['title'];
    }


    /**
     * @param string|null $value
     * @return void
     */
    public function setTitle(?string $value): void
    {
        $this->attributes['title'] = $value;
    }

    /**
     * @return string|null
     */
    public function getBankAccountName(): ?string
    {
        return $this->attributes['bank_account_name'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setBankAccountName(?string $value): void
    {
        $this->attributes['bank_account_name'] = $value;
    }

    /**
     * @return string|null
     */
    public function getIban(): ?string
    {
        return $this->attributes['iban'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setIban(?string $value): void
    {
        $this->attributes['iban'] = $value;
    }

    /**
     * @return string|null
     */
    public function getIp(): ?string
    {
        return $this->attributes['ip'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setIp(?string $value): void
    {
        $this->attributes['ip'] = $value;
    }

    /**
     * @return bool
     */
    public function getIsDefault(): bool
    {
        return $this->attributes['is_default'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setIsDefault($value): void
    {
        $this->attributes['is_default'] = $value;
    }

    /**
     * @return bool
     */
    public function getStatus(): bool
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
