<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function index()
    {
        $data['admin'] = User::get();

        return view('admin.pages.admin.index', $data);
    }

    public function create()
    {

        return view('admin.pages.admin.tambah');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            // 'id' => $request->idadmin,
            'nama' => 'required',
            'email' => 'required',
            'level' => 'required',
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $insert =
            [
                'name' => $request->nama,
                'email' => $request->email,
                'level' => $request->level,
            ];

        if ($request->password) {
            $insert['password'] = Hash::make($request->password);
        }

        User::updateOrCreate(
            [
                'id' => $request->id,
            ],
            $insert
        );
        return redirect('/adminxxx')->with('ss', 'Berhasil');
    }

    public function show(string $id)
    {
        $data['x'] = User::where('id', $id)->first();
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
        User::where('id', $id)->delete();
        return redirect('/admin')->with('success', 'Berhasil hapus data');
    }
}
