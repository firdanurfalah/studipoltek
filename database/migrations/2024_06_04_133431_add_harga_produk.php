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
        if (!Schema::hasColumn('product_models', 'background')) {
            Schema::table('product_models', function (Blueprint $table) {
                $table->string('background')->nullable();
            });
        }
        if (!Schema::hasColumn('product_models', 'waktu')) {
            Schema::table('product_models', function (Blueprint $table) {
                $table->string('waktu')->nullable();
            });
        }
        if (!Schema::hasColumn('product_models', 'deskripsi')) {
            Schema::table('product_models', function (Blueprint $table) {
                $table->text('deskripsi')->nullable();
            });
        }
        if (!Schema::hasColumn('product_models', 'harga_per_orang')) {
            Schema::table('product_models', function (Blueprint $table) {
                $table->double('harga_per_orang')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('product_models', 'background')) {
            Schema::table('product_models', function (Blueprint $table) {
                $table->dropColumn('background');
            });
        }
        if (Schema::hasColumn('product_models', 'waktu')) {
            Schema::table('product_models', function (Blueprint $table) {
                $table->dropColumn('waktu');
            });
        }
        if (Schema::hasColumn('product_models', 'deskripsi')) {
            Schema::table('product_models', function (Blueprint $table) {
                $table->dropColumn('deskripsi');
            });
        }
        if (Schema::hasColumn('product_models', 'harga_per_orang')) {
            Schema::table('product_models', function (Blueprint $table) {
                $table->dropColumn('harga_per_orang');
            });
        }
    }
};
