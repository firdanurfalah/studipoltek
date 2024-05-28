<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReferensiModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'gambar',
        'deskripsi',
        'kategori_id',
    ];
}
