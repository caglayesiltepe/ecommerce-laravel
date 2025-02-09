<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderTransaction extends Model
{
    use HasFactory;

    protected $table = 'order_transactions';

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
    public function paymentType(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class);
    }

    /**
     * @return BelongsTo
     */
    public function paymentStatus(): BelongsTo
    {
        return $this->belongsTo(PaymentStatus::class);
    }

    /**
     * @return BelongsTo
     */
    public function paymentGateway(): BelongsTo
    {
        return $this->belongsTo(PaymentGateway::class);
    }

    public function getOrderId(): int
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId(int $value): void
    {
        $this->attributes['order_id'] = $value;
    }

    public function getPaymentTypeId(): int
    {
        return $this->attributes['payment_type_id'];
    }

    public function setPaymentTypeId(int $value): void
    {
        $this->attributes['payment_type_id'] = $value;
    }

    public function getPaymentStatusId(): int
    {
        return $this->attributes['payment_status_id'];
    }

    public function setPaymentStatusId(int $value): void
    {
        $this->attributes['payment_status_id'] = $value;
    }

    public function getPaymentGatewayId(): int
    {
        return $this->attributes['payment_gateway_id'];
    }

    public function setPaymentGatewayId(int $value): void
    {
        $this->attributes['payment_gateway_id'] = $value;
    }

    public function getPaymentMessage(): ?string
    {
        return $this->attributes['payment_message'];
    }

    public function setPaymentMessage(string $value): void
    {
        $this->attributes['payment_message'] = $value;
    }

    public function getBankId(): int
    {
        return $this->attributes['bank_id'];
    }

    public function setBankId(int $value): void
    {
        $this->attributes['bank_id'] = $value;
    }

    public function getTransferBankId(): int
    {
        return $this->attributes['transfer_bank_id'];
    }

    public function setTransferBankId(int $value): void
    {
        $this->attributes['transfer_bank_id'] = $value;
    }

    public function getPosInfo(): int
    {
        return $this->attributes['pos_info'];
    }

    public function setPosInfo(int $value): void
    {
        $this->attributes['pos_info'] = $value;
    }

    public function getErpCode(): int
    {
        return $this->attributes['erp_code'];
    }

    public function setErpCode(int $value): void
    {
        $this->attributes['erp_code'] = $value;
    }

    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    public function setPrice(float $value): void
    {
        $this->attributes['price'] = $value;
    }

    public function getInstallments(): int
    {
        return $this->attributes['installments'];
    }

    public function setInstallments(int $value): void
    {
        $this->attributes['installments'] = $value;
    }

    public function getCurrency(): string
    {
        return $this->attributes['currency'];
    }

    public function setCurrency(string $value): void
    {
        $this->attributes['currency'] = $value;
    }

}
