<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan'; // Pastikan nama tabel benar

    protected $fillable = [
        'user_id',
        'paket_wisata_id',
        'kode_pesanan',
        'tanggal_tour',
        'jumlah_dewasa',
        'jumlah_anak',
        'total_harga',
        'status_pesanan',
        'nama_pemesan',
        'email_pemesan',
        'telepon_pemesan',
        'catatan_tambahan',
    ];

    // Definisi relasi

    /**
     * Pesanan ini dibuat oleh satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Pesanan ini untuk satu PaketWisata.
     */
    public function paketWisata()
    {
        return $this->belongsTo(PaketWisata::class);
    }
}
