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
            $table->dropUnique('web_translations_language_code_unique');
        });
    }

    public function down(): void
    {
        Schema::table('web_translations', function (Blueprint $table) {
            $table->unique('language_code', 'web_translations_language_code_unique');
        });
    }
};
