<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Front\LandingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Autentikasi
Auth::routes(['verify' => true]);


Route::get('/ganti', [App\Http\Controllers\Auth\ChangePasswordController::class, 'ganti'])->name('ganti')->middleware('auth');
Route::put('/update-pass', [App\Http\Controllers\Auth\ChangePasswordController::class, 'updatePass'])->name('update-pass')->middleware('auth');
Route::resource('/profile', UserController::class)->middleware('auth')->except('create', 'store', 'destroy');

// Hanya Admin
Route::get('/data-members', [UserController::class, 'dataUserMember'])->name('data.user.index');
Route::get('/data-admin', [UserController::class, 'dataUserAdmin'])->name('data.user.admin.index');
Route::get('/cari-members', [UserController::class, 'cariMember'])->name('cari.member');
Route::get('/cari-admin', [UserController::class, 'cariAdmin'])->name('cari.admin');
Route::post('/add-user', [UserController::class, 'addUser'])->name('add.user');


//Hanya Admin untuk lihat data transaksi
Route::get('/pending', [TransaksiController::class, 'index'])->name('transaksi.index')->middleware('auth');
Route::put('/edit-pending', [TransaksiController::class, 'editPending'])->name('transaksi.edit.pending')->middleware('auth');
Route::get('/cari-pesan', [TransaksiController::class, 'cariPesanan'])->name('transaksi.cari.pesanan')->middleware('auth');
Route::get('/lunas', [TransaksiController::class, 'lunas'])->name('transaksi.lunas')->middleware('auth');
Route::put('/edit-lunas', [TransaksiController::class, 'editLunas'])->name('transaksi.edit.lunas')->middleware('auth');
Route::get('/dikirm', [TransaksiController::class, 'dikirim'])->name('transaksi.dikirim')->middleware('auth');


//Front Web / Landing Web
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/semua-produk', [LandingController::class, 'semuaProduk'])->name('semua');
Route::get('/cari-semua-produk', [LandingController::class, 'cariProduk'])->name('mencari');
Route::get('/detail/{slug}', [LandingController::class, 'detailProduk'])->name('detail');
Route::get('/kategori/{slug}', [LandingController::class, 'perKategori'])->name('landing.kategori');
Route::post('/tambah-produk-ke-keranjang', [LandingController::class, 'addProduktoKeranjang'])->name('landing.tambah');
Route::get('/keranjang', [LandingController::class, 'keranjang'])->name('landing.keranjang')->middleware('auth');
Route::delete('/del-pesanan-di-keranjang/{id}', [LandingController::class, 'delPesananKeranjang'])->name('del.pes.keranjang');
Route::put('/checkout/{id}', [LandingController::class, 'checkout'])->name('landing.checkout')->middleware('auth');
Route::get('/history', [LandingController::class, 'history'])->name('landing.history')->middleware('auth');


//List Produk & Search
Route::resource('/produk', ProdukController::class)->middleware('auth')->middleware('verified');
Route::get('/cari', [ProdukController::class, 'search'])->name('cari')->middleware('auth')->middleware('verified');


//Kategori Produk & Search
Route::get('/produk-kategori', [ProdukController::class, 'indexKategori'])->name('kategori.index')->middleware('auth');
Route::get('/cari-kategori', [ProdukController::class, 'cariKategori'])->name('kategori.cari')->middleware('auth');
Route::post('/tambah-kategori', [ProdukController::class, 'addKategori'])->name('kategori.add')->middleware('auth');
Route::put('/edit-kategori/{id}', [ProdukController::class, 'editKategori'])->name('kategori.edit')->middleware('auth');
Route::delete('/del-kategori/{id}', [ProdukController::class, 'hapusKategori'])->name('kategori.delete')->middleware('auth');
Route::put('/update-produk-dengan-modal/{id}', [ProdukController::class, 'updateDenganModal'])->name('produk.update.modal')->middleware('auth');

//Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');




//Route testing
// Route::get('/reset-pass', function () {
//     return view('auth.passwords.reset2');
// });