{{-- resources/views/admin/ulasan/index.blade.php --}}

@extends('admin.layouts.app')

@section('title', 'Kelola Ulasan Pengguna')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Daftar Ulasan Pengguna</h3>
            {{-- Tombol Tambah Ulasan tidak relevan di sini, karena ulasan dari user --}}
        </div>

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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paket Wisata</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengulas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Komentar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($ulasan as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->paketWisata->nama_paket ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->user->name ?? 'Pengguna Dihapus' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-yellow-500">
                                    {{-- Menampilkan rating dalam bentuk bintang --}}
                                    {{-- {{ $item->rating }} --}}
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $item->rating)
                                            <i class="fas fa-star"></i> {{-- Bintang penuh --}}
                                        @else
                                            <i class="far fa-star"></i> {{-- Bintang kosong --}}
                                        @endif
                                    @endfor
                                </div>
                            </td>
                            <td class="px-6 py-4 max-w-xs overflow-hidden text-ellipsis">{{ Str::limit($item->komentar, 100) ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                {{-- Tombol untuk melihat detail lengkap ulasan, atau moderasi --}}
                                <a href="{{ route('admin.ulasan.show', $item->id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Detail</a>
                                {{-- Tombol hapus (jika diaktifkan di rute dan controller) --}}
                                {{--
                                <form action="{{ route('admin.ulasan.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                </form>
                                --}}
                                {{-- <span class="text-gray-500">Tidak ada aksi</span> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">Belum ada ulasan pengguna.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $ulasan->links() }} {{-- Untuk paginasi --}}
        </div>
    </div>
@endsection
