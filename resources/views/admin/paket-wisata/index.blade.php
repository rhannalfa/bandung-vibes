@extends('admin.layouts.app')
@section('title', 'Kelola Paket Wisata')
@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Daftar Paket Wisata</h3>
            <a href="{{ route('admin.paket-wisata.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Tambah Paket Wisata Baru</a>
        </div>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Paket</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Destinasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga Paket</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($paketWisata as $item)
                        @php
                            // Helper function to determine the correct image URL
                            // If the path starts with 'assets/images/', use asset() (for seeder data in public folder)
                            // Otherwise (e.g., 'paket-wisata/image.jpg' from Storage), use Storage::url()
                            $getImageUrl = function($path) {
                                if (\Illuminate\Support\Str::startsWith($path, 'assets/images/')) {
                                    return asset($path);
                                }
                                // Pastikan path untuk Storage::url() tidak dimulai dengan '/' jika sudah ada
                                // Storage::url() akan menambahkan /storage/ secara otomatis
                                return Storage::url(ltrim($path, '/'));
                            };
                        @endphp
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->nama_paket }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->destinasi }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->durasi }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($item->harga_paket, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($item->gambar_utama)
                                    {{-- Menggunakan fungsi helper getImageUrl yang baru --}}
                                    <img src="{{ $getImageUrl($item->gambar_utama) }}" alt="{{ $item->nama_paket }}" class="h-12 w-12 object-cover rounded">
                                @else
                                    Tidak Ada Gambar
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.paket-wisata.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                                <form action="{{ route('admin.paket-wisata.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket wisata ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada data paket wisata.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $paketWisata->links() }}
        </div>
    </div>
@endsection
