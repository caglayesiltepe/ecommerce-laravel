<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

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
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return BelongsTo
     */
    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function getOrderId(): int
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId(int $value): void
    {
        $this->attributes['order_id'] = $value;
    }

    public function getProductId(): int
    {
        return $this->attributes['product_id'];
    }

    public function setProductId(int $value): void
    {
        $this->attributes['product_id'] = $value;
    }

    public function getProductVariantId(): int
    {
        return $this->attributes['product_variant_id'];
    }

    public function setProductVariantId(int $value): void
    {
        $this->attributes['product_variant_id'] = $value;
    }

    public function getItemStatus(): int
    {
        return $this->attributes['item_status'];
    }

    public function setItemStatus(int $value): void
    {
        $this->attributes['item_status'] = $value;
    }

    public function getShippingTrackingCode(): string
    {
        return $this->attributes['shipping_tracking_code'];
    }

    public function setShippingTrackingCode(string $value): void
    {
        $this->attributes['shipping_tracking_code'] = $value;
    }

    public function getShippingCompanyId(): int
    {
        return $this->attributes['shipping_company_id'];
    }

    public function setShippingCompanyId(int $value): void
    {
        $this->attributes['shipping_company_id'] = $value;
    }

    public function getShippingId(): int
    {
        return $this->attributes['shipping_id'];
    }

    public function setShippingId(int $value): void
    {
        $this->attributes['shipping_id'] = $value;
    }

    public function getShippingStatus(): int
    {
        return $this->attributes['shipping_status'];
    }

    public function setShippingStatus(int $value): void
    {
        $this->attributes['shipping_status'] = $value;
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
}
