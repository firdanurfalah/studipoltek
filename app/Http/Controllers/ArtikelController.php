<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Models\ArtikelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ArtikelController extends Controller
{
    public function index()
    {
        // ambil data di table artikel
        $data['artikel'] = ArtikelModel::get();
        // menampilkan view index
        return view('admin.pages.artikel.index', $data);
    }
    public function create()
    {
        // menampilkan view tambah
        return view('admin.pages.artikel.tambah');
    }

    public function store(Request $request)
    {
        // validasi data inputan
        $validator = Validator::make($request->all(), [
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'judul'  => 'required',
            'deskripsi'  => 'required',
        ]);

        // response error validasi
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        // jika terdapat inputan gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar')->store('artikel/' . time());

            // simpan data
            $x = ArtikelModel::create([
                'id' => $request->idartikel,
                'gambar' => $file,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);

            // show alert
            GlobalHelper::messagereturn($x);
            // respon data
            return redirect('/artikel');
        }
    }

    public function show(string $id)
    {
        // $data['edit'] = AdminModel::where('id', $id)->first();
        // return view('admin.pages.admin.edit');
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar')->store('artikel/' . time());
            $validator = Validator::make($request->all(), [

                'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'judul' => 'required',
                'deskripsi' => 'required',




            ]);

            // response error validation
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }
            $x = ArtikelModel::where('id', $id)->update([
                'id' => $request->idartikel,

                'gambar' => $file,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,


            ]);
            // show alert
            GlobalHelper::messagereturn($x);
            return redirect('/artikel');
        }
    }

    public function destroy(string $id)
    {
        // hapus data di table artikel berdasarkan id
        $x = ArtikelModel::where('id', $id)->delete();
        // show alert
        GlobalHelper::messagereturn($x);
        return redirect('/artikel');
    }
}
