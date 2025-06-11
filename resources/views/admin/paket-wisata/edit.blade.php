@extends('admin.layouts.app')

@section('title', 'Edit Paket Wisata')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        {{-- Judul Halaman --}}
        <h3 class="text-lg font-semibold mb-4 text-gray-800">Form Edit Paket Wisata: {{ $paket_wisatum->nama_paket }}</h3>

        {{-- Form untuk Edit Paket Wisata --}}
        <form action="{{ route('admin.paket-wisata.update', $paket_wisatum->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Penting: Laravel menggunakan PUT/PATCH untuk update --}}

            {{-- Input: Nama Paket Wisata --}}
            <div class="mb-4">
                <label for="nama_paket" class="block text-gray-700 text-sm font-bold mb-2">Nama Paket Wisata:</label>
                <input type="text" name="nama_paket" id="nama_paket"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                       @error('nama_paket') border-red-500 @enderror"
                       value="{{ old('nama_paket', $paket_wisatum->nama_paket) }}" required>
                @error('nama_paket') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Input: Deskripsi Paket --}}
            <div class="mb-4">
                <label for="deskripsi_paket" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Paket:</label>
                <textarea name="deskripsi_paket" id="deskripsi_paket" rows="5"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                          @error('deskripsi_paket') border-red-500 @enderror" required>{{ old('deskripsi_paket', $paket_wisatum->deskripsi_paket) }}</textarea>
                @error('deskripsi_paket') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Input: Destinasi --}}
            <div class="mb-4">
                <label for="destinasi" class="block text-gray-700 text-sm font-bold mb-2">Destinasi (Contoh: Kawah Putih, Glamping Lakeside):</label>
                <input type="text" name="destinasi" id="destinasi"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                       @error('destinasi') border-red-500 @enderror"
                       value="{{ old('destinasi', $paket_wisatum->destinasi) }}" required>
                @error('destinasi') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Input: Durasi --}}
            <div class="mb-4">
                <label for="durasi" class="block text-gray-700 text-sm font-bold mb-2">Durasi (Contoh: 1 Hari, 3 Hari 2 Malam):</label>
                <input type="text" name="durasi" id="durasi"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                       @error('durasi') border-red-500 @enderror"
                       value="{{ old('durasi', $paket_wisatum->durasi) }}">
                @error('durasi') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Input: Harga Paket --}}
            <div class="mb-4">
                <label for="harga_paket" class="block text-gray-700 text-sm font-bold mb-2">Harga Paket:</label>
                <input type="number" name="harga_paket" id="harga_paket"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                       @error('harga_paket') border-red-500 @enderror"
                       value="{{ old('harga_paket', $paket_wisatum->harga_paket) }}" required min="0">
                @error('harga_paket') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Input: Gambar Utama --}}
            <div class="mb-4">
                <label for="gambar_utama" class="block text-gray-700 text-sm font-bold mb-2">Gambar Utama (Biarkan kosong jika tidak ingin mengubah):</label>
                @if ($paket_wisatum->gambar_utama)
                    <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                    {{-- Menampilkan gambar lama jika ada --}}
                    <img src="{{ Storage::url($paket_wisatum->gambar_utama) }}" alt="Gambar Lama" class="mb-4 h-24 w-auto object-cover rounded-md shadow-sm">
                @else
                    <p class="text-sm text-gray-600 mb-2">Belum ada gambar.</p>
                @endif
                <input type="file" name="gambar_utama" id="gambar_utama"
                       class="block w-full text-sm text-gray-500
                       file:mr-4 file:py-2 file:px-4
                       file:rounded-full file:border-0
                       file:text-sm file:font-semibold
                       file:bg-blue-50 file:text-blue-700
                       hover:file:bg-blue-100 cursor-pointer
                       @error('gambar_utama') border border-red-500 @enderror">
                @error('gambar_utama') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Tombol Submit dan Batal --}}
            <div class="flex items-center justify-between mt-6">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                    Perbarui Paket Wisata
                </button>
                <a href="{{ route('admin.paket-wisata.index') }}" class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800 transition duration-150 ease-in-out">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection