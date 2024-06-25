<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cobaController extends Controller
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey    = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized  = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds        = config('services.midtrans.is3ds');
    }
    public function pay(Request $request){
        // DB::transaction(function() use($request) { 
        //     $donation = \App\Models\Donation::create([
        //         'code'   => 'DONATION-' . mt_rand(100000, 999999),
        //         'name'   => $request->name,
        //         'email'  => $request->email,
        //         'amount' => $request->amount,
        //         'note'   => $request->note,
        //     ]);

            $payload = [
                'transaction_details' => [
                    'order_id'     => '3335',
                    'gross_amount' => '2000',
                ],
                'customer_details' => [
                    'first_name' => 'nayla',
                    'email'      => 'firdafalah822@gmail.com',
                ],
                'item_details' => [
                    [
                        'id'            => '3335',
                        'price'         => '2000',
                        'quantity'      => 1,
                        'name'          => 'payment to snapguide' ,
                        'brand'         => 'payment',
                        'category'      => 'payment',
                        'merchant_name' => 'snapguide',
                    ],
                ],
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($payload);
            // $donation->snap_token = $snapToken;
            // $donation->save();

            $this->response['snap_token'] = $snapToken;
 
        return response()->json([
            'status'     => 'success',
            'snap_token' => $this->response,
        ]);
    }

}
