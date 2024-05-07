<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function product(): HasMany
    {
        return $this->hasMany(ProductModel::class, 'kategori_id', 'id');
    }
    public function referensi(): HasMany
    {
        return $this->hasMany(ReferensiModel::class, 'kategori_id', 'id');
    }
}
