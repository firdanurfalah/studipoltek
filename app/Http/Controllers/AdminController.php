<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Models\AdminModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{

    public function index()
    {
        // set data login
        $auth = Auth::user();
        // ambil data di table user
        $data['admin'] = User::where(function ($q) use ($auth) {
            // jika level admin maka hanya level user yg diambil
            if ($auth->level == 'admin') {
                return $q->where('level', 'user');
            }
        })
            ->get();

        // menampilkan view index
        return view('admin.pages.admin.index', $data);
    }

    public function create()
    {
        // menampilkan view tambah
        return view('admin.pages.admin.tambah');
    }

    public function store(Request $request)
    {
        // validasi inputan
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z ]*$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['nullable', 'string', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()],
            // 'password_confirmation' => 'required|same:password'
        ], [
            'email.unique' => 'Email sudah dipakai',
            // 'password.confirmed' => 'Password tidak sama',
            // 'password_confirmation.same' => 'Password tidak sama'
        ]);
        // response error validasi
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }
        // return $request->all();
        // buat variable simpan
        $insert =
            [
                'name' => $request->nama,
                'email' => $request->email,
                'level' => $request->level,
            ];

        // cek inputan password bila ada maka update password 
        if ($request->password) {
            $insert['password'] = Hash::make($request->password);
        }

        // simpan atau update data
        $x = User::updateOrCreate(
            [
                'id' => $request->id,
            ],
            $insert
        );

        // show alert
        GlobalHelper::messagereturn($x);
        // respon data
        return redirect('/adminxxx');
    }

    public function show(string $id)
    {
        // ambil data di table user berdasarkan id
        $data['x'] = User::where('id', $id)->first();

        // menampilkan view edit dengan data
        return view('admin.pages.admin.edit', $data);
    }

    public function edit(string $id)
    {
        // 
    }

    public function update(Request $request, string $id)
    {
        // 
    }

    public function destroy(string $id)
    {
        // hapus data di table user berdasarakan id
        $x = User::where('id', $id)->delete();
        // show alert
        GlobalHelper::messagereturn($x);
        // return data
        return redirect('/adminxxx')->with('success', 'Berhasil hapus data');
    }
}
