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
        if (!Schema::hasColumn('booking', 'price_total')) {
            Schema::table('booking', function (Blueprint $table) {
                $table->double('price_total')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('booking', 'price_total')) {
            Schema::table('booking', function (Blueprint $table) {
                $table->dropColumn('price_total');
            });
        }
    }
};
