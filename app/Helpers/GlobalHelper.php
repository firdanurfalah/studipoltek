<?php

namespace App\Helpers;

use App\Models\CategoriModel;
use App\Models\LogKegiatanModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Sastrawi\Stemmer\StemmerFactory;
use Sastrawi\StopWordRemover\StopWordRemoverFactory;

class GlobalHelper
{
    public static function getsastrawi()
    {
        if (!Auth::check()) {
            return [];
        }

        // ambil data log kegiatan
        $lkm = LogKegiatanModel::selectRaw(
            'count(id_kategori) as jmlkat, id_kategori, categori.nama'
        )
            ->join('categori', 'categori.id', 'log_kegiatan_models.id_kategori')
            ->where('id_user', Auth::user()->id)
            ->orderBy('jmlkat', 'DESC')
            ->groupBy('id_kategori', 'categori.nama')
            ->get();

        // ambil data kategori
        $kategori = CategoriModel::select('id')->pluck('id')->toArray();
        // return $kategori;
        $pp = new GlobalHelper;
        $txt = [];
        foreach ($lkm as $key => $v) {
            $txt[] = $pp::preprocess($v->id_kategori);
        }
        // return $txt;
        // $targetItemId = count($txt) - 1;
        // $itemVectors = $txt; // Vektor yang dihasilkan dari TF-IDF atau metode lainnya
        // $targetItemVector = $itemVectors[$targetItemId];
        $similarities = [];

        foreach ($lkm as $itemId => $vector) {
            // if ($itemId != $targetItemId) {
            // }
            // hitung kesamaan data dengan metode cosinesimilarity
            $csm = $pp::cosineSimilarity($kategori, [$vector->id_kategori]);
            if ($csm != 0) {
                $similarities[] = $vector->id_kategori;
            }
        }

        // return nilai kesamaan berdasarkan algoritma cosineSimilarity
        // return $similarities;

        arsort($similarities); // Urutkan berdasarkan kesamaan tertinggi
        $recommendedItems = array_slice($similarities, 0, 3); // Ambil 3 rekomendasi
        return $recommendedItems;
    }

    public static function preprocess($text)
    {
        $stemmerFactory = new StemmerFactory();
        $stemmer = $stemmerFactory->createStemmer();

        $stopWordRemoverFactory = new StopWordRemoverFactory();
        $stopWordRemover = $stopWordRemoverFactory->createStopWordRemover();

        $text = strtolower($text);
        $text = $stopWordRemover->remove($text);
        $text = $stemmer->stem($text);

        return $text;
    }

    public static function cosineSimilarity($vec1, $vec2)
    {
        $dotProduct = array_sum(array_map(function ($a, $b) {
            return $a * $b;
        }, $vec1, $vec2));
        $magnitude1 = sqrt(array_sum(array_map(function ($x) {
            return pow($x, 2);
        }, $vec1)));
        $magnitude2 = sqrt(array_sum(array_map(function ($x) {
            return pow($x, 2);
        }, $vec2)));

        if ($magnitude1 * $magnitude2 == 0) {
            return 0;
        } else {
            return $dotProduct / ($magnitude1 * $magnitude2);
        }
    }

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
            $inp['id_user'] = Auth::user()->id;
            // bila hari ini ada data lebih dari 3 dengan param yg sama maka tidak disimpan
            $c = LogKegiatanModel::where('id_user', Auth::user()->id)
                ->where('id_kategori', $kategori)
                ->where('id_produk', $produk)
                ->whereDate('created_at', now()->format('Y-m-d'))
                ->count();
            if ($c > 4) {
                return true;
            }
        }
        // else{
        //     return true;
        // }

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
            // Menghitung jumlah total log kegiatan pengguna
            $c = LogKegiatanModel::where('id_user', Auth::user()->id)->count();
            // Mengambil data log kegiatan berdasarkan kategori
            $lkm = LogKegiatanModel::selectRaw(
                'count(id_kategori) as jmlkat, id_kategori, categori.nama'
            )
                ->join('categori', 'categori.id', 'log_kegiatan_models.id_kategori')
                // Filter berdasarkan ID pengguna yang terautentikasi
                ->where('id_user', Auth::user()->id)
                ->orderBy('jmlkat', 'DESC')
                ->groupBy('id_kategori', 'categori.nama')
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
    public static function messagereturn($bool)
    {
        if ($bool) {
            return Alert::success('Success', 'Berhasil');
        }
        return Alert::info('Info', 'Tidak Berhasil');
    }
}
