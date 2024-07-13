<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'product_id',
        'user_id',
        'promo_id',
        'price_total',
        'link',
        'type',
        'last_edit_user',
        'keterangan_user',
    ];

    public function product(): HasOne
    {
        return $this->hasOne(ProductModel::class, 'id', 'product_id');
    }
    public function promo(): HasOne
    {
        return $this->hasOne(PromoModel::class, 'id', 'promo_id');
    }
}
