<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BookingModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $x = [];
        $x['x'] = User::where('id', Auth::user()->id)->first();
        return view('front.user.profile', $x);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        // bila gagal kembali ke halaman sebelumnya
        if ($valid->fails()) {
            return Redirect::back()->withInput($request->all())->withErrors($valid)->with('info', 'Harap Cek Data Anda');
        }

        $i = [
            'name' => $request->name
        ];
        if ($request->password) {
            $i['password'] = Hash::make($request->password);
        }
        $u = User::updateOrCreate([
            'id' => $request->id
        ], $i);
        return redirect('/profile')->with('ss', 'Berhasil update data');
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
        //
    }

    public function historybooking()
    {
        $x = [];
        $x['x'] = BookingModel::select()
            ->with(
                'product',
                'promo',
            )
            ->where('user_id', Auth::user()->id)
            ->get();
        // return $x;
        return view('front.user.historybooking', $x);
    }
}
