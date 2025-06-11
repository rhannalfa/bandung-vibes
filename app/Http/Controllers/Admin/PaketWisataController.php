<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Untuk slug
use Illuminate\Support\Facades\Storage; // Untuk upload gambar

class PaketWisataController extends Controller
{
    /**
     * Menampilkan daftar semua paket wisata.
     */
    public function index()
    {
        $paketWisata = PaketWisata::latest()->paginate(10);
        return view('admin.paket-wisata.index', compact('paketWisata'));
    }

    /**
     * Menampilkan form untuk membuat paket wisata baru.
     */
    public function create()
    {
        return view('admin.paket-wisata.create');
    }

    /**
     * Menyimpan paket wisata baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi_paket' => 'required|string',
            'destinasi' => 'required|string|max:255',
            'durasi' => 'nullable|string|max:255',
            'harga_paket' => 'required|numeric|min:0',
            'gambar_utama' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar_utama')) {
            $imageName = time().'.'.$request->gambar_utama->extension();
            $request->gambar_utama->storeAs('public/paket-wisata', $imageName); // Simpan di storage/app/public/paket-wisata
            $data['gambar_utama'] = 'paket-wisata/' . $imageName; // Simpan path relatif
        }

        $data['slug'] = Str::slug($request->nama_paket); // Generate slug

        PaketWisata::create($data);

        return redirect()->route('admin.paket-wisata.index')->with('success', 'Paket wisata berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail paket wisata (opsional).
     */
    public function show(PaketWisata $paket_wisatum) // Pastikan nama parameter cocok dengan route model binding
    {
        return view('admin.paket-wisata.show', compact('paket_wisatum'));
    }

    /**
     * Menampilkan form untuk mengedit paket wisata.
     */
    public function edit(PaketWisata $paket_wisatum)
    {
        return view('admin.paket-wisata.edit', compact('paket_wisatum'));
    }

    /**
     * Memperbarui data paket wisata di database.
     */
    public function update(Request $request, PaketWisata $paket_wisatum)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi_paket' => 'required|string',
            'destinasi' => 'required|string|max:255',
            'durasi' => 'nullable|string|max:255',
            'harga_paket' => 'required|numeric|min:0',
            'gambar_utama' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar_utama')) {
            // Hapus gambar lama jika ada
            if ($paket_wisatum->gambar_utama && Storage::exists('public/' . $paket_wisatum->gambar_utama)) {
                Storage::delete('public/' . $paket_wisatum->gambar_utama);
            }
            $imageName = time().'.'.$request->gambar_utama->extension();
            $request->gambar_utama->storeAs('public/paket-wisata', $imageName);
            $data['gambar_utama'] = 'paket-wisata/' . $imageName;
        } else {
            // Jika tidak ada gambar baru diupload, gunakan gambar lama
            $data['gambar_utama'] = $paket_wisatum->gambar_utama;
        }

        $data['slug'] = Str::slug($request->nama_paket); // Perbarui slug jika nama berubah

        $paket_wisatum->update($data);

        return redirect()->route('admin.paket-wisata.index')->with('success', 'Paket wisata berhasil diperbarui.');
    }

    /**
     * Menghapus paket wisata dari database.
     */
    public function destroy(PaketWisata $paket_wisatum)
    {
        // Hapus gambar terkait jika ada
        if ($paket_wisatum->gambar_utama && Storage::exists('public/' . $paket_wisatum->gambar_utama)) {
            Storage::delete('public/' . $paket_wisatum->gambar_utama);
        }
        $paket_wisatum->delete();
        return redirect()->route('admin.paket-wisata.index')->with('success', 'Paket wisata berhasil dihapus.');
    }
}