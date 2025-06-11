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
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}