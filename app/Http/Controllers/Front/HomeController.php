<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BookingModel;
use App\Models\CategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['category'] = CategoriModel::get();
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
        $valid = Validator::make($request->all(), [
            'email' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'tanggal' => 'required',
            'gambar' => 'required',
        ]);

        if ($valid->fails()) {
            return Redirect::back()->withInput($request->all())->withErrors($valid)->with('info', 'Harap Cek Data Anda');
        }
        $file = $request->file('gambar')->store('booking/' . time());
        $exp = explode('T', $request->tanggal);
        $i = BookingModel::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nohp' => $request->no_hp,
            'tanggal' => $exp[0],
            'jam' => $exp[1],
            'upload' => $file,
            'status' => 0,
        ]);

        if (!$i) {
            return Redirect::back()->withInput($request->all())->withErrors($valid)->with('info', 'Booking Tidak Tersimpan');
        }
        return view('front.orderselesai');
    }
}
