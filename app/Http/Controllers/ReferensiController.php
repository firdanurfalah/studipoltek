<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Models\CategoriModel;
use App\Models\ReferensiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ReferensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil data di table referensi
        $data['data'] = ReferensiModel::select(
            'referensi_models.*',
            'categori.nama as kategori'
        )
            ->leftJoin('categori', 'categori.id', 'referensi_models.kategori_id')
            ->get();
        // menampilkan view index
        return view('admin.pages.referensi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ambil data kategori
        $data['kategori'] = CategoriModel::get();
        // menampilkan view tambah
        return view('admin.pages.referensi.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data inputan
        $validator = Validator::make($request->all(), [
            'nama'  => 'required',
            'kategori'  => 'required',
            // 'deskripsi' => 'required',
            'gambar' => 'required_if:id,null|image|mimes:jpeg,png,jpg',
        ]);

        // response error validasi
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('info', 'Gagal ');
        }

        // variable inputan
        $insert = [
            'nama' => $request->nama,
            'kategori_id' => $request->kategori,
        ];
        // jika tedapat inputan gambar
        if ($request->hasFile('gambar')) {
            $insert['gambar'] = $request->file('gambar')->store('referensi/' . time());
        }

        // simpan dan tambah data
        $u = ReferensiModel::UpdateOrCreate([
            'id' => $request->id
        ], $insert);
        // show alert
        GlobalHelper::messagereturn($u);
        // respon data
        return redirect('/admin-referensi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // ambil data berdasarkan id dan data kategori
        $data['x'] = ReferensiModel::where('id', $id)->first();
        $data['kategori'] = CategoriModel::get();
        // menampilkan view edit
        return view('admin.pages.referensi.edit', $data);
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
        // hapus data di table referensi berdasarkan id
        $x = ReferensiModel::where('id', $id)->delete();
        // show alert
        GlobalHelper::messagereturn($x);
        // return data
        return redirect('/admin-referensi');
    }
}
