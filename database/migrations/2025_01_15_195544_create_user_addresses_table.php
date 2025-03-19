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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title', 100);
            $table->string('company_name', 255);
            $table->string('name', 100);
            $table->string('surname', 100);
            $table->string('email', 100);
            $table->string('phone', 11);
            $table->integer('country_id');
            $table->integer('city_id');
            $table->integer('district_id');
            $table->integer('neighbourhood_id');
            $table->tinyInteger('address_type');
            $table->string('address_1');
            $table->string('address_2');
            $table->tinyInteger('is_invoice');
            $table->tinyInteger('is_default');
            $table->string('identity_no', 11);
            $table->string('tax_number', 11);
            $table->string('tax_office', 100);
            $table->string('ip', 50);
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
