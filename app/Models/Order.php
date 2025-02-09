<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'order_date' => 'datetime',
        'completed_at' => 'datetime',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function shippingAddress(): HasMany
    {
        return $this->hasMany(ShippingAddress::class);
    }

    public function getOrderCode(): ?string
    {
        return $this->attributes['order_code'];
    }

    public function setOrderCode($value): void
    {
        $this->attributes['order_code'] = $value;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($value): void
    {
        $this->attributes['user_id'] = $value;
    }

    public function getPaymentId(): int
    {
        return $this->attributes['payment_id'];
    }

    public function setPaymentId($value): void
    {
        $this->attributes['payment_id'] = $value;
    }

    public function getOrderStatusId(): int
    {
        return $this->attributes['order_status_id'];
    }

    public function setOrderStatusId($value): void
    {
        $this->attributes['order_status_id'] = $value;
    }

    public function getInvoiceStatusId(): int
    {
        return $this->attributes['invoice_status_id'];
    }

    public function setInvoiceStatusId($value): void
    {
        $this->attributes['invoice_status_id'] = $value;
    }

    public function getShippingAddressId(): int
    {
        return $this->attributes['shipping_address_id'];
    }

    public function setShippingAddressId($value): void
    {
        $this->attributes['shipping_address_id'] = $value;
    }

    public function getShippingCompanyId(): int
    {
        return $this->attributes['shipping_company_id'];
    }

    public function setShippingCompanyId($value): void
    {
        $this->attributes['shipping_company_id'] = $value;
    }

    public function getShippingId(): int
    {
        return $this->attributes['shipping_id'];
    }

    public function setShippingId($value): void
    {
        $this->attributes['shipping_id'] = $value;
    }

    public function getShippingStatus(): string
    {
        return $this->attributes['shipping_status'];
    }

    public function setShippingStatus($value): void
    {
        $this->attributes['shipping_status'] = $value;
    }

    public function getCurrency(): string
    {
        return strtoupper($this->attributes['currency']);
    }

    public function setCurrency($value): void
    {
        $this->attributes['currency'] = $value;
    }

    public function getNotes(): ?string
    {
        return $this->attributes['notes'];
    }

    public function setNotes($value): void
    {
        $this->attributes['notes'] = $value;
    }

    public function getTotal(): ?float
    {
        return $this->attributes['total'];
    }

    public function setTotal($value): void
    {
        $this->attributes['total'] = $value;
    }

    public function getDiscount(): ?float
    {
        return $this->attributes['discount'];
    }

    public function setDiscount($value): void
    {
        $this->attributes['discount'] = $value;
    }

    public function getSubTotal(): ?float
    {
        return $this->attributes['sub_total'];
    }

    public function setSubTotal($value): void
    {
        $this->attributes['sub_total'] = $value;
    }

    public function getDiscountRate(): ?float
    {
        return $this->attributes['discount_rate'];
    }

    public function setDiscountRate($value): void
    {
        $this->attributes['discount_rate'] = $value;
    }

    public function getTaxTotal(): int
    {
        return $this->attributes['tax_total'];
    }

    public function setTaxTotal($value): void
    {
        $this->attributes['tax_total'] = $value;
    }

    public function getTaxRate(): int
    {
        return $this->attributes['tax_rate'];
    }

    public function setTaxRate($value): void
    {
        $this->attributes['tax_rate'] = $value;
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($value): void
    {
        $this->attributes['quantity'] = $value;
    }

    public function getCouponCode(): ?string
    {
        return $this->attributes['coupon_code'];
    }

    public function setCouponCode($value): void
    {
        $this->attributes['coupon_code'] = $value;
    }

    public function getIp(): ?string
    {
        return $this->attributes['ip'];
    }

    public function setIp($value): void
    {
        $this->attributes['ip'] = $value;
    }

    public function getOrderDate(): string
    {
        return $this->attributes['order_date'];
    }

    public function setOrderDate($value): void
    {
        $this->attributes['order_date'] = $value;
    }

    public function getCompletedAt(): string
    {
        return $this->attributes['completed_at'];
    }

    public function setCompletedAt($value): void
    {
        $this->attributes['completed_at'] = $value;
    }

}
