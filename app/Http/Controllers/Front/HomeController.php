<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ArtikelModel;
use App\Models\BookingModel;
use App\Models\CategoriModel;
use App\Models\ProductModel;
use App\Models\PromoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data['kategori'] = CategoriModel::select()->with('referensi')->get();
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

    public function produkdetail($id)
    {
        $x = [];
        // ambil data produk selain id yg sama
        $x['all'] = ProductModel::whereNot('id', $id)->get();
        // ambil data produk berdasarkan id
        $x['data'] = ProductModel::where('id', $id)->first();
        // menampilkan data
        return view('front.detail', $x);
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
        // ambil produk berdasarkarn id
        $data['data'] = ProductModel::where('id', $request->id)->first();
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
        $a = Auth::user();
        if (!$a) {
            return Redirect::back()->with('info', 'Silahkan login terlebih dahulu');
        }
        // validasi data inputan
        $valid = Validator::make($request->all(), [
            'nama' => 'required',
            'no_hp' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'jumlah_orang' => 'required',
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
            'email' => Auth::user()->email,
            'nohp' => $request->no_hp,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'upload' => 'kosong',
            'status' => 0,
            'jumlah_orang' => $request->jumlah_orang,
            'product_id' => $request->product_id,
            'user_id' => Auth::user()->id,
            'promo_id' => 0,
        ]);

        // bila gagal
        if (!$i) {
            return Redirect::back()->withInput($request->all())->withErrors($valid)->with('info', 'Booking Tidak Tersimpan');
        }
        // set view
        return view('front.orderselesai');
    }

    public function approvebooking($id, Request $request)
    {
        // ubah status booking
        $i = BookingModel::where('id', $id)->update([
            'status' => $request->status,
        ]);

        // bila berhasil
        if ($i) {
            return Redirect::back()->with('info', 'Data Tersimpan');
        }
        // bila gagal
        return Redirect::back()->with('info', 'Data Tidak Tersimpan');
    }
}
