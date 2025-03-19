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
        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropForeign(['product_id']);

            $table->dropColumn(['product_id']);
        });

        Schema::table('product_variants', function (Blueprint $table) {
            $table->unsignedBigInteger('varianttable_id');
            $table->string('varianttable_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');

            $table->foreign('product_id')->references('id')->on('product_variants')->onDelete('cascade');
        });

        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropColumn(['varianttable_id', 'varianttable_type']);
        });
    }
};
