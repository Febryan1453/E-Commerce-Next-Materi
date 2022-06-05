<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as RYAN;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        if (auth()->user()->role !== 'Admin') {
            abort(RYAN::HTTP_FORBIDDEN);
        }

        $title = "Transaksi - Pending";
        $keyword = "";
        // $user = User::where('role','Admin')->get();
        $pesanan = Pesanan::orderBy('id', 'desc')->where('status', 1)->paginate(10);
        return view('transaksi.index', [
            'title' => $title,
            'keyword' => $keyword,
            'pesanan' => $pesanan,
        ]);
    }

    public function editPending(Request $request)
    {
        // return dd($request);
        $pesanan = Pesanan::where('id', $request->id)->first();
        $pesanan->status = $request->status;
        $pesanan->update();
        return redirect()->back();
    }

    public function cariPesanan(Request $request)
    {
        $title = "Transaksi - Pending";
        $keyword = $request->cari;
        $pesanan = Pesanan::where('status', 1)->where('kode_pemesanan', 'like', "%" . $keyword . "%")->paginate(10);
        return view('transaksi.index', [
            'title' => $title,
            'keyword' => $keyword,
            'pesanan' => $pesanan,
        ]);
    }

    public function lunas()
    {
        if (auth()->user()->role !== 'Admin') {
            abort(RYAN::HTTP_FORBIDDEN);
        }
        $title = "Transaksi - Lunas";
        $keyword = "";
        // $user = User::where('role','Admin')->get();
        $pesanan = Pesanan::orderBy('id', 'desc')->where('status', 2)->paginate(10);
        return view('transaksi.lunas', [
            'title' => $title,
            'keyword' => $keyword,
            'pesanan' => $pesanan,
        ]);
    }

    public function editLunas(Request $request)
    {
        // dd($request);
        $pesanan = Pesanan::where('id', $request->id)->first();
        $pesanan->status = $request->status;
        $pesanan->update();
        return redirect()->back();
    }


    public function dikirim()
    {
        if (auth()->user()->role !== 'Admin') {
            abort(RYAN::HTTP_FORBIDDEN);
        }
        $title = "Transaksi - Dikirim";
        $keyword = "";
        // $user = User::where('role','Admin')->get();
        $pesanan = Pesanan::orderBy('id', 'desc')->where('status', 3)->paginate(10);
        return view('transaksi.dikirim', [
            'title' => $title,
            'keyword' => $keyword,
            'pesanan' => $pesanan,
        ]);
    }
}
