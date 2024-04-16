<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;

    protected $table = "booking";
    protected $fillable = [
        'nama',
        'email',
        'nohp',
        'tanggal',
        'jam',
        'upload',
        'status',
        'jumlah_orang',
    ];
}
