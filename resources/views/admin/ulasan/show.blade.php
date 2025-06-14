{{-- resources/views/admin/ulasan/show.blade.php --}}

@extends('admin.layouts.app')

@section('title', 'Detail Ulasan')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold mb-4 text-gray-800">Detail Ulasan #{{ $ulasan->id }}</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
            <div>
                <p class="mb-2"><span class="font-semibold text-gray-900">ID Ulasan:</span> {{ $ulasan->id }}</p>
                <p class="mb-2"><span class="font-semibold text-gray-900">Paket Wisata:</span> {{ $ulasan->paketWisata->nama_paket ?? 'N/A' }}</p>
                <p class="mb-2"><span class="font-semibold text-gray-900">Pengulas:</span> {{ $ulasan->user->name ?? 'Pengguna Dihapus' }}</p>
                <p class="mb-2"><span class="font-semibold text-gray-900">Email Pengulas:</span> {{ $ulasan->user->email ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="mb-2"><span class="font-semibold text-gray-900">Rating Bintang:</span>
                    <div class="text-yellow-500 inline-block ml-1">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $ulasan->rating)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                </p>
                <p class="mb-2"><span class="font-semibold text-gray-900">Komentar:</span></p>
                <p class="mb-2 p-2 border border-gray-200 rounded-md bg-gray-50 leading-relaxed">{{ $ulasan->komentar ?? '-' }}</p>
                <p class="mb-2"><span class="font-semibold text-gray-900">Diulas pada:</span> {{ $ulasan->created_at->format('d M Y, H:i') }}</p>
                @if ($ulasan->updated_at != $ulasan->created_at)
                    <p class="mb-2"><span class="font-semibold text-gray-900">Terakhir Diperbarui:</span> {{ $ulasan->updated_at->format('d M Y, H:i') }}</p>
                @endif
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('admin.ulasan.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-150 ease-in-out">
                Kembali ke Daftar Ulasan
            </a>
            {{-- Opsional: Tombol untuk menghapus ulasan dari sini --}}
            {{--
            <form action="{{ route('admin.ulasan.destroy', $ulasan->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-150 ease-in-out">Hapus Ulasan</button>
            </form>
            --}}
        </div>
    </div>
@endsection
