<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'user_id',
        'paket_wisata_id', // Perubahan di sini
        'jumlah_peserta',   // Perubahan di sini
        'total_harga',
        'status_pembayaran',
        'kode_transaksi',
        'metode_pembayaran',
    ];

    public function paketWisata() // Perubahan relasi
    {
        return $this->belongsTo(PaketWisata::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}