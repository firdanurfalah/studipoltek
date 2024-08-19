<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use App\Models\BookingModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;

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
            'name' => 'required|regex:/^[a-zA-Z ]*$/',
            'no_hp' => 'required|min:10|max:15',
            'password' => ['nullable', 'string', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()],
        ]);

        // bila gagal kembali ke halaman sebelumnya
        if ($valid->fails()) {
            return Redirect::back()->withInput($request->all())->withErrors($valid)->with('info', 'Harap Cek Data Anda');
        }

        $i = [
            'name' => $request->name,
            'no_hp' => $request->no_hp
        ];
        if ($request->password) {
            $i['password'] = Hash::make($request->password);
        }
        $u = User::updateOrCreate([
            'id' => $request->id
        ], $i);
        if ($u) {
            Alert::info('Data Tersimpan');
            return redirect('/profile')->with('ss', 'Berhasil update data');
        }
        Alert::info('Data Gagal Tersimpan');
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
            ->orderBy('created_at', 'DESC')
            ->get();
        // return $x;
        return view('front.user.historybooking', $x);
    }

    public function konfirmasijam(Request $request)
    {
        $i = [
            'status' => $request->status,
            'last_edit_user' => Auth::id(),
        ];
        if ($request->jam) {
            $i['jam'] = $request->jam;
        }
        $b = BookingModel::where('id', $request->idbookingjam)->update($i);
        if ($b) {
            return Redirect::back()->with('info', 'Data tersimpan');
        }
        return Redirect::back()->with('info', 'Data tidak tersimpan');
    }

    public function showresetpassword()
    {
        return view('auth.passwords.email');
    }

    public function resetpassword(Request $r)
    {
        // Reset Password V2
        // Cek ketersediaan user
        $u = User::where('email', $r->email)->first();
        if (!$u) {
            return Redirect::back()->with('info', 'Email tidak ditemukan');
        }

        User::where('email', $r->email)->update([
            'link_active' => 1
        ]);
        $p = preg_replace("/[^A-Z]+/", "", $u->password);
        $e = $u->email;
        // send email
        $reset = [
            'subject' => 'Reset Password',
            'title' => 'Reset Password',
            'body' => 'Silahkan kunjungi link yang tertera ' . env('APP_URL') . 'inputpassword/' . $p . '/' . $e . ' untuk reset password',
        ];
        Mail::to($r->email)->send(new SendEmail($reset));
        return Redirect::back()->with('info', 'Email terkirim, silahkan cek inbox anda');
        // return $r->all();
        // Reset Password V1
        // validasi inputan
        $valid = Validator::make($r->all(), [
            'email' => 'required|exists:users,email',
            'password' => ['required', 'string', 'confirmed', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()],
            'password_confirmation' => 'required|same:password'
        ], [
            'email.exists' => 'Email tidak ditemukan',
            'password.confirmed' => 'Password tidak sama',
            'password_confirmation.same' => 'Password tidak sama'
        ]);

        // bila gagal kembali ke halaman sebelumnya
        if ($valid->fails()) {
            return Redirect::back()->withInput($r->all())->withErrors($valid)->with('info', 'Harap Cek Data Anda');
        }
        // return $r;

        $u = User::where('email', $r->email)->update([
            'password' => Hash::make($r->password)
        ]);

        if ($u) {
            return Redirect::to('/login')->with('info', 'Reset password berhasil silahkan login kembali');
        }
        return Redirect::back()->with('info', 'Data tidak tersimpan');
    }

    public function inputpassword($p, $e)
    {
        $x['e'] = User::where('email', $e)
            // ->where('password', $p)
            ->first();
        $pk = preg_replace("/[^A-Z]+/", "", $x['e']->password);
        $active = $x['e']->link_active;
        if (!$x['e']) {
            Alert::info('Email tidak ditemukan');
            return Redirect::back();
        }
        if ($pk == $p) {
            if ($active == 1) {
                User::where('email', $e)->update([
                    'link_active' => 0
                ]);
                return view('auth.passwords.newpassword', $x);
            }
            Alert::info('Link kadaluarsa harap reset password ulang');
            return Redirect::to('/')->with('info', 'Link kadaluarsa harap reset password ulang');
        }
        return Redirect::to('/login')->with('info', 'Token tidak ditemukan');
    }
    public function savepassword(Request $r)
    {
        $u = User::where('email', $r->email)->update([
            'password' => Hash::make($r->password)
        ]);

        if ($u) {
            return Redirect::to('/login')->with('info', 'Reset password berhasil silahkan login kembali');
        }
        return Redirect::back()->with('info', 'Data tidak tersimpan');
    }
}
