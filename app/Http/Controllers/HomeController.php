<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // ambil data login
        $auth = Auth::user();

        $x = [];
        // ambil data perbulan dalam setahun

        $tahunan = [];
        for ($i = 1; $i < 13; $i++) {
            $b = BookingModel::select()
                ->where(function ($q) use ($auth) {
                    // cek level user
                    if ($auth->level == 'user') {
                        return $q->where('user_id', $auth->id);
                    }
                })
                ->whereMonth('tanggal', $i)
                ->whereYear('tanggal', now()->year)
                ->count();
            array_push($tahunan, $b);
        }
        $x['tahunan'] = $tahunan;

        // menampilkan view dashboad
        return view('admin.dashboard', $x);
    }
}
