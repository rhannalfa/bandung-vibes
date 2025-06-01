<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata; // Import model Wisata jika Anda menggunakannya

class WisataController extends Controller
{
    public function index()
    {
        // Ambil semua data wisata dari database
        // Jika Anda tidak menggunakan database, Anda bisa membuat array statis di sini
        $wisatas = Wisata::all(); // Mengambil semua data dari tabel 'wisatas'

        // Mengirim data wisata ke view
        return view('home.wisata.index', compact('wisatas'));
    }
    public function home()
    {
        // Ambil semua data wisata dari database
        // Jika Anda tidak menggunakan database, Anda bisa membuat array statis di sini
        $wisatas = Wisata::all(); // Mengambil semua data dari tabel 'wisatas'

        // Mengirim data wisata ke view
        return view('home.home', compact('wisatas'));
    }

    public function show($id)
    {
        // Cari wisata berdasarkan ID
        $wisata = Wisata::findOrFail($id); // Akan otomatis 404 jika tidak ditemukan
        return view('home.wisata.show', compact('wisata'));
    }
}