<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Models\BookingModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{

    public function index(Request $r)
    {
        $data['tanggal'] = now();
        if ($r->tanggal) {
            $data['tanggal'] = $r->tanggal;
        }
        // ambil data di table booking
        $data['booking'] = BookingModel::select()
            ->where(function ($q) use ($r) {
                if ($r->tanggal) {
                    $t = explode('-', $r->tanggal);
                    $q->whereDate('booking.tanggal', '>=', Carbon::parse(trim(str_replace('/', '-', $t[0]), ' '))->format('Y-m-d'))
                        ->whereDate('booking.tanggal', '<=', Carbon::parse(trim(str_replace('/', '-', $t[1]), ' '))->format('Y-m-d'));
                        
                }
            })
            ->orderBy('created_at', 'DESC')
            ->get();
        // hitung total
        $data['total'] = 0;
        foreach ($data['booking'] as $key => $value) {
            if ($value->status == 1) {
                $data['total'] += $value->price_total;
            }
        }
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
            $x = BookingModel::create([
                'id' => $request->idbooking,
                'nama' => $request->nama,
                'email' => $request->email,
                'nohp' => $request->nohp,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'upload' => $file,
                'status' => $request->status,
            ]);
            // show alert
            GlobalHelper::messagereturn($x);
            // respon data
            return redirect('/booking');
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
            $x = BookingModel::where('id', $id)->update([
                'id' => $request->idbooking,
                'nama' => $request->nama,
                'email' => $request->email,
                'nohp' => $request->nohp,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'upload' => $file,
                'status' => $request->status,
            ]);
            // show alert
            GlobalHelper::messagereturn($x);
            // respon data
            return redirect('/booking');
        }
    }
    public function destroy(string $id)
    {
        // hapus data di table booking berdasarkan id
        $x = BookingModel::where('id', $id)->delete();
        // show alert
        GlobalHelper::messagereturn($x);
        return redirect('/booking');
    }
}
