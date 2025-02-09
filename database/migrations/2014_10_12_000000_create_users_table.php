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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('surname', 100);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password');
            $table->string('company_name', 255);
            $table->tinyInteger('status');
            $table->integer('role');
            $table->integer('level');
            $table->string('identity_no', 11);
            $table->string('tax_no', 11);
            $table->date('birthdate');
            $table->tinyInteger('is_newsletter_check');
            $table->tinyInteger('is_confirmation_check');
            $table->string('erp_code');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
