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
        $data['category'] = CategoriModel::get();
        $data['article'] = ArtikelModel::get();
        $data['product'] = ProductModel::limit(3)->get();
        $data['arrival'] = ProductModel::limit(3)->get();
        $data['promo'] = PromoModel::limit(3)->get();
        // return $data;
        return view('front.beranda', $data);
    }

    public function categoridetail($id)
    {
        $data = [];
        $data['data'] = CategoriModel::where('id', $id)->first();
        $data['all'] = CategoriModel::where('id', '!=', $id)->limit(4)->get();
        return view('front.detail', $data);
    }

    public function formbooking(Request $request)
    {
        $data['data'] = CategoriModel::where('id', $request->id)->first();
        if (!$data['data']) {
            return Redirect::back()->with('info', 'Product Not Found');
        }
        return view('front.booking', $data);
    }

    public function prosesbooking(Request $request)
    {
        // return $request->all();
        $valid = Validator::make($request->all(), [
            // 'email' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'tanggal' => 'required',
            // 'gambar' => 'required',
        ]);

        if ($valid->fails()) {
            return Redirect::back()->withInput($request->all())->withErrors($valid)->with('info', 'Harap Cek Data Anda');
        }
        // $file = $request->file('gambar')->store('booking/' . time());
        // $exp = explode('T', $request->tanggal);
        $i = BookingModel::create([
            'nama' => $request->nama,
            'email' => 'email',
            'nohp' => $request->no_hp,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'upload' => 'kosong',
            'status' => 0,
        ]);

        if (!$i) {
            return Redirect::back()->withInput($request->all())->withErrors($valid)->with('info', 'Booking Tidak Tersimpan');
        }
        return view('front.orderselesai');
    }

    public function approvebooking($id)
    {
        $i = BookingModel::where('id', $id)->update([
            'status' => $id == 1 ? 0 : 1,
        ]);
        if ($i) {
            return Redirect::back()->with('info', 'Data Tersimpan');
        }
        return Redirect::back()->with('info', 'Data Tidak Tersimpan');
    }
}
