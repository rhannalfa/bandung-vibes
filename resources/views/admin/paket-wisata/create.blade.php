@extends('admin.layouts.app')
@section('title', 'Tambah Paket Wisata Baru')
@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold mb-4">Form Tambah Paket Wisata</h3>
        <form action="{{ route('admin.paket-wisata.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nama_paket" class="block text-gray-700 text-sm font-bold mb-2">Nama Paket Wisata:</label>
                <input type="text" name="nama_paket" id="nama_paket" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama_paket') border-red-500 @enderror" value="{{ old('nama_paket') }}" required>
                @error('nama_paket') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="deskripsi_paket" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Paket:</label>
                <textarea name="deskripsi_paket" id="deskripsi_paket" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('deskripsi_paket') border-red-500 @enderror" required>{{ old('deskripsi_paket') }}</textarea>
                @error('deskripsi_paket') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="destinasi" class="block text-gray-700 text-sm font-bold mb-2">Destinasi (Contoh: Kawah Putih, Glamping Lakeside):</label>
                <input type="text" name="destinasi" id="destinasi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('destinasi') border-red-500 @enderror" value="{{ old('destinasi') }}" required>
                @error('destinasi') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="durasi" class="block text-gray-700 text-sm font-bold mb-2">Durasi (Contoh: 1 Hari, 3 Hari 2 Malam):</label>
                <input type="text" name="durasi" id="durasi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('durasi') border-red-500 @enderror" value="{{ old('durasi') }}">
                @error('durasi') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="harga_paket" class="block text-gray-700 text-sm font-bold mb-2">Harga Paket:</label>
                <input type="number" name="harga_paket" id="harga_paket" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('harga_paket') border-red-500 @enderror" value="{{ old('harga_paket') }}" required min="0">
                @error('harga_paket') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="gambar_utama" class="block text-gray-700 text-sm font-bold mb-2">Gambar Utama (Opsional):</label>
                <input type="file" name="gambar_utama" id="gambar_utama" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('gambar_utama') border-red-500 @enderror">
                @error('gambar_utama') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Simpan Paket Wisata
                </button>
                <a href="{{ route('admin.paket-wisata.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection