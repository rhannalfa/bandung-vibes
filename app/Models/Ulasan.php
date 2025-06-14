<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasan'; // Pastikan nama tabel benar

    protected $fillable = [
        'user_id',
        'paket_wisata_id',
        'rating',
        'komentar',
    ];

    // Definisi relasi

    /**
     * Ulasan ini dimiliki oleh satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Ulasan ini untuk satu PaketWisata.
     */
    public function paketWisata()
    {
        return $this->belongsTo(PaketWisata::class);
    }
}
