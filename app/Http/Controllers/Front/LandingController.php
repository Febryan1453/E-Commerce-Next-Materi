<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\DetailPesanan;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Front\UserRepository;
use App\Models\User;

class LandingController extends Controller
{

    public function __construct()
    {
        $kategori   = Kategori::orderBy('id', 'desc')->get();

        View::share([
            'kategori' => $kategori
        ]);
    }

    public function index()
    {
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($pesanan) {
                $jumlah = DetailPesanan::where('pesanan_id', $pesanan->id)->count();
            } else {
                $jumlah = 0;
            }
            View::share([
                'jumlah' => $jumlah
            ]);
        }

        $title      = "Beranda - Toko IDN";
        $produk     = Produk::take(8)->orderBy('id', 'desc')->get();
        return view('front.yield.index', compact('title', 'produk'));
    }

    public function semuaProduk()
    {
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($pesanan) {
                $jumlah = DetailPesanan::where('pesanan_id', $pesanan->id)->count();
            } else {
                $jumlah = 0;
            }
            View::share([
                'jumlah' => $jumlah
            ]);
        }

        $title      = "Semua Produk - Toko IDN";
        $produk     = Produk::orderBy('id', 'desc')->get();
        return view('front.yield.semua-produk', compact('title', 'produk'));
    }

    public function cariProduk(Request $request)
    {
        // return dd($request);
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($pesanan) {
                $jumlah = DetailPesanan::where('pesanan_id', $pesanan->id)->count();
            } else {
                $jumlah = 0;
            }
            View::share([
                'jumlah' => $jumlah
            ]);
        }

        $title = "Semua Produk - Toko IDN";
        $keyword = $request->cari;
        $produk = Produk::where('nama_produk', 'like', "%" . $keyword . "%")->get();
        return view('front.yield.cari-semua-produk', compact('title', 'produk', 'keyword'));
    }

    public function delPesananKeranjang($id)
    {
        $detail = DetailPesanan::find($id);

        $produk = Produk::where('id', $detail->produk_id)->first();

        if (!empty($detail)) {

            $pesanan = Pesanan::where('id', $detail->pesanan_id)->first();
            $jumlah_pesanan_detail = DetailPesanan::where('pesanan_id', $pesanan->id)->count();
            if ($jumlah_pesanan_detail == 1) {
                $pesanan->delete();
            } else {
                $pesanan->total_harga = $pesanan->total_harga - $detail->total_harga;
                $pesanan->update();
            }

            $detail->delete();
        }

        return redirect()->back()->with('Success', "$produk->nama_produk dihapus dari keranjang !");
    }

    public function detailProduk($slug)
    {
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($pesanan) {
                $jumlah = DetailPesanan::where('pesanan_id', $pesanan->id)->count();
            } else {
                $jumlah = 0;
            }
            View::share([
                'jumlah' => $jumlah
            ]);
        }

        $title      = "Detail produk";
        $produk     = Produk::where('slug', $slug)->first();
        return view('front.yield.detail', compact('title', 'produk'));
    }

    public function perKategori($slug)
    {
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($pesanan) {
                $jumlah = DetailPesanan::where('pesanan_id', $pesanan->id)->count();
            } else {
                $jumlah = 0;
            }
            View::share([
                'jumlah' => $jumlah
            ]);
        }

        $nama_kat   = Kategori::where('slug', $slug)->first();
        $title      = "Kategori $nama_kat->nama_kategori";
        $produk     = Produk::where('kategori_id', $nama_kat->id)->get();
        return view('front.yield.per-kategori', [
            'title'        => $title,
            'produk'       => $produk,
            'nama_kat'     => $nama_kat
        ]);
    }

    public function addProduktoKeranjang(Request $request)
    {
        // return dd($request);

        $harga_detail = $request->harga * $request->jumlah;

        //Cek apa user punya pesanan utama
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //Save atau Update pesanan utama
        if (empty($pesanan)) {
            Pesanan::create([
                'user_id' => Auth::user()->id,
                'total_harga' => $harga_detail,
                'status' => 0,
                'kode_unik' => mt_rand(100, 999),
            ]);
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

            // https://code.tutsplus.com/id/tutorials/generate-random-alphanumeric-strings-in-php--cms-32132
            $karakter_kode = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pesanan->kode_pemesanan = substr(str_shuffle($karakter_kode), 0, 10);

            $pesanan->update();
        } else {
            $pesanan->total_harga =  $pesanan->total_harga + $harga_detail;
            $pesanan->update();
        }

        //Meyimpanan Pesanan Detail
        if ($request->catatan == '') {
            DetailPesanan::create([
                'produk_id'         => $request->id,
                'pesanan_id'        => $pesanan->id,
                'jumlah_pesanan'    => $request->jumlah,
                'catatan'           => 'Tidak ada catatan.',
                'total_harga'       => $harga_detail,
            ]);
        } else {
            DetailPesanan::create([
                'produk_id'         => $request->id,
                'pesanan_id'        => $pesanan->id,
                'jumlah_pesanan'    => $request->jumlah,
                'catatan'           => $request->catatan,
                'total_harga'       => $harga_detail,
            ]);
        }


        return redirect()->back()->with('Success', "$request->nama_produk ditambahkan ke keranjang !");
    }

    public function keranjang()
    {
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($pesanan) {
                $jumlah = DetailPesanan::where('pesanan_id', $pesanan->id)->count();
            } else {
                $jumlah = 0;
            }
            View::share([
                'jumlah' => $jumlah
            ]);
        }

        $details = [];

        if ($jumlah == 0) {
            $title = "Keranjang - Belum ada produk dikeranjang";
        } else {
            $title = "Keranjang - Ada $jumlah pesanan belum checkout";
        }


        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if ($pesanan) {
            $details = DetailPesanan::where('pesanan_id', $pesanan->id)->get();
        }

        return view('front.yield.keranjang', compact('title', 'details', 'pesanan'));
    }

    public function checkout(Request $request, $id)
    {
        // return dd($request);

        $user = User::where('id', $id)->first();
        $user->number_phone = $request->hp;
        $user->address = $request->alamat;
        $user->update();

        $pesanan = Pesanan::where('user_id', $id)->where('status', 0)->first();
        $pesanan->status = 1;
        $pesanan->update();

        return redirect()->route('landing.history')->with('Success', "Berhasil Checkout !");
    }

    public function history()
    {
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($pesanan) {
                $jumlah = DetailPesanan::where('pesanan_id', $pesanan->id)->count();
            } else {
                $jumlah = 0;
            }
            View::share([
                'jumlah' => $jumlah
            ]);
        }

        $title = "History";

        if (Auth::user()) {
            $pesanans = Pesanan::orderBy('id', 'desc')->where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
        }

        return view('front.yield.history', compact('title', 'pesanans'));
    }
}
