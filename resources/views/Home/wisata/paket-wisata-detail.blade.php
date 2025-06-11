<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Paket: {{ $paket->nama_paket }}</title>

    {{-- Memuat aset CSS dan JS menggunakan Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Memuat Font Awesome dari CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- Memuat font Inter dari Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* Menggunakan font Inter untuk tampilan yang bersih dan modern */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa; /* Warna latar belakang netral */
        }
        /* Style untuk sidebar yang tetap (sticky) di samping */
        .sticky-sidebar {
            position: -webkit-sticky; /* Untuk kompatibilitas Safari */
            position: sticky;
            top: 2rem; /* Jarak dari atas viewport saat sticky */
        }
        /* Definisi warna kustom (pastikan ini sesuai dengan tailwind.config.js Anda, atau hapus jika sudah didefinisikan di sana) */
        .text-dest-title { color: #212529; } /* Dark Gray */
        .text-text-muted { color: #6c757d; } /* Muted Gray */
        .bg-dest-button { background-color: #fd7e14; } /* Orange */
        .hover\:bg-dest-button-hover:hover { background-color: #e66a00; } /* Darker Orange */
        .bg-subtle-gray { background-color: #f1f3f5; } /* Light Gray */
        .border-orange-200 { border-color: #ffc299; } /* Light Orange */
    </style>
</head>
<body>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    {{-- Breadcrumbs dan Judul Halaman --}}
    <div class="mb-8">
        <nav class="text-sm font-medium text-slate-500 mb-2">
            <a href="{{ route('home') }}" class="hover:text-orange-500 transition-colors">Paket Wisata</a>
            <span class="mx-2">/</span>
            <span class="text-slate-800">Detail Paket</span>
        </nav>
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <h1 class="text-3xl lg:text-4xl font-extrabold text-slate-800 tracking-tight">
                {{ $paket->nama_paket }} {{-- Nama paket wisata dinamis --}}
            </h1>
            <div class="flex items-center gap-2 mt-2 md:mt-0 bg-slate-100 text-slate-700 text-sm font-semibold px-4 py-2 rounded-lg shadow-sm">
                <i class="far fa-clock"></i>
                <span>{{ $paket->durasi ?? 'Durasi Tidak Tersedia' }}</span> {{-- Durasi paket dinamis --}}
            </div>
        </div>
    </div>

    {{-- Konten Utama (Detail dan Fasilitas) --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
        {{-- Kolom Kiri (Galeri dan Deskripsi) --}}
        <div class="lg:col-span-2">
            {{-- Galeri Gambar Dinamis --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                {{-- Gambar Utama --}}
                <div class="col-span-1 sm:col-span-2 rounded-2xl overflow-hidden shadow-lg group">
                    @if ($paket->gambar_utama)
                        <img alt="{{ $paket->nama_paket }}" class="object-cover w-full h-96 group-hover:scale-105 transition-transform duration-500 ease-in-out" src="{{ Storage::url($paket->gambar_utama) }}" />
                    @else
                        <img alt="Tidak Ada Gambar Utama" class="object-cover w-full h-96 bg-gray-200 flex items-center justify-center text-gray-500" src="https://via.placeholder.com/900x600?text=Gambar+Utama+Tidak+Tersedia" />
                    @endif
                </div>

                {{-- Gambar Lainnya --}}
                {{-- PERBAIKAN DI SINI: Handle jika $gambar_lainnya masih string --}}
                @php
                    $gambarLainnyaArray = [];
                    // Jika $paket->gambar_lainnya adalah string DAN tidak kosong, coba decode/explode
                    if (!empty($paket->gambar_lainnya)) {
                        if (is_string($paket->gambar_lainnya)) {
                            // Coba decode JSON, jika gagal, pecah dengan koma
                            $decoded = json_decode($paket->gambar_lainnya, true);
                            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                $gambarLainnyaArray = $decoded;
                            } else {
                                $gambarLainnyaArray = array_filter(explode(',', $paket->gambar_lainnya));
                            }
                        } elseif (is_array($paket->gambar_lainnya)) {
                            $gambarLainnyaArray = $paket->gambar_lainnya;
                        }
                    }
                @endphp
                @if (count($gambarLainnyaArray) > 0)
                    @foreach ($gambarLainnyaArray as $gambar_path)
                        <div class="rounded-2xl overflow-hidden shadow-lg group">
                            <img alt="Galeri {{ $paket->nama_paket }}" class="object-cover w-full h-56 group-hover:scale-105 transition-transform duration-500 ease-in-out" src="{{ Storage::url($gambar_path) }}" />
                        </div>
                    @endforeach
                @endif
            </div>

            {{-- Bagian Tentang Paket Ini --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm mb-8">
                <h2 class="text-2xl font-bold text-slate-800 mb-4">Tentang Paket Ini</h2>
                <p class="text-slate-600 leading-relaxed mb-6 text-justify">{{ $paket->deskripsi_paket }}</p> {{-- Deskripsi paket dinamis --}}

                <h3 class="font-bold text-slate-800 text-lg mb-4 pt-4 border-t border-slate-200">Destinasi Utama</h3>
                <div class="space-y-3 text-slate-700">
                    {{-- Destinasi dinamis (dipecah dari string koma-separated) --}}
                    @foreach(explode(',', $paket->destinasi) as $destinasi)
                        <p class="flex items-center"><i class="fas fa-check-circle text-orange-500/80 mr-3"></i>{{ trim($destinasi) }}</p>
                    @endforeach
                </div>
            </div>

            {{-- Bagian Rencana Perjalanan (Itinerary/Rundown) - Dikomentari karena tidak digunakan saat ini --}}
            {{-- Jika Anda ingin menambahkan ini di masa depan, Anda perlu kolom 'itinerary' di DB dan mengelola input JSON-nya --}}
            {{--
            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <h2 class="text-2xl font-bold text-slate-800 mb-6">Rencana Perjalanan</h2>
                <p class="text-slate-500 text-center">Rencana perjalanan belum tersedia untuk paket ini.</p>
            </div>
            --}}
        </div>

        {{-- Kolom Kanan (Harga dan Fasilitas) --}}
        <div class="lg:col-span-1">
            <div class="sticky-sidebar bg-white p-6 rounded-2xl shadow-lg border border-slate-200">
                {{-- Harga Paket --}}
                <div class="text-center mb-6">
                    <p class="text-sm text-slate-500">Mulai dari</p>
                    <p class="font-extrabold text-4xl text-slate-800">Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}<span class="text-lg font-semibold text-slate-500">/Pax</span></p> {{-- Harga dinamis --}}
                </div>

                {{-- Fasilitas (Dinamis) --}}
                <div class="mb-6">
                    <h4 class="font-semibold text-slate-800 mb-3">Fasilitas:</h4> {{-- Judul Fasilitas --}}
                    <ul class="space-y-2 text-sm text-slate-600">
                        {{-- PERBAIKAN DI SINI: Handle jika $fasilitas masih string --}}
                        @php
                            $fasilitasArray = [];
                            // Jika $paket->fasilitas adalah string DAN tidak kosong, coba decode/explode
                            if (!empty($paket->fasilitas)) {
                                if (is_string($paket->fasilitas)) {
                                    // Coba decode JSON, jika gagal, pecah dengan baris baru
                                    $decoded = json_decode($paket->fasilitas, true);
                                    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                        $fasilitasArray = $decoded;
                                    } else {
                                        $fasilitasArray = array_filter(explode("\n", $paket->fasilitas));
                                    }
                                } elseif (is_array($paket->fasilitas)) {
                                    $fasilitasArray = $paket->fasilitas;
                                }
                            }
                        @endphp
                        @if (count($fasilitasArray) > 0)
                            @foreach ($fasilitasArray as $fasilitasItem)
                                <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i><span>{{ trim($fasilitasItem) }}</span></li>
                            @endforeach
                        @else
                            <li class="text-slate-500">Tidak ada informasi fasilitas.</li>
                        @endif
                    </ul>
                </div>

                {{-- Tombol Pesan Sekarang --}}
                <button class="w-full bg-orange-500 text-white font-bold px-6 py-3 rounded-lg flex items-center justify-center gap-2 hover:bg-orange-600 transition-all duration-300 transform hover:scale-105 shadow-lg shadow-orange-500/30">
                    Pesan Sekarang
                </button>
            </div>
        </div>
    </div>
</main>

</body>
</html>
