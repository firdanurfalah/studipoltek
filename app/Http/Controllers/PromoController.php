<?php

namespace App\Http\Controllers;

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
        $data['data'] = PromoModel::get();
        return view('admin.pages.promo.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.promo.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('info', 'Gagal ');
        }

        $insert = [
            'nama' => $request->nama,
            'kode' => $request->kode,
            'nominal_type' => $request->nominal_type,
            'nominal' => $request->nominal,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'deskripsi' => $request->deskripsi,
        ];
        if ($request->hasFile('gambar')) {
            $insert['gambar'] = $request->file('gambar')->store('promo/' . time());
        }

        $u = PromoModel::UpdateOrCreate([
            'id' => $request->id
        ], $insert);
        if ($u) {
            return redirect('/admin-promo')->with('info', 'Berhasil ');
        }
        return Redirect::back()->withErrors($validator)->withInput($request->all())->with('info', 'Gagal ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['x'] = PromoModel::where('id', $id)->first();
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
        PromoModel::where('id', $id)->delete();
        return redirect('/admin-promo')->with('info', 'Berhasil hapus data');
    }
}
