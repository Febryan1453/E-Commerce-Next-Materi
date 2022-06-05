<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',  
        'slug',     
        'id', 
    ];

    public function produks()
    {
        // hasMany itu adalah memiliki banyak 
        // contoh : 1 kategori punya banyak post

         // belongsTo itu adalah hanya punya 1
        // contoh : 1 post hanya punya 1 kategori
        return $this->hasMany(Produk::class, 'kategori_id', 'id');
    }
}
