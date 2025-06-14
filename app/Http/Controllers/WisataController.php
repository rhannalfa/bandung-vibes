<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata; // Import model Wisata jika Anda menggunakannya
use App\Models\PaketWisata; // Import model Wisata jika Anda menggunakannya
use App\Models\Ulasan;

class WisataController extends Controller
{
public function index()
    {
        // Ambil data paket wisata, contoh: ambil 4 paket terbaru
        // Anda bisa menyesuaikan query ini sesuai kebutuhan, misalnya berdasarkan kategori/wilayah
        $paketWisataPopuler = PaketWisata::latest()->get();

        // Jika Anda ingin membagi menjadi 2 kategori utama (misal Utara dan Selatan)
        // Ini akan lebih kompleks dan membutuhkan kolom kategori di tabel paket_wisata
        // Untuk contoh ini, kita akan tampilkan semua dalam satu loop.
        // Jika Anda punya kolom 'wilayah' di tabel PaketWisata, Anda bisa melakukan ini:
        // $paketWisataUtara = PaketWisata::where('wilayah', 'Utara')->take(2)->get();
        // $paketWisataSelatan = PaketWisata::where('wilayah', 'Selatan')->take(2)->get();
        // $paketWisataLainnya = PaketWisata::whereNotIn('wilayah', ['Utara', 'Selatan'])->take(3)->get();

        return view('home.wisata.index', compact('paketWisataPopuler')); // Asumsi ini adalah view welcome.blade.php Anda
    }
    public function home()
    {
        // Ambil semua data wisata dari database
        // Jika Anda tidak menggunakan database, Anda bisa membuat array statis di sini
        $paketWisataPopuler = PaketWisata::oldest()->get();

        $paketUtama = $paketWisataPopuler->take(2); // Ambil 2 yang pertama
        $paketLainnya = $paketWisataPopuler->slice(2)->take(3);
        // Data untuk bagian Ulasan Pelanggan
        // Ambil ulasan terbaru, dengan user, dan filter yang punya komentar (opsional)
        $ulasanPelanggan = Ulasan::with('user')
                                 ->where('rating', '>', 3)
                                 ->whereNotNull('komentar') // Hanya ulasan yang ada komentarnya
                                 ->oldest() // Urutkan dari terbaru
                                 ->take(10) // Ambil 3 ulasan teratas untuk ditampilkan
                                 ->get();

        // Mengirim data wisata ke view
        return view('home.home', compact('paketUtama', 'paketLainnya','ulasanPelanggan'));
    }

    public function show($id)
    {
        // Cari wisata berdasarkan ID
        $wisata = Wisata::findOrFail($id); // Akan otomatis 404 jika tidak ditemukan
        return view('home.wisata.show', compact('wisata'));
    }
}
