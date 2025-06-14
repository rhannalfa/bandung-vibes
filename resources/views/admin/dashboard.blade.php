@extends('admin.layouts.app')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold mb-4">Selamat datang di Panel Admin Bandung Vibes!</h3>
        <p class="text-gray-700">Di sini Anda dapat mengelola data **paket wisata**, melihat riwayat transaksi pembayaran, dan lainnya.</p>
    </div>

    {{-- Statistik ringkas, nanti akan diisi dari controller --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h4 class="text-md font-semibold mb-2">Total Paket Wisata</h4>
            <p class="text-3xl font-bold text-blue-600">{{ $totalPaketWisata ?? 0 }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h4 class="text-md font-semibold mb-2">Total Transaksi</h4>
            <p class="text-3xl font-bold text-green-600">{{ $totalTransaksi ?? 0 }}</p>
        </div>
        {{-- Tambahkan statistik lain yang relevan --}}
    </div>
@endsection