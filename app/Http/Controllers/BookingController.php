<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{

    public function index()
    {
        // ambil data di table booking
        $data['booking'] = BookingModel::select()
            ->orderBy('created_at', 'DESC')
            ->get();
        // menampilkan view index
        return view('admin.pages.booking.index', $data);
    }
    public function create()
    {
        // menampilkan view tambah
        return view('admin.pages.booking.tambah');
    }

    public function store(Request $request)
    {
        // jika inputan terdapat upload
        if ($request->hasFile('upload')) {
            $file = $request->file('upload')->store('booking/' . time());

            // validasi data inputan
            $validator = Validator::make($request->all(), [
                'nama'  => 'required',
                'email' => 'required',
                'nohp' => 'required',
                'tanggal' => 'required',
                'jam' => 'required',
                'upload' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'status' => 'required',
            ]);

            // response error validasi
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }
            // simpan data
            BookingModel::create([
                'id' => $request->idbooking,
                'nama' => $request->nama,
                'email' => $request->email,
                'nohp' => $request->nohp,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'upload' => $file,
                'status' => $request->status,
            ]);
            // respon data
            return redirect('/booking')->with('ss', 'Berhasil tambah ');
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
        // validasi data inputan
        $validator = Validator::make($request->all(), [
            'nama'  => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'upload' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required',
        ]);

        // response error validasi
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        // jika terdapat inputan upload
        if ($request->hasFile('upload')) {
            $file = $request->file('upload')->store('booking/' . time());
            // update data
            BookingModel::where('id', $id)->update([
                'id' => $request->idbooking,
                'nama' => $request->nama,
                'email' => $request->email,
                'nohp' => $request->nohp,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'upload' => $file,
                'status' => $request->status,
            ]);
            // respon data
            return redirect('/booking')->with('success', 'Berhasil edit ');
        }
    }
    public function destroy(string $id)
    {
        // hapus data di table booking berdasarkan id
        BookingModel::where('id', $id)->delete();
        return redirect('/booking')->with('success', 'Berhasil hapus data');
    }
}
