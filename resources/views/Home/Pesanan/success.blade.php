@extends('layouts.frontend_app') {{-- Asumsi Anda punya layout frontend --}}
@section('title', 'Pesanan Berhasil!')
<link rel="icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">
@section('content')
<main class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10" data-aos="fade-in">
    <div class="bg-white p-8 rounded-lg shadow-md text-center">
        <div class="text-green-500 text-6xl mb-4">
            <i class="fas fa-check-circle"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-800 mb-3">Pesanan Berhasil Dibuat!</h1>
        <p class="text-gray-600 mb-6">Terima kasih atas pesanan Anda. Berikut detail pesanan Anda:</p>

        <div class="bg-gray-100 p-4 rounded-md mb-6 text-left">
            <p class="mb-2"><span class="font-semibold">Kode Pesanan:</span> <span class="text-blue-600 font-bold">{{ $pesanan->kode_pesanan }}</span></p>
            <p class="mb-2"><span class="font-semibold">Paket Wisata:</span> {{ $pesanan->paketWisata->nama_paket ?? 'N/A' }}</p>
            <p class="mb-2"><span class="font-semibold">Tanggal Tour:</span> {{ \Carbon\Carbon::parse($pesanan->tanggal_tour)->format('d F Y') }}</p>
            <p class="mb-2"><span class="font-semibold">Jumlah Peserta Dewasa:</span> {{ $pesanan->jumlah_dewasa }}</p>
            @if ($pesanan->jumlah_anak > 0)
                <p class="mb-2"><span class="font-semibold">Jumlah Peserta Anak:</span> {{ $pesanan->jumlah_anak }}</p>
            @endif
            <p class="mb-2"><span class="font-semibold">Total Harga:</span> <span class="text-green-600 font-bold">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span></p>
            <p class="mb-2"><span class="font-semibold">Status:</span> <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-semibold rounded-full">{{ ucfirst(str_replace('_', ' ', $pesanan->status_pesanan)) }}</span></p>
        </div>


        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition duration-150 ease-in-out inline-flex items-center">
                Kembali ke Beranda
            </a>

            {{-- Tombol Simulasi Pembayaran Berhasil (HANYA UNTUK TESTING) --}}
            @if ($pesanan->status_pesanan == 'pending_payment')
                <a href="{{ route('pesanan.payment.success', $pesanan->kode_pesanan) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg ml-2 transition duration-150 ease-in-out inline-flex items-center">
                    Simulasikan Pembayaran Berhasil
                </a>
            @endif
        </div>
        {{-- Opsional: Link ke halaman riwayat pesanan user --}}
        {{-- <a href="{{ route('pesanan.history') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg ml-2">Lihat Pesanan Saya</a> --}}
    </div>
</main>
@endsection
