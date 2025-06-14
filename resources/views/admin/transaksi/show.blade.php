@extends('admin.layouts.app')
@section('title', 'Detail Transaksi')
@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold mb-4">Detail Transaksi #{{ $transaksi->id }}</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="mb-2"><span class="font-semibold">Kode Transaksi:</span> {{ $transaksi->kode_transaksi ?? '-' }}</p>
                <p class="mb-2"><span class="font-semibold">Pembeli:</span> {{ $transaksi->user->name ?? 'N/A' }}</p>
                <p class="mb-2"><span class="font-semibold">Email Pembeli:</span> {{ $transaksi->user->email ?? 'N/A' }}</p>
                <p class="mb-2"><span class="font-semibold">Nama Paket Wisata:</span> {{ $transaksi->paketWisata->nama_paket ?? 'N/A' }}</p>
                <p class="mb-2"><span class="font-semibold">Destinasi Paket:</span> {{ $transaksi->paketWisata->destinasi ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="mb-2"><span class="font-semibold">Jumlah Peserta:</span> {{ $transaksi->jumlah_peserta }}</p>
                <p class="mb-2"><span class="font-semibold">Harga per Paket:</span> Rp {{ number_format($transaksi->paketWisata->harga_paket ?? 0, 0, ',', '.') }}</p>
                <p class="mb-2"><span class="font-semibold">Total Harga:</span> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                <p class="mb-2"><span class="font-semibold">Status Pembayaran:</span>
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                        @if($transaksi->status_pembayaran == 'sukses') bg-green-100 text-green-800
                        @elseif($transaksi->status_pembayaran == 'pending') bg-yellow-100 text-yellow-800
                        @else bg-red-100 text-red-800 @endif">
                        {{ ucfirst($transaksi->status_pembayaran) }}
                    </span>
                </p>
                <p class="mb-2"><span class="font-semibold">Metode Pembayaran:</span> {{ $transaksi->metode_pembayaran ?? '-' }}</p>
                <p class="mb-2"><span class="font-semibold">Tanggal Transaksi:</span> {{ $transaksi->created_at->format('d M Y H:i') }}</p>
            </div>
        </div>
        <div class="mt-6">
            <a href="{{ route('admin.transaksi.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Kembali ke Riwayat Transaksi</a>
        </div>
    </div>
@endsection