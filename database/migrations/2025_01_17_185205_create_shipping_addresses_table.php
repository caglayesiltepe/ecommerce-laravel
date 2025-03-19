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
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_address_id');
            $table->string('title');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('phone');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->integer('country_id');
            $table->integer('city_id');
            $table->integer('district_id');
            $table->integer('neighborhood_id');
            $table->integer('postcode');
            $table->string('receiver');
            $table->string('receiver_phone');
            $table->string('description')->nullable();
            $table->string('identity');
            $table->string('company');
            $table->string('tax_number')->nullable();
            $table->string('tax_office')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_addresses');
    }
};
