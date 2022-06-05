<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Pesanan;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status', 0)->first();
            if ($pesanan) {
                $jumlah = DetailPesanan::where('pesanan_id', $pesanan->id)->count();
            } else {
                $jumlah = 0;
            }
            View::share([
                'jumlah'=> $jumlah,
                'pesanan'=> $pesanan,
            ]);
        }

        $title = "Checkout";
        return view('front.yield.checkout', compact('title'));
    }
}
