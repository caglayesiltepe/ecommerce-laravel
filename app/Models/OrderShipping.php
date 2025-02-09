<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderShipping extends Model
{
    use HasFactory;

    protected $table = 'order_shippings';

    /**
     * @return BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return BelongsTo
     */
    public function orderItems(): BelongsTo
    {
        return $this->belongsTo(OrderItem::class);
    }

    public function getOrderId(): int
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId(int $value): void
    {
        $this->attributes['order_id'] = $value;
    }

    public function getOrderItemId(): int
    {
        return $this->attributes['order_item_id'];
    }

    public function setOrderItemId(int $value): void
    {
        $this->attributes['order_item_id'] = $value;
    }

    public function getCompanyId(): int
    {
        return $this->attributes['company_id'];
    }

    public function setCompanyId(int $value): void
    {
        $this->attributes['company_id'] = $value;
    }

    public function getTrackingNumber(): string
    {
        return $this->attributes['tracking_number'];
    }

    public function setTrackingNumber(string $value): void
    {
        $this->attributes['tracking_number'] = $value;
    }

    public function getTrackingUrl(): string
    {
        return $this->attributes['tracking_url'];
    }

    public function setTrackingUrl(string $value): void
    {
        $this->attributes['tracking_url'] = $value;
    }

    public function getBarcode(): ?string
    {
        return $this->attributes['barcode'];
    }

    public function setBarcode(string $value): void
    {
        $this->attributes['barcode'] = $value;
    }

    public function getCount(): int
    {
        return $this->attributes['count'];
    }

    public function setCount(int $value): void
    {
        $this->attributes['count'] = $value;
    }

    public function getStatus(): int
    {
        return $this->attributes['status'];
    }

    public function setStatus(int $value): void
    {
        $this->attributes['status'] = $value;
    }

}
