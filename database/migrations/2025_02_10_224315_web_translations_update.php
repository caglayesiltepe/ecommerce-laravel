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
            $table->unsignedBigInteger('translatable_id');
            $table->string('translatable_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('web_translations', function (Blueprint $table) {
            $table->dropColumn(['translatable_id', 'translatable_type']);
        });
    }
};
