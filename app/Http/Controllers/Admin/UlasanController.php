<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ulasan;      // Import Model Ulasan
use App\Models\PaketWisata; // Import Model PaketWisata (untuk Route Model Binding)
use Illuminate\Support\Facades\Auth; // Untuk mendapatkan user yang sedang login

class UlasanController extends Controller
{
    public function index()
    {
        // Ambil semua ulasan, eager load user dan paket wisata yang terkait
        // Urutkan dari yang terbaru (latest()) dan gunakan paginasi
        $ulasan = Ulasan::with(['user', 'paketWisata'])->oldest()->paginate(10);

        return view('admin.ulasan.index', compact('ulasan'));
    }


    /**
     * Menyimpan ulasan baru untuk paket wisata tertentu.
     */
    public function store(Request $request, PaketWisata $paket_wisata)
    {
        // 1. Validasi input
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:1000', // Batasi panjang komentar
        ]);

        // 2. Buat ulasan baru
        Ulasan::create([
            'user_id' => Auth::id(), // Dapatkan ID user yang sedang login
            'paket_wisata_id' => $paket_wisata->id, // ID paket wisata dari URL
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        // 3. Redirect kembali ke halaman detail paket wisata dengan pesan sukses
        return redirect()->route('detail-paket', $paket_wisata->slug)->with('success', 'Ulasan Anda berhasil ditambahkan!');
    }

    public function show(Ulasan $ulasan)
    {
        // Memuat ulang relasi jika belum dimuat (eager loading)
        $ulasan->load('user', 'paketWisata');
        return view('admin.ulasan.show', compact('ulasan'));
    }
}
