<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Menampilkan daftar semua transaksi.
     */
    public function index()
    {
        // Ambil semua transaksi beserta relasi user dan paket_wisata, urutkan dari terbaru
        $transaksi = Transaksi::with(['user', 'paketWisata'])->latest()->paginate(10);
        return view('admin.transaksi.index', compact('transaksi'));
    }

    /**
     * Menampilkan detail satu transaksi.
     */
    public function show(Transaksi $transaksi)
    {
        // Memuat ulang relasi jika belum dimuat (eager loading)
        $transaksi->load('user', 'paketWisata');
        return view('admin.transaksi.show', compact('transaksi'));
    }
    // Anda bisa menambahkan method untuk update status transaksi, atau fitur lain di sini
}