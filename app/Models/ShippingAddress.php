<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $table = 'shipping_addresses';

    /**
     * @return int|null
     */
    public function getOrderId(): ?int
    {
        return $this->attributes['order_id'];
    }

    /**
     * @param int|null $value
     * @return void
     */
    public function setOrderId(?int $value): void
    {
        $this->attributes['order_id'] = $value;
    }

    /**
     * @return int|null
     */
    public function getUserAddressId(): ?int
    {
        return $this->attributes['user_address_id'];
    }

    /**
     * @param int|null $value
     * @return void
     */
    public function setUserAddressId(?int $value): void
    {
        $this->attributes['user_address_id'] = $value;
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
     * @return string|null
     */
    public function getAddress1(): ?string
    {
        return $this->attributes['address_1'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setAddress1(?string $value): void
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
     * @param string|null $value
     * @return void
     */
    public function setAddress2(?string $value): void
    {
        $this->attributes['address_2'] = $value;
    }

    /**
     * @return int|null
     */
    public function getCountryId(): ?int
    {
        return $this->attributes['country_id'];
    }

    /**
     * @param int|null $value
     * @return void
     */
    public function setCountryId(?int $value): void
    {
        $this->attributes['country_id'] = $value;
    }

    /**
     * @return int|null
     */
    public function getCityId(): ?int
    {
        return $this->attributes['city_id'];
    }

    /**
     * @param int|null $value
     * @return void
     */
    public function setCityId(?int $value): void
    {
        $this->attributes['city_id'] = $value;
    }

    /**
     * @return int|null
     */
    public function getDistrictId(): ?int
    {
        return $this->attributes['district_id'];
    }

    /**
     * @param int|null $value
     * @return void
     */
    public function setDistrictId(?int $value): void
    {
        $this->attributes['district_id'] = $value;
    }

    /**
     * @return int|null
     */
    public function getNeighborhoodId(): ?int
    {
        return $this->attributes['neighborhood_id'];
    }

    /**
     * @param int|null $value
     * @return void
     */
    public function setNeighborhoodId(?int $value): void
    {
        $this->attributes['neighborhood_id'] = $value;
    }

    /**
     * @return int|null
     */
    public function getPostcode(): ?int
    {
        return $this->attributes['postcode'];
    }

    /**
     * @param int|null $value
     * @return void
     */
    public function setPostcode(?int $value): void
    {
        $this->attributes['postcode'] = $value;
    }

    /**
     * @return string|null
     */
    public function getReceiver(): ?string
    {
        return $this->attributes['receiver'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setReceiver(?string $value): void
    {
        $this->attributes['receiver'] = $value;
    }

    /**
     * @return string|null
     */
    public function getReceiverPhone(): ?string
    {
        return $this->attributes['receiver_phone'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setReceiverPhone(?string $value): void
    {
        $this->attributes['receiver_phone'] = $value;
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
     * @return string|null
     */
    public function getIdentity(): ?string
    {
        return $this->attributes['identity'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setIdentity(?string $value): void
    {
        $this->attributes['identity'] = $value;
    }

    /**
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->attributes['company'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setCompany(?string $value): void
    {
        $this->attributes['company'] = $value;
    }

    /**
     * @return string|null
     */
    public function getTaxNumber(): ?string
    {
        return $this->attributes['tax_number'];
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setTaxNumber(?string $value): void
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
     * @param string|null $value
     * @return void
     */
    public function setTaxOffice(?string $value): void
    {
        $this->attributes['tax_office'] = $value;
    }
}
