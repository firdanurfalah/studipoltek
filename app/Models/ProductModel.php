<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'harga',
        'harga_diskon',
        'is_recommend',
        'kategori_id',
        'gambar',
        'min_orang',
        'max_orang',
        'background',
        'waktu',
        'deskripsi',
        'harga_per_orang',
    ];
}
