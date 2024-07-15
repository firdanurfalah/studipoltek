<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use Carbon\Carbon;
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
    public function index(Request $r)
    {
        // ambil data login
        $auth = Auth::user();

        $x = [];
        // ambil data perbulan dalam setahun

        $tahunan = [];
        $x['tanggal'] = now();
        if ($r->tanggal) {
            $x['tanggal'] = $r->tanggal;
        }
        // return $r->all();
        $x['bulanan'] = BookingModel::select(
            'booking.*',
            'product_models.nama as nama_product'
        )
            ->join('product_models', 'product_models.id', 'booking.product_id')
            ->where(function ($q) use ($auth, $r) {
                // cek level user
                if ($auth->level == 'user') {
                    $q->where('booking.user_id', $auth->id);
                }
                if ($r->tanggal) {
                    $t = explode('-', $r->tanggal);
                    $q->whereDate('booking.tanggal', '>=', Carbon::parse(trim(str_replace('/', '-', $t[0]), ' '))->format('Y-m-d'))
                        ->whereDate('booking.tanggal', '<=', Carbon::parse(trim(str_replace('/', '-', $t[1]), ' '))->format('Y-m-d'));
                }
            })
            ->orderBy('booking.created_at', 'DESC')
            ->get();
        $x['total'] = 0;
        foreach ($x['bulanan'] as $key => $value) {
            if ($value->status == 1) {
                $x['total'] += $value->price_total;
            }
        }
        for ($i = 1; $i < 13; $i++) {
            $b1 = BookingModel::select(
                'booking.*',
                'product_models.nama as nama_product'
            )
                ->join('product_models', 'product_models.id', 'booking.product_id')
                ->where(function ($q) use ($auth) {
                    // cek level user
                    if ($auth->level == 'user') {
                        return $q->where('booking.user_id', $auth->id);
                    }
                })
                ->whereMonth('booking.tanggal', $i)
                ->whereYear('booking.tanggal', now()->year)
                ->orderBy('booking.created_at', 'DESC')
                ->get();
            array_push($tahunan, count($b1));
        }
        $x['tahunan'] = $tahunan;
        // return $x;
        // menampilkan view dashboad
        return view('admin.dashboard', $x);
    }
}
