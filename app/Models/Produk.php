<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_produk',   
        'kategori_id',     
        'harga'       ,  
        'status'       ,   
        'berat' ,
        'img',
        'slug',
    ];

    public function kategori()
    {
         // hasMany itu adalah memiliki banyak 
        // contoh : 1 kategori punya banyak post

         // belongsTo itu adalah hanya punya 1
        // contoh : 1 post hanya punya 1 kategori
        return $this->belongsTo(Kategori::class);
        // return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function details()
    {
        return $this->hasMany(DetailPesanan::class, 'id','produk_id' );
    }

}
