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
        if (!Schema::hasColumn('booking', 'last_edit_user')) {
            Schema::table('booking', function (Blueprint $table) {
                $table->integer('last_edit_user')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('booking', 'last_edit_user')) {
            Schema::table('booking', function (Blueprint $table) {
                $table->dropColumn('last_edit_user');
            });
        }
    }
};
