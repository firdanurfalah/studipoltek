<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriModel extends Model
{
    use HasFactory;

    protected $table = "categori";
    protected $fillable = [
        'nama',
        'gambar',
        'harga',
        'deskripsi',
      
    ];
}
