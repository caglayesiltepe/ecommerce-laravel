<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code', 50)->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('payment_id');
            $table->tinyInteger('order_status_id');
            $table->integer('invoice_status_id')->default(0);
            $table->unsignedBigInteger('shipping_address_id');
            //$table->foreign('shipping_address_id')->references('id')->on('shipping_addresses')->onDelete('cascade');
            $table->tinyInteger('shipping_company_id');
            $table->integer('shipping_id');
            $table->tinyInteger('shipping_status')->default(0);
            $table->string('currency', 10)->default('TRY');
            $table->text('notes')->nullable();
            $table->decimal('total', 10);
            $table->decimal('discount', 10);
            $table->decimal('sub_total', 10);
            $table->float('discount_rate')->default(0);
            $table->float('tax_total')->nullable();
            $table->float('tax_rate')->default(0);
            $table->integer('quantity');
            $table->string('coupon_code', 20)->nullable();
            $table->string('ip', 50);
            $table->timestamp('order_date')->useCurrent();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
