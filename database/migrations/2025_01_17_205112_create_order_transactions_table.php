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
        Schema::create('order_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->unsignedBigInteger('payment_type_id');
            $table->foreign('payment_type_id')->references('id')->on('payment_types');
            $table->unsignedBigInteger('payment_status_id');
            //$table->foreign('payment_status_id')->references('id')->on('payment_statuses');
            $table->unsignedBigInteger('payment_gateway_id');
            // $table->foreign('payment_gateway_id')->references('id')->on('payment_gateways');
            $table->string('payment_message')->nullable();
            $table->integer('bank_id')->default(0);
            $table->integer('transfer_bank_id')->default(0);
            $table->string('pos_info')->nullable();
            $table->string('erp_code')->nullable();
            $table->float('price');
            $table->integer('installments')->default(1);
            $table->string('currency')->default('TRY');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_transactions');
    }
};
