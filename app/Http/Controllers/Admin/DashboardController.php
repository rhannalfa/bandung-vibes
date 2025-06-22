<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketWisata; // Import Model PaketWisata
use App\Models\Pesanan;    // Import Model Transaksi
use App\Models\Ulasan;    // Import Model Transaksi
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPaketWisata = PaketWisata::count();
        $totalPesanan = Pesanan::count(); // Anda bisa menambahkan kondisi status sukses jika perlu
        $totalUlasan = Ulasan::count(); // Anda bisa menambahkan kondisi status sukses jika perlu
        return view('admin.dashboard', compact('totalPaketWisata', 'totalPesanan', 'totalUlasan'));
    }
}
