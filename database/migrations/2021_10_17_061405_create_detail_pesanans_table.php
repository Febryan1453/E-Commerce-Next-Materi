<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPesanansTable extends Migration
{
    
    // Id
    // Produk_id
    // Pesanan_id
    // Jumlah_pesanan
    // Total_harga
    // Catatan

    public function up()
    {
        Schema::create('detail_pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id');
            $table->foreignId('pesanan_id');
            $table->integer('jumlah_pesanan');
            $table->integer('total_harga');    
            $table->string('catatan');      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pesanans');
    }
}
