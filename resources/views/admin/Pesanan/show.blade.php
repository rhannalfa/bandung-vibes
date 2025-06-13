@extends('admin.layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Detail Pesanan #{{ $pesanan->kode_pesanan }}</h1>

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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 mb-6">
            <div>
                <p class="mb-2"><span class="font-semibold">Kode Pesanan:</span> {{ $pesanan->kode_pesanan }}</p>
                <p class="mb-2"><span class="font-semibold">Status:</span>
                    @php
                        $statusClass = [
                            'pending_payment' => 'bg-yellow-100 text-yellow-800',
                            'confirmed' => 'bg-green-100 text-green-800',
                            'cancelled' => 'bg-red-100 text-red-800',
                            'completed' => 'bg-blue-100 text-blue-800',
                        ][$pesanan->status_pesanan] ?? 'bg-gray-100 text-gray-800';
                    @endphp
                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $statusClass }}">
                        {{ ucfirst(str_replace('_', ' ', $pesanan->status_pesanan)) }}
                    </span>
                </p>
                <p class="mb-2"><span class="font-semibold">Paket Wisata:</span> {{ $pesanan->paketWisata->nama_paket ?? 'N/A' }}</p>
                <p class="mb-2"><span class="font-semibold">Tanggal Tour:</span> {{ \Carbon\Carbon::parse($pesanan->tanggal_tour)->format('d F Y') }}</p>
                <p class="mb-2"><span class="font-semibold">Jumlah Dewasa:</span> {{ $pesanan->jumlah_dewasa }}</p>
                <p class="mb-2"><span class="font-semibold">Jumlah Anak:</span> {{ $pesanan->jumlah_anak }}</p>
                <p class="mb-2"><span class="font-semibold">Total Harga:</span> Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
            </div>
            <div>
                <p class="font-semibold mb-1">Informasi Pemesan:</p>
                <p class="mb-2">Nama: {{ $pesanan->nama_pemesan }} (ID User: {{ $pesanan->user_id }})</p>
                <p class="mb-2">Email: {{ $pesanan->email_pemesan }}</p>
                <p class="mb-2">Telepon: {{ $pesanan->telepon_pemesan ?? '-' }}</p>
                <p class="mb-2">Catatan Tambahan: {{ $pesanan->catatan_tambahan ?? '-' }}</p>
                <p class="mb-2"><span class="font-semibold">Tanggal Pesan:</span> {{ $pesanan->created_at->format('d M Y, H:i') }}</p>
                @if ($pesanan->updated_at != $pesanan->created_at)
                    <p class="mb-2"><span class="font-semibold">Terakhir Diperbarui:</span> {{ $pesanan->updated_at->format('d M Y, H:i') }}</p>
                @endif
            </div>
        </div>

        <hr class="my-6 border-gray-200">

        {{-- Form untuk Update Status Pesanan --}}
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Ubah Status Pesanan</h3>
        <form action="{{ route('admin.pesanan.updateStatus', $pesanan->id) }}" method="POST" class="flex items-center space-x-4">
            @csrf
            @method('PUT')
            <div class="flex-1">
                <label for="status_pesanan" class="sr-only">Status Pesanan</label>
                <select name="status_pesanan" id="status_pesanan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="pending_payment" @if($pesanan->status_pesanan == 'pending_payment') selected @endif>Pending Payment</option>
                    <option value="confirmed" @if($pesanan->status_pesanan == 'confirmed') selected @endif>Confirmed</option>
                    <option value="cancelled" @if($pesanan->status_pesanan == 'cancelled') selected @endif>Cancelled</option>
                    <option value="completed" @if($pesanan->status_pesanan == 'completed') selected @endif>Completed</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                Update Status
            </button>
        </form>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('admin.pesanan.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-150 ease-in-out">
                Kembali ke Manajemen Pesanan
            </a>
        </div>
    </div>
@endsection
