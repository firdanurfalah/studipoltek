<?php

namespace App\Http\Controllers;

use App\Models\CategoriModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['data'] = ProductModel::select(
            'product_models.*',
            'categori.nama as categori_nama'
        )
            ->join('categori', 'categori.id', 'product_models.kategori_id')
            ->get();
        return view('admin.pages.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['kategori'] = CategoriModel::get();
        return view('admin.pages.product.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'  => 'required',
            'harga' => 'required',
            'harga_diskon' => 'required',
            'gambar' => 'required_if:id,null|image|mimes:jpeg,png,jpg',
            'kategori' => 'required',
            'rekomendasi' => 'required',
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('info', 'Gagal ');
        }

        $insert = [
            'nama' => $request->nama,
            'harga' => $request->harga,
            'harga_diskon' => $request->harga_diskon,
            'is_recommend' => $request->rekomendasi,
            'kategori_id' => $request->kategori,
        ];
        if ($request->hasFile('gambar')) {
            $insert['gambar'] = $request->file('gambar')->store('product/' . time());
        }

        $u = ProductModel::UpdateOrCreate([
            'id' => $request->id
        ], $insert);
        if ($u) {
            return redirect('/product')->with('info', 'Berhasil ');
        }
        return Redirect::back()->withErrors($validator)->withInput($request->all())->with('info', 'Gagal ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['x'] = ProductModel::where('id', $id)->first();
        $data['kategori'] = CategoriModel::get();
        return view('admin.pages.product.edit', $data);
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
        ProductModel::where('id', $id)->delete();
        return redirect('/product')->with('info', 'Berhasil hapus data');
    }
}
