<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ArtikelModel;
use App\Models\BookingModel;
use App\Models\CategoriModel;
use App\Models\ProductModel;
use App\Models\PromoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        // ambil data kategori
        $data['category'] = CategoriModel::get();
        // ambil data artikel
        $data['article'] = ArtikelModel::get();
        // ambil data produk dengan limit 3
        $data['product'] = ProductModel::limit(3)->get();
        $data['arrival'] = ProductModel::limit(3)->get();
        // ambil data promo dengan limit 3
        $data['promo'] = PromoModel::limit(3)->get();
        // return $data;
        return view('front.beranda', $data);
    }

    public function katalogstudio(Request $request)
    {
        $data = [];
        // ambil data produk
        $data['product'] = ProductModel::paginate(6);
        // return $data;
        // set view
        return view('front.pages.about', $data);
    }

    public function referensi()
    {
        $data = [];
        // ambil data ketegori dengan produk
        $data['kategori'] = CategoriModel::select()->with('product')->get();
        // return $data;
        // set view
        return view('front.pages.categories', $data);
    }

    public function promo()
    {
        $data = [];
        // ambil data promo
        $data['promo'] = PromoModel::select()->get();
        // return $data;
        // set view
        return view('front.pages.promo', $data);
    }

    public function categoridetail($id)
    {
        $data = [];
        // ambil data kategori berdasarkan id
        $data['data'] = CategoriModel::where('id', $id)->first();
        // ambil data kategori berdasarkan selain id hanya 4 data
        $data['all'] = CategoriModel::where('id', '!=', $id)->limit(4)->get();
        return view('front.detail', $data);
    }

    public function formbooking(Request $request)
    {
        // ambil kategori berdasarkarn id
        $data['data'] = CategoriModel::where('id', $request->id)->first();
        // bila kosong ke halaman sebelumnya
        if (!$data['data']) {
            return Redirect::back()->with('info', 'Product Not Found');
        }
        // set view
        return view('front.booking', $data);
    }

    public function prosesbooking(Request $request)
    {
        // return $request->all();
        // validasi data inputan
        $valid = Validator::make($request->all(), [
            // 'email' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'tanggal' => 'required',
            // 'gambar' => 'required',
        ]);

        // bila gagal kembali ke halaman sebelumnya
        if ($valid->fails()) {
            return Redirect::back()->withInput($request->all())->withErrors($valid)->with('info', 'Harap Cek Data Anda');
        }
        // $file = $request->file('gambar')->store('booking/' . time());
        // $exp = explode('T', $request->tanggal);
        // proses simpan
        $i = BookingModel::create([
            'nama' => $request->nama,
            'email' => 'email',
            'nohp' => $request->no_hp,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'upload' => 'kosong',
            'status' => 0,
        ]);

        // bila gagal
        if (!$i) {
            return Redirect::back()->withInput($request->all())->withErrors($valid)->with('info', 'Booking Tidak Tersimpan');
        }
        // set view
        return view('front.orderselesai');
    }

    public function approvebooking($id)
    {
        // ubah status booking
        $i = BookingModel::where('id', $id)->update([
            'status' => $id == 1 ? 0 : 1,
        ]);

        // bila berhasil
        if ($i) {
            return Redirect::back()->with('info', 'Data Tersimpan');
        }
        // bila gagal
        return Redirect::back()->with('info', 'Data Tidak Tersimpan');
    }
}
