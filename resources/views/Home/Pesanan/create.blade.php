@extends('layouts.frontend_app') {{-- Asumsi layout ini sudah mengimpor Tailwind CSS --}}
@section('title', 'Pesan Paket: ' . $paket_wisata->nama_paket)

@push('styles')
{{-- Jika Anda butuh CSS tambahan khusus halaman ini --}}
<style>
    /* Membuat input number tidak menampilkan panah default */
    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type='number'] {
        -moz-appearance: textfield;
    }
</style>
@endpush

@section('content')
<main class="bg-slate-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="mb-8 text-center">
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight sm:text-4xl">Formulir Pemesanan</h1>
            <p class="mt-2 text-lg text-slate-600">Pesan paket wisata impian Anda: <span class="font-bold text-blue-600">{{ $paket_wisata->nama_paket }}</span></p>
        </div>

        {{-- Menampilkan Pesan Feedback --}}
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
                <p class="font-bold">Berhasil</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
                <p class="font-bold">Gagal</p>
                <p>{{ session('error') }}</p>
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
                <p class="font-bold">Terdapat beberapa kesalahan:</p>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pesanan.store', $paket_wisata->id) }}" method="POST">
            @csrf
            <div class="lg:grid lg:grid-cols-3 lg:gap-8">

                {{-- Kolom Kiri: Detail Pesanan --}}
                <div class="lg:col-span-2">
                    <div class="bg-white p-6 sm:p-8 rounded-xl shadow-lg">
                        <h2 class="text-xl font-bold text-slate-800 border-b border-slate-200 pb-4 mb-6">Detail Perjalanan & Peserta</h2>

                        {{-- Tanggal Tour --}}
                        <div class="mb-5">
                            <label for="tanggal_tour" class="block text-sm font-medium text-slate-700 mb-2">Tanggal Pelaksanaan Tour</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                </div>
                                <input type="date" name="tanggal_tour" id="tanggal_tour"
                                       class="block w-full pl-10 pr-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('tanggal_tour') border-red-500 @enderror"
                                       value="{{ old('tanggal_tour', now()->addDay(1)->format('Y-m-d')) }}"
                                       min="{{ now()->addDay(1)->format('Y-m-d') }}" required>
                            </div>
                            @error('tanggal_tour') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
                        </div>

                        {{-- Jumlah Peserta --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <label for="jumlah_dewasa" class="block text-sm font-medium text-slate-700 mb-2">Jumlah Peserta Dewasa</label>
                                <input type="number" name="jumlah_dewasa" id="jumlah_dewasa"
                                       class="block w-full py-2 px-3 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('jumlah_dewasa') border-red-500 @enderror"
                                       value="{{ old('jumlah_dewasa', 1) }}" min="1" required>
                                <p class="text-slate-500 text-xs italic mt-2">Harga: Rp {{ number_format($paket_wisata->harga_paket, 0, ',', '.') }}/orang</p>
                                @error('jumlah_dewasa') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="jumlah_anak" class="block text-sm font-medium text-slate-700 mb-2">Jumlah Peserta Anak (3-10 th)</label>
                                <input type="number" name="jumlah_anak" id="jumlah_anak"
                                       class="block w-full py-2 px-3 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('jumlah_anak') border-red-500 @enderror"
                                       value="{{ old('jumlah_anak', 0) }}" min="0">
                                <p class="text-slate-500 text-xs italic mt-2">Harga: Rp {{ number_format($paket_wisata->harga_paket * 0.75, 0, ',', '.') }}/orang (75% dewasa)</p>
                                @error('jumlah_anak') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <h2 class="text-xl font-bold text-slate-800 border-b border-slate-200 pb-4 mb-6">Data Pemesan (Kontak)</h2>

                        {{-- Data Diri Pemesan --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nama_pemesan" class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap</label>
                                <input type="text" name="nama_pemesan" id="nama_pemesan"
                                       class="block w-full py-2 px-3 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('nama_pemesan') border-red-500 @enderror"
                                       value="{{ old('nama_pemesan', Auth::user()->name) }}" required>
                                @error('nama_pemesan') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="email_pemesan" class="block text-sm font-medium text-slate-700 mb-2">Alamat Email</label>
                                <input type="email" name="email_pemesan" id="email_pemesan"
                                       class="block w-full py-2 px-3 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('email_pemesan') border-red-500 @enderror"
                                       value="{{ old('email_pemesan', Auth::user()->email) }}" required>
                                @error('email_pemesan') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="mt-6">
                            <label for="telepon_pemesan" class="block text-sm font-medium text-slate-700 mb-2">Nomor Telepon/WA</label>
                            <input type="text" name="telepon_pemesan" id="telepon_pemesan"
                                   class="block w-full py-2 px-3 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('telepon_pemesan') border-red-500 @enderror"
                                   value="{{ old('telepon_pemesan') }}" placeholder="Contoh: 081234567890" required>
                            @error('telepon_pemesan') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
                        </div>
                         <div class="mt-6">
                            <label for="catatan_tambahan" class="block text-sm font-medium text-slate-700 mb-2">Catatan Tambahan (Opsional)</label>
                            <textarea name="catatan_tambahan" id="catatan_tambahan" rows="4"
                                      class="block w-full py-2 px-3 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('catatan_tambahan') border-red-500 @enderror"
                                      placeholder="Contoh: Permintaan khusus, alergi makanan, dll.">{{ old('catatan_tambahan') }}</textarea>
                             @error('catatan_tambahan') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Kolom Kanan: Rincian Pesanan (Sticky) --}}
                <div class="mt-8 lg:mt-0 lg:col-span-1">
                    <div class="lg:sticky lg:top-12">
                        <div class="bg-white p-6 rounded-xl shadow-lg">
                            <h3 class="text-lg font-bold text-slate-800">Rincian Pesanan Anda</h3>
                            <div class="mt-4 space-y-4">
                                <div class="flex items-center justify-between py-3 border-b border-slate-200">
                                    <p class="text-sm text-slate-600">Paket Wisata:</p>
                                    <p class="text-sm font-semibold text-slate-800 text-right">{{ $paket_wisata->nama_paket }}</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="text-sm text-slate-600">Peserta Dewasa</p>
                                    <p class="text-sm font-medium text-slate-800" id="summary_dewasa">1 x Rp ...</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="text-sm text-slate-600">Peserta Anak</p>
                                    <p class="text-sm font-medium text-slate-800" id="summary_anak">0 x Rp ...</p>
                                </div>

                                <div class="border-t border-slate-200 pt-4 mt-4">
                                    <div class="flex items-center justify-between">
                                        <p class="text-base font-semibold text-slate-800">Total Biaya</p>
                                        <p class="text-xl font-bold text-blue-600" id="summary_total">Rp 0</p>
                                    </div>
                                    <p class="text-xs text-slate-500 mt-1">Total biaya akan dikonfirmasi ulang oleh tim kami.</p>
                                </div>

                                <button type="submit" class="w-full flex items-center justify-center mt-6 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    Konfirmasi & Kirim Pesanan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</main>
@endsection

@push('scripts')
{{-- Script untuk kalkulasi harga real-time --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil elemen dari DOM
        const inputDewasa = document.getElementById('jumlah_dewasa');
        const inputAnak = document.getElementById('jumlah_anak');
        
        const summaryDewasa = document.getElementById('summary_dewasa');
        const summaryAnak = document.getElementById('summary_anak');
        const summaryTotal = document.getElementById('summary_total');

        // Ambil harga dari variabel PHP
        const hargaDewasa = {{ $paket_wisata->harga_paket }};
        const hargaAnak = {{ $paket_wisata->harga_paket * 0.75 }};
        
        // Fungsi untuk format angka ke format Rupiah
        const formatRupiah = (number) => {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(number);
        };

        // Fungsi utama untuk menghitung dan memperbarui total
        function updateSummary() {
            const jumlahDewasa = parseInt(inputDewasa.value) || 0;
            const jumlahAnak = parseInt(inputAnak.value) || 0;
            
            if (jumlahDewasa < 0) inputDewasa.value = 0;
            if (jumlahAnak < 0) inputAnak.value = 0;

            const totalDewasa = jumlahDewasa * hargaDewasa;
            const totalAnak = jumlahAnak * hargaAnak;
            const totalKeseluruhan = totalDewasa + totalAnak;

            // Update teks di rincian pesanan
            summaryDewasa.textContent = `${jumlahDewasa} x ${formatRupiah(hargaDewasa)}`;
            summaryAnak.textContent = `${jumlahAnak} x ${formatRupiah(hargaAnak)}`;
            summaryTotal.textContent = formatRupiah(totalKeseluruhan);
        }

        // Tambahkan event listener ke input
        inputDewasa.addEventListener('input', updateSummary);
        inputAnak.addEventListener('input', updateSummary);

        // Panggil fungsi sekali saat halaman dimuat untuk menampilkan nilai awal
        updateSummary();
    });
</script>
@endpush