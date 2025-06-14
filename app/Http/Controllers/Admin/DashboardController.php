<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketWisata; // Import Model PaketWisata
use App\Models\Transaksi;    // Import Model Transaksi
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPaketWisata = PaketWisata::count();
        $totalTransaksi = Transaksi::count(); // Anda bisa menambahkan kondisi status sukses jika perlu
        return view('admin.dashboard', compact('totalPaketWisata', 'totalTransaksi'));
    }
}