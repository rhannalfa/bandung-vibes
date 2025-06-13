@extends('layouts.frontend_app') {{-- Asumsi Anda punya layout frontend --}}
@section('title', 'Pesan Paket: ' . $paket_wisata->nama_paket)

@section('content')
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Pesan Paket Wisata: {{ $paket_wisata->nama_paket }}</h1>

        {{-- Pesan Feedback --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pesanan.store', $paket_wisata->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="tanggal_tour" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Pelaksanaan Tour:</label>
                <input type="date" name="tanggal_tour" id="tanggal_tour"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tanggal_tour') border-red-500 @enderror"
                       value="{{ old('tanggal_tour', Carbon\Carbon::now()->addDay(1)->format('Y-m-d')) }}" required>
                @error('tanggal_tour') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="jumlah_dewasa" class="block text-gray-700 text-sm font-bold mb-2">Jumlah Peserta Dewasa:</label>
                <input type="number" name="jumlah_dewasa" id="jumlah_dewasa"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jumlah_dewasa') border-red-500 @enderror"
                       value="{{ old('jumlah_dewasa', 1) }}" min="1" required>
                <p class="text-gray-600 text-xs italic mt-1">Harga per dewasa: Rp {{ number_format($paket_wisata->harga_paket, 0, ',', '.') }}</p>
                @error('jumlah_dewasa') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="jumlah_anak" class="block text-gray-700 text-sm font-bold mb-2">Jumlah Peserta Anak (usia 3-10 tahun):</label>
                <input type="number" name="jumlah_anak" id="jumlah_anak"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jumlah_anak') border-red-500 @enderror"
                       value="{{ old('jumlah_anak', 0) }}" min="0">
                <p class="text-gray-600 text-xs italic mt-1">Harga per anak: Rp {{ number_format($paket_wisata->harga_paket * 0.75, 0, ',', '.') }} (contoh: 75% dari harga dewasa)</p>
                @error('jumlah_anak') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <hr class="my-6 border-gray-200">

            <h3 class="text-lg font-semibold text-gray-800 mb-4">Data Pemesan (Kontak)</h3>

            <div class="mb-4">
                <label for="nama_pemesan" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap Pemesan:</label>
                <input type="text" name="nama_pemesan" id="nama_pemesan"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama_pemesan') border-red-500 @enderror"
                       value="{{ old('nama_pemesan', Auth::user()->name) }}" required>
                @error('nama_pemesan') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="email_pemesan" class="block text-gray-700 text-sm font-bold mb-2">Email Pemesan:</label>
                <input type="email" name="email_pemesan" id="email_pemesan"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email_pemesan') border-red-500 @enderror"
                       value="{{ old('email_pemesan', Auth::user()->email) }}" required>
                @error('email_pemesan') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="telepon_pemesan" class="block text-gray-700 text-sm font-bold mb-2">Nomor Telepon Pemesan:</label>
                <input type="text" name="telepon_pemesan" id="telepon_pemesan"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('telepon_pemesan') border-red-500 @enderror"
                       value="{{ old('telepon_pemesan') }}">
                @error('telepon_pemesan') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label for="catatan_tambahan" class="block text-gray-700 text-sm font-bold mb-2">Catatan Tambahan (Opsional):</label>
                <textarea name="catatan_tambahan" id="catatan_tambahan" rows="3"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('catatan_tambahan') border-red-500 @enderror">{{ old('catatan_tambahan') }}</textarea>
                @error('catatan_tambahan') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                    Konfirmasi Pesanan
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
