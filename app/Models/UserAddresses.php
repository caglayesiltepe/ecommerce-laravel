<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAddresses extends Model
{
    use HasFactory;

    protected $table = 'user_addresses';

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
     * @param int $value
     * @return void
     */
    public function setUserId(int $value): void
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
     * @param $value
     * @return void
     */
    public function setTitle($value): void
    {
        $this->attributes['title'] = $value;
    }

    /**
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->attributes['company_name'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setCompanyName(?string $value): void
    {
        $this->attributes['company_name'] = $value;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->attributes['name'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setName(?string $value): void
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
     * @param string|null $value
     * @return void
     */
    public function setSurname(?string $value): void
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

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->attributes['phone'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setPhone(?string $value): void
    {
        $this->attributes['phone'] = $value;
    }

    /**
     * @return int
     */
    public function getCountryId(): int
    {
        return $this->attributes['country_id'];
    }

    /**
     * @param int $value
     * @return void
     */
    public function setCountryId(int $value): void
    {
        $this->attributes['country_id'] = $value;
    }

    /**
     * @return int
     */
    public function getCityId(): int
    {
        return $this->attributes['city_id'];
    }

    /**
     * @param int $value
     * @return void
     */
    public function setCityId(int $value): void
    {
        $this->attributes['city_id'] = $value;
    }

    /**
     * @return int
     */
    public function getDistrictId(): int
    {
        return $this->attributes['district_id'];
    }

    /**
     * @param int $value
     * @return void
     */
    public function setDistrictId(int $value): void
    {
        $this->attributes['district_id'] = $value;
    }

    /**
     * @return int
     */
    public function getNeighbourhoodId(): int
    {
        return $this->attributes['neighbourhood_id'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setNeighbourhoodId($value): void
    {
        $this->attributes['neighbourhood_id'] = $value;
    }

    /**
     * @return string|null
     */
    public function getAddressType(): ?string
    {
        return $this->attributes['address_type'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setAddressType($value): void
    {
        $this->attributes['address_type'] = $value;
    }

    /**
     * @return string|null
     */
    public function getAddress1(): ?string
    {
        return $this->attributes['address_1'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setAddress1($value): void
    {
        $this->attributes['address_1'] = $value;
    }

    /**
     * @return string|null
     */
    public function getAddress2(): ?string
    {
        return $this->attributes['address_2'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setAddress2($value): void
    {
        $this->attributes['address_2'] = $value;
    }

    /**
     * @return bool
     */
    public function getIsInvoice(): bool
    {
        return $this->attributes['is_invoice'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setIsInvoice($value): void
    {
        $this->attributes['is_invoice'] = $value;
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
     * @return string|null
     */
    public function getIdentityNo(): ?string
    {
        return $this->attributes['identity_no'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setIdentityNo($value): void
    {
        $this->attributes['identity_no'] = $value;
    }

    /**
     * @return string|null
     */
    public function getTaxNumber(): ?string
    {
        return $this->attributes['tax_number'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setTaxNumber($value): void
    {
        $this->attributes['tax_number'] = $value;
    }

    /**
     * @return string|null
     */
    public function getTaxOffice(): ?string
    {
        return $this->attributes['tax_office'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setTaxOffice($value): void
    {
        $this->attributes['tax_office'] = $value;
    }

    /**
     * @return string|null
     */
    public function getIp(): ?string
    {
        return $this->attributes['ip'];
    }

    /**
     * @param $value
     * @return void
     */
    public function setIp($value): void
    {
        $this->attributes['ip'] = $value;
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
