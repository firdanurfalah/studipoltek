<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Models\PromoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil data di table promo
        $data['data'] = PromoModel::get();
        // menampilkan view index
        return view('admin.pages.promo.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // menampilkan view tambah
        return view('admin.pages.promo.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data inputan
        $validator = Validator::make($request->all(), [
            'nama'  => 'required',
            'kode' => 'required',
            'nominal_type' => 'required',
            'nominal' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required_if:id,null|image|mimes:jpeg,png,jpg',
        ]);

        // response error validasi
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('info', 'Gagal ');
        }

        // variable inputan
        $insert = [
            'nama' => $request->nama,
            'kode' => $request->kode,
            'nominal_type' => $request->nominal_type,
            'nominal' => $request->nominal,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'deskripsi' => $request->deskripsi,
        ];
        // jika tedapat inputan gambar
        if ($request->hasFile('gambar')) {
            $insert['gambar'] = $request->file('gambar')->store('promo/' . time());
        }

        // simpan dan tambah data
        $u = PromoModel::UpdateOrCreate([
            'id' => $request->id
        ], $insert);
        // show alert
        GlobalHelper::messagereturn($u);
        // respon data
        return redirect('/admin-promo');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // ambil data berdasarkan id
        $data['x'] = PromoModel::where('id', $id)->first();
        // menampilkan view edit
        return view('admin.pages.promo.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // hapus data di table promo berdasarkan id
        $x = PromoModel::where('id', $id)->delete();
        // show alert
        GlobalHelper::messagereturn($x);
        // return data
        return redirect('/admin-promo');
    }
}
