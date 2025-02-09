<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

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
    public function getSurname(): string
    {
        return $this->attributes['surname'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setSurname(string $value): void
    {
        $this->attributes['surname'] = $value;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setEmail(string $value): void
    {
        $this->attributes['email'] = $value;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->attributes['phone'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setPhone(string $value): void
    {
        $this->attributes['phone'] = $value;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setAddress(string $value): void
    {
        $this->attributes['address'] = $value;
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
    public function getNeighborhoodId(): int
    {
        return $this->attributes['neighborhood_id'];
    }

    /**
     * @param int $value
     * @return void
     */
    public function setNeighborhoodId(int $value): void
    {
        $this->attributes['neighborhood_id'] = $value;
    }

    /**
     * @return int
     */
    public function getPostCode(): int
    {
        return $this->attributes['post_code'];
    }

    /**
     * @param int $value
     * @return void
     */
    public function setPostCode(int $value): void
    {
        $this->attributes['post_code'] = $value;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->attributes['message'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setMessage(string $value): void
    {
        $this->attributes['message'] = $value;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->attributes['subject'];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setSubject(string $value): void
    {
        $this->attributes['subject'] = $value;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->attributes['type'];
    }

    /**
     * @param int $value
     * @return void
     */
    public function setType(int $value): void
    {
        $this->attributes['type'] = $value;
    }

    /**
     * @return int
     */
    public function getStatus(): int
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
