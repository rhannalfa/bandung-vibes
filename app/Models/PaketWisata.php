<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    use HasFactory;

    protected $table = 'paket_wisata'; // Pastikan nama tabel benar

    protected $fillable = [
        'nama_paket',
        'deskripsi_paket',
        'destinasi',
        'durasi',
        'harga_paket',
        'gambar_utama',
        'slug',
        'gambar_lainnya',
        'fasilitas',
    ];

    protected $casts = [
        'gambar_lainnya' => 'array',
        'fasilitas' => 'array',
    ];
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    // Relasi: Satu paket wisata bisa memiliki banyak ulasan
    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }

     // Relasi Satu paket wisata bisa memiliki banyak pesanan
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
