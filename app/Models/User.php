<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use mysql_xdevapi\Session;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
        'password' => 'hashed',
        'birthdate' => 'date',
    ];

    /**
     * @return string|null
     */
    public function getName(): ?string
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
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->attributes['surname'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setSurname($value): void
    {
        $this->attributes['surname'] = $value;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->attributes['email'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setEmail(?string $value): void
    {
        $this->attributes['email'] = $value;
    }

    public function getPassword(): ?string
    {
        return $this->attributes['password'];
    }

    public function setPassword($value): void
    {
        $this->attributes['password'] = $value;
    }

    public function getCompanyName(): ?string
    {
        return $this->attributes['company_name'];
    }

    public function setCompanyName($value): void
    {
        $this->attributes['company_name'] = $value;
    }

    public function getStatus(): bool
    {
        return $this->attributes['status'];
    }

    public function setStatus($value): void
    {
        $this->attributes['status'] = $value;
    }

    public function getRole(): int
    {
        return $this->attributes['role'];
    }

    public function setRole($value): void
    {
        $this->attributes['role'] = $value;
    }

    public function getLevel(): int
    {
        return $this->attributes['level'];
    }

    public function setLevel($value): void
    {
        $this->attributes['level'] = $value;
    }

    public function getIdentityNo(): ?string
    {
        return $this->attributes['identity_no'];
    }

    public function setIdentityNo($value): void
    {
        $this->attributes['identity_no'] = $value;
    }

    public function getTaxNo(): ?string
    {
        return $this->attributes['tax_no'];
    }

    public function setTaxNo($value): void
    {
        $this->attributes['tax_no'] = $value;
    }

    public function getBirthdate()
    {
        return $this->attributes['birthdate'];
    }

    public function setBirthdate($value): void
    {
        $this->attributes['birthdate'] = $value;
    }

    public function getIsNewsletterCheck(): bool
    {
        return $this->attributes['is_newsletter_check'];
    }

    public function setIsNewsletterCheck($value): void
    {
        $this->attributes['is_newsletter_check'] = $value;
    }

    public function getIsConfirmationCheck(): bool
    {
        return $this->attributes['is_confirmation_check'];
    }

    public function setIsConfirmationCheck($value): void
    {
        $this->attributes['is_confirmation_check'] = $value;
    }

    public function getErpCode(): ?string
    {
        return $this->attributes['erp_code'];
    }

    public function setErpCode($value): void
    {
        $this->attributes['erp_code'] = $value;
    }

    public function getEmailVerifiedAt()
    {
        return $this->attributes['email_verified_at'];
    }

    public function setEmailVerifiedAt($value): void
    {
        $this->attributes['email_verified_at'] = $value;
    }

    public function getPhoneVerifiedAt()
    {
        return $this->attributes['phone_verified_at'];
    }

    public function setPhoneVerifiedAt($value): void
    {
        $this->attributes['phone_verified_at'] = $value;
    }
}
