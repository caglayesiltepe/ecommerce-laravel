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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->unsignedBigInteger('product_id');
            // $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('product_variant_id');
            // $table->foreign('product_variant_id')->references('id')->on('product_variants');
            $table->integer('item_status');
            $table->string('shipping_tracking_code')->nullable();
            $table->tinyInteger('shipping_company_id');
            $table->integer('shipping_id');
            $table->tinyInteger('shipping_status')->default(0);
            $table->decimal('total', 10);
            $table->decimal('discount', 10);
            $table->decimal('sub_total', 10);
            $table->float('discount_rate')->default(0);
            $table->float('tax_total')->nullable();
            $table->float('tax_rate')->default(0);
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
