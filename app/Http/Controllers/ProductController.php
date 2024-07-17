<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
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
        // ambil data di table product
        $data['data'] = ProductModel::select(
            'product_models.*',
            'categori.nama as categori_nama'
        )
            // join table kategori dan produk
            ->join('categori', 'categori.id', 'product_models.kategori_id')
            ->get();
        return view('admin.pages.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ambil data di table kategori
        $data['kategori'] = CategoriModel::get();
        // menampilkan view tambah
        return view('admin.pages.product.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data inputan
        $validator = Validator::make($request->all(), [
            'nama'  => 'required',
            'harga' => 'required',
            'harga_diskon' => 'required',
            'gambar' => 'required_if:id,null|image|mimes:jpeg,png,jpg',
            'kategori' => 'required',
            'rekomendasi' => 'required',
            'min_orang' => 'required',
            'max_orang' => 'required',
        ]);

        // response error validasi
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('info', 'Gagal ');
        }

        // buat variable inputan
        $insert = [
            'nama' => $request->nama,
            'harga' => $request->harga,
            'harga_diskon' => $request->harga_diskon,
            'is_recommend' => $request->rekomendasi,
            'kategori_id' => $request->kategori,
            'min_orang' => $request->min_orang,
            'max_orang' => $request->max_orang,
            'background' => $request->background,
            'waktu' => $request->waktu,
            'harga_per_orang' => $request->harga_per_orang,
        ];
        // jika terdapat inputan gambar
        if ($request->hasFile('gambar')) {
            $insert['gambar'] = $request->file('gambar')->store('product/' . time());
        }

        // tambah atau update data
        $u = ProductModel::UpdateOrCreate([
            'id' => $request->id
        ], $insert);
        // show alert
        GlobalHelper::messagereturn($u);
        // return data
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // ambil data produk dan kategori
        $data['x'] = ProductModel::where('id', $id)->first();
        $data['kategori'] = CategoriModel::get();
        // menampilkan view edit
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
        // hapus data di table produk berdasarkan id
        $x = ProductModel::where('id', $id)->delete();
        // show alert
        GlobalHelper::messagereturn($x);
        // respon data
        return redirect('/product');
    }
}
