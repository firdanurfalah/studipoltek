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
        Schema::create('bookweb', function (Blueprint $table) {
            $table->id();
            $table->string('namapaket');
            $table->string('nama');
            $table->string('jumlah_orang');
            $table->string('nohp');
            $table->string('tanggal');
            $table->string('jam');
            $table->timestamps();
            $table->softDeletes();
        });
    }
//
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
