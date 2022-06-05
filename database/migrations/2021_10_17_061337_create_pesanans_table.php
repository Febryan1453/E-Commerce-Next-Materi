<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    
    // Id
    // User_id
    // Kode_pemesanan
    // Status (Sukses/Pending/Batal)
    // Total_harga
    // Kode_unik (dibelakang harga)

    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('kode_pemesanan')->nullable();
            $table->integer('status')->default(0);
            $table->integer('total_harga');
            $table->integer('kode_unik');
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
        Schema::dropIfExists('pesanans');
    }
}
