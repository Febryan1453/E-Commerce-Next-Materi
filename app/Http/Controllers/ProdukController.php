<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdukRequest;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukController extends Controller
{   
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        if(auth()->user()->role !== 'Admin'){
            // abort(403);
            return view('errors.403');
        }
        $title = "List Produk";
        $kategori = Kategori::all();
        $keyword = "";
        $produk = Produk::orderBy('id', 'desc')->paginate(5);
        // $produk = DB::table('produks')->simplePaginate(3);
        return view('produk.index', compact('title', 'produk','kategori','keyword'));
    }

    public function search(Request $request)
    {
        // https://www.indeveloper.id/2021/03/tutorial-laravel-cara-membuat-pencarian.html
        $title = "List Produk";
        $keyword = $request->cari;
        $kategori = Kategori::all();
        $produk = Produk::where('nama_produk', 'like', "%" . $keyword . "%")->paginate(5);
        return view('produk.index', compact('title', 'produk','kategori','keyword'));
    }

    public function create()
    {
        if(auth()->user()->role !== 'Admin'){
            abort(403);
            // echo "Terlarang";
            // return;
        }
        $title = "Tambah Produk";
        $kategori = Kategori::all();
        return view('produk.create', compact('title','kategori'));
    }

    public function store(ProdukRequest $request)
    {
        // return dd($request);
        
            Produk::create([
                'nama_produk'     => $request->nama_produk,
                'harga'           => $request->harga,
                'kategori_id'     => $request->kategori_id,
                'status'          => $request->status,
                'berat'           => $request->berat,
                'slug'            => Str::slug($request->nama_produk,'-'),
                'img'             => $request->file('img')->store('image-produk'),
            ]);
            return redirect()->route('produk.index');
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $title = "Edit Produk";
        $produk = Produk::findOrFail($id); 
        $kategori = Kategori::all();
        return view('produk.edit', compact('title', 'produk','kategori'));
    }

    public function update(Request $request, $id)
    {
        // return dd($request);
        if(empty($request->file('img'))){
            $produk = Produk::findOrFail($id);       
            $produk->update([
                'nama_produk'     => $request->nama_produk,
                'harga'           => $request->harga,
                'status'          => $request->status,
                'kategori_id'     => $request->kategori_id,
                'berat'           => $request->berat,
                'slug'            => Str::slug($request->nama_produk,'-'),
            ]);
            return redirect()->route('produk.index');
        }
        else{
            $produk = Produk::findOrFail($id); 
            Storage::delete($produk->img); 
            $produk->update([
                'nama_produk'     => $request->nama_produk,
                'harga'           => $request->harga,
                'status'          => $request->status,
                'kategori_id'     => $request->kategori_id,
                'berat'           => $request->berat,
                'slug'            => Str::slug($request->nama_produk,'-'),
                'img'             => $request->file('img')->store('image-produk'),
            ]);
            return redirect()->route('produk.index');
        }  
    }

    public function updateDenganModal(Request $request)
    {
        // return dd($request);
        if(empty($request->file('img'))){
            $produk = Produk::findOrFail($request->id);       
            $produk->update([
                'nama_produk'     => $request->nama_produk,
                'harga'           => $request->harga,
                'status'          => $request->status,
                'kategori_id'     => $request->kategori_id,
                'berat'           => $request->berat,
                'slug'            => Str::slug($request->nama_produk,'-'),
            ]);
            return redirect()->route('produk.index');
        }
        else{
            $produk = Produk::findOrFail($request->id); 
            Storage::delete($produk->img); 
            $produk->update([
                'nama_produk'     => $request->nama_produk,
                'harga'           => $request->harga,
                'status'          => $request->status,
                'kategori_id'     => $request->kategori_id,
                'berat'           => $request->berat,
                'slug'            => Str::slug($request->nama_produk,'-'),
                'img'             => $request->file('img')->store('image-produk'),
            ]);
            return redirect()->route('produk.index');
        }  
    }

    public function destroy($id)
    {   
        //Tugas 1 ketika hapus data gambarnya juga harus kehapus !
        $produk = Produk::findOrFail($id); 
        Storage::delete($produk->img); 
        $produk->delete();       
        return redirect()->back();
    }

    // {{-- Kategori Produk --}}
    public function indexKategori()
    {
        if(auth()->user()->role !== 'Admin'){
            abort(403);
            // echo "Terlarang";
            // return;
        }
        $keyword = "";
        $title = "Kategori Produk";
        $kategori = Kategori::orderBy('id', 'desc')->paginate(5);
        return view('kategori.index', compact('title', 'kategori','keyword'));
    }

    public function addKategori(Request $request)
    {
        // return dd($request);

        $psn = [
            'required'          => 'Nama kategori dibutuhkan !',
        ];

        $request->validate([
            'nama_kategori'     => 'required',
        ],$psn);
        
        Kategori::create([
            'nama_kategori'     => $request->nama_kategori,
            'slug'              => Str::slug($request->nama_kategori,'-'),
        ]);

        return redirect()->route('kategori.index');
        
    }

    public function cariKategori(Request $request)
    {
        $title = "Kategori Produk";
        $keyword = $request->cari;
        $kategori = Kategori::where('nama_kategori', 'like', "%" . $keyword . "%")->paginate(5);
        return view('kategori.index', compact('title', 'kategori','keyword'));
    }

    public function hapusKategori(Request $request)
    {
        // return dd($request);
        $kategori = Kategori::findOrFail($request->id); 
        $kategori->delete();       
        return redirect()->route('kategori.index');
    }

    public function editKategori(Request $request)
    {
        // return dd($request);
        $kategori = Kategori::findOrFail($request->id); 
        $kategori->update([
            'nama_kategori'     => $request->nama_kategori,
            'slug'              => Str::slug($request->nama_kategori,'-'),
        ]);
        return redirect()->route('kategori.index');
    }
}
