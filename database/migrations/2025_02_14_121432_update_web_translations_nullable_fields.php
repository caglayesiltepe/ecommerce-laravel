<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('web_translations', function (Blueprint $table) {
            $table->text('short_description')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('meta_title')->nullable()->change();
            $table->text('meta_keywords')->nullable()->change();
            $table->text('meta_description')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('web_translations', function (Blueprint $table) {
            $table->text('short_description')->nullable(false)->change();
            $table->text('description')->nullable(false)->change();
            $table->string('meta_title')->nullable(false)->change();
            $table->text('meta_keywords')->nullable(false)->change();
            $table->text('meta_description')->nullable(false)->change();
        });
    }
};
