<?php

namespace App\Http\Controllers;

use App\Models\CategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class CategoriController extends Controller
{
    public function index()
    {
        $data['categori'] = CategoriModel::get();
        return view('admin.pages.categori.index', $data);
    }
    public function create()
    {
        return view('admin.pages.categori.tambah');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'  => 'required',
            // 'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            // 'harga' => 'required',
            'deskripsi' => 'required',
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('info', 'Gagal ');
        }

        $c = CategoriModel::updateOrCreate([
            'id' => $request->id
        ], [
            'nama' => $request->nama,
            'gambar' => 'tidak digunakan',
            'harga' => 'tidak digunakan',
            'deskripsi' => $request->deskripsi,
        ]);
        // if ($request->hasFile('gambar')) { 
        //     $file = $request->file('gambar')->store('categori/' . time());
        // }
        if ($c) {
            return redirect('/categori')->with('info', 'Berhasil ');
        }
        return Redirect::back()->withErrors($validator)->withInput($request->all())->with('info', 'Gagal ');
    }

    public function show(string $id)
    {
        $data['x'] = CategoriModel::where('id', $id)->first();
        return view('admin.pages.categori.edit', $data);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        return $request->all();
        $validator = Validator::make($request->all(), [
            'nama'  => 'required',
            // 'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            // 'harga' => 'required',
            'deskripsi' => 'required',
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('info', 'Gagal edit ');
        }
        $c = CategoriModel::where('id', $id)->update([
            'id' => $request->idcategori,
            'nama' => $request->nama,
            'gambar' => 'tidak digunakan',
            'harga' => 'tidak digunakan',
            'deskripsi' => $request->deskripsi,
        ]);
        // if ($request->hasFile('gambar')) {
        //     $file = $request->file('gambar')->store('categori/' . time());
        // }
        if ($c) {
            return redirect('/categori')->with('info', 'Berhasil edit ');
        }
        return Redirect::back()->withErrors($validator)->withInput($request->all())->with('info', 'Gagal edit ');
    }
    public function destroy(string $id)
    {
        CategoriModel::where('id', $id)->delete();
        return redirect('/categori')->with('info', 'Berhasil hapus data');
    }
}
