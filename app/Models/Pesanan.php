<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kode_pemesanan',
        'status',
        'total_harga',
        'kode_unik',        
    ];

    public function details()
    {
        return $this->hasMany(DetailPesanan::class, 'id', 'pesanan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
