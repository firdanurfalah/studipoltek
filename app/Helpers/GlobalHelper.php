<?php

namespace App\Helpers;

use App\Models\LogKegiatanModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class GlobalHelper
{
    public static function logkegiatan($produk, $kategori)
    {
        // cek ketersediaan data
        if (!$kategori) {
            return true;
        }
        // set variable
        $inp = [
            'id_kategori' => $kategori,
        ];

        if ($produk) {
            $inp['id_produk'] = $produk;
        }

        // check user login
        if (Auth::check()) {
            // bila hari ini ada data lebih dari 3 dengan param yg sama maka tidak disimpan
            $c = LogKegiatanModel::where('id_user', Auth::user()->id)
                ->where('id_kategori', $kategori)
                ->where('id_produk', $produk)
                ->whereDate('created_at', now())
                ->count();
            if ($c > 4) {
                return true;
            }
        }


        try {
            // mencatat kegiatan user
            LogKegiatanModel::create($inp);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return true;
    }

    public static function getrecommend()
    {
        // klik detail
        // klik booking
        // klik cancel
        // klik pencarian
        // klik referensi
        // klik favorit
        $lkm = [];
        if (Auth::check()) {
            $c = LogKegiatanModel::where('id_user', Auth::user()->id)->count();
            $lkm = LogKegiatanModel::selectRaw(
                'count(id_kategori) as jmlkat, id_kategori, categori.nama'
            )
                ->join('categori', 'categori.id', 'log_kegiatan_models.id_kategori')
                ->where('id_user', Auth::user()->id)
                ->orderBy('jmlkat', 'DESC')
                ->groupBy('id_kategori','categori.nama')
                ->get();
            foreach ($lkm as $key => $v) {
                // set limit
                $v->limit = 1;
                // hitung persentase
                $v->persentase = ($v->jmlkat / $c) * 100;
                // bila persentase lebih dari 75 maka limit jadi 2
                if ($v->persentase > 75) {
                    $v->limit = 2;
                }
                // $v->produk = ProductModel::where('kategori_id', $v->id_kategori)->get();
                // array_push($recom, $v->id_kategori);
            }
        }
        return $lkm;
    }
}
