<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromoModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'kode',
        'nominal_type',
        'nominal',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi',
        'gambar',
    ];
}
