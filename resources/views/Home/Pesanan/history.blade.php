{{-- resources/views/frontend/pesanan/history.blade.php --}}

@extends('layouts.frontend_app') {{-- Menggunakan layout frontend Anda --}}
@section('title', 'Riwayat Pesanan Saya')

@section('content')
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Riwayat Pesanan Saya</h1>

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

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border border-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Pesanan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paket Wisata</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Tour</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Harga</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($pesananHistory as $pesanan)
                        <tr class="main-row">
                            <td class="px-6 py-4 whitespace-nowrap text-blue-600 font-semibold">
                                {{ $pesanan->kode_pesanan }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $pesanan->paketWisata->nama_paket ?? 'Paket Dihapus' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($pesanan->tanggal_tour)->format('d M Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
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
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <button type="button" class="toggle-details text-blue-600 hover:text-blue-900 focus:outline-none">
                                    Lihat Detail
                                    <i class="fas fa-chevron-down text-xs ml-1 transition-transform duration-200"></i>
                                </button>
                            </td>
                        </tr>
                        {{-- Row Detail yang Bisa Diperluas --}}
                        <tr class="detail-row hidden bg-gray-50">
                            <td colspan="6" class="p-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
                                    <div>
                                        <p class="font-semibold mb-1">Informasi Pemesan:</p>
                                        <p>Nama: {{ $pesanan->nama_pemesan }}</p>
                                        <p>Email: {{ $pesanan->email_pemesan }}</p>
                                        <p>Telepon: {{ $pesanan->telepon_pemesan ?? '-' }}</p>
                                        <p>Catatan: {{ $pesanan->catatan_tambahan ?? '-' }}</p>
                                    </div>
                                    <div>
                                        <p class="font-semibold mb-1">Detail Tiket:</p>
                                        <p>Jumlah Dewasa: {{ $pesanan->jumlah_dewasa }}</p>
                                        <p>Jumlah Anak: {{ $pesanan->jumlah_anak }}</p>
                                        <p>Harga per Dewasa: Rp {{ number_format($pesanan->paketWisata->harga_paket, 0, ',', '.') }}</p>
                                        <p>Harga per Anak: Rp {{ number_format($pesanan->paketWisata->harga_paket * 0.75, 0, ',', '.') }} (contoh: 75% dari harga dewasa)</p>
                                        <p>Tanggal Pesan: {{ $pesanan->created_at->format('d M Y, H:i') }}</p>
                                    </div>
                                </div>
                                <div class="mt-4 text-right">
                                    @if ($pesanan->status_pesanan == 'pending_payment')
                                        <a href="{{ route('pesanan.success', $pesanan->kode_pesanan) }}" class="inline-flex items-center px-3 py-1.5 bg-green-500 hover:bg-green-600 text-white text-sm font-semibold rounded-lg transition-colors">
                                            Lanjutkan Pembayaran
                                            <i class="fas fa-arrow-right ml-1"></i>
                                        </a>
                                        {{-- BARU: Tombol Batalkan Pesanan (diaktifkan) --}}
                                        <form action="{{ route('pesanan.cancel', $pesanan->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?');">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-red-600 hover:text-red-900 text-sm">Batalkan</button>
                                        </form>
                                    @elseif ($pesanan->status_pesanan == 'confirmed')
                                        <span class="inline-flex items-center px-3 py-1.5 bg-blue-500 text-white text-sm font-semibold rounded-lg">
                                            Pembayaran Dikonfirmasi
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Anda belum memiliki riwayat pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $pesananHistory->links() }} {{-- Untuk paginasi --}}
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.toggle-details').forEach(button => {
            button.addEventListener('click', function () {
                const detailRow = this.closest('tr.main-row').nextElementSibling;
                const icon = this.querySelector('.fas');

                if (detailRow.classList.contains('hidden')) {
                    detailRow.classList.remove('hidden');
                    icon.classList.add('rotate-180');
                } else {
                    detailRow.classList.add('hidden');
                    icon.classList.remove('rotate-180');
                }
            });
        });
    });
</script>
@endsection
