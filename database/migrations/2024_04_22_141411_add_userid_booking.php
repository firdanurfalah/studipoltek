<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::table('users', function (Blueprint $table) {
        //     $table->enum('level', ['admin', 'user', 'owner']);
        // });
        Schema::table('booking', function (Blueprint $table) {
            $table->integer('user_id') ->nullable();
        });
        Schema::table('booking', function (Blueprint $table) {
            $table->integer('product_id')->nullable();
        });
        Schema::table('booking', function (Blueprint $table) {
            $table->integer('promo_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
        Schema::table('booking', function (Blueprint $table) {
            $table->dropColumn('product_id');
        });
        Schema::table('booking', function (Blueprint $table) {
            $table->dropColumn('promo_id');
        });
    }
};
