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
        if (!Schema::hasColumn('product_models', 'min_orang')) {
            Schema::table('product_models', function (Blueprint $table) {
                $table->integer('min_orang')->default(0)->nullable();
            });
        }
        if (!Schema::hasColumn('product_models', 'max_orang')) {
            Schema::table('product_models', function (Blueprint $table) {
                $table->integer('max_orang')->default(0)->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('product_models', 'min_orang')) {
            Schema::table('product_models', function (Blueprint $table) {
                $table->dropColumn('min_orang');
            });
        }
        if (Schema::hasColumn('product_models', 'max_orang')) {
            Schema::table('product_models', function (Blueprint $table) {
                $table->dropColumn('max_orang');
            });
        }
    }
};
