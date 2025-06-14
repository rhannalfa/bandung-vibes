@extends('layouts.frontend_app') {{-- Menggunakan layout frontend Anda --}}
@section('title', 'Pembayaran Berhasil!')
@section('content')
<main class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="bg-white p-8 rounded-lg shadow-md text-center">
        <div class="text-green-500 text-6xl mb-4">
            <i class="fas fa-check-circle"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-800 mb-3">Pembayaran Anda Berhasil!</h1>
        <p class="text-gray-600 mb-6">Terima kasih, pembayaran untuk pesanan Anda telah berhasil dikonfirmasi.</p>

        <div class="bg-gray-100 p-4 rounded-md mb-6 text-left">
            <p class="mb-2"><span class="font-semibold">Kode Pesanan:</span> <span class="text-blue-600 font-bold">{{ $pesanan->kode_pesanan }}</span></p>
            <p class="mb-2"><span class="font-semibold">Paket Wisata:</span> {{ $pesanan->paketWisata->nama_paket ?? 'N/A' }}</p>
            <p class="mb-2"><span class="font-semibold">Tanggal Tour:</span> {{ \Carbon\Carbon::parse($pesanan->tanggal_tour)->format('d F Y') }}</p>
            <p class="mb-2"><span class="font-semibold">Total Pembayaran:</span> <span class="text-green-600 font-bold">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span></p>
            <p class="mb-2"><span class="font-semibold">Status Pesanan:</span> <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">{{ ucfirst(str_replace('_', ' ', $pesanan->status_pesanan)) }}</span></p>
        </div>

        <a href="{{ route('pesanan.history') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-150 ease-in-out inline-flex items-center">
            Lihat Riwayat Pesanan Saya
        </a>
        <a href="{{ route('home') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg ml-2 transition duration-150 ease-in-out inline-flex items-center">
            Kembali ke Beranda
        </a>
    </div>
</main>
@endsection
