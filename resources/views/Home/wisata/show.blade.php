<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $wisata->nama_wisata }} - Bandung Vibes</title>
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200 text-brand-text-dark font-sans antialiased">

    <x-navbar />

    <section class="py-16 sm:py-24 bg-subtle-gray min-h-screen">
        <div class="max-w-4xl mx-auto px-6 sm:px-8 lg:px-12 bg-white rounded-xl shadow-custom-medium p-8">
            <a href="{{ route('wisata.index') }}" class="text-brand-orange hover:underline mb-4 inline-block">
                &larr; Kembali ke Daftar Wisata
            </a>

            <h1 class="text-dest-title font-bold text-3xl sm:text-4xl mb-6">
                {{ $wisata->nama_wisata }}
            </h1>

            <div class="mb-8">
                <img src="{{ $wisata->gambar }}" alt="{{ $wisata->nama_wisata }}" class="w-full h-80 object-cover rounded-lg shadow-md">
            </div>

            <div class="text-gray-700 leading-relaxed mb-6">
                <h3 class="font-semibold text-xl mb-3">Deskripsi:</h3>
                <p class="mb-4">{{ $wisata->deskripsi_singkat }}</p>
                <p>{{ $wisata->deskripsi_lengkap }}</p>
            </div>

            <div class="mb-8">
                <h3 class="font-semibold text-xl mb-3">Harga:</h3>
                <p class="text-brand-orange font-bold text-2xl">{{ $wisata->harga }}</p>
            </div>

            <div class="mt-8 space-y-4">
                <button class="bg-brand-orange text-white text-lg font-semibold rounded-lg w-full py-3 shadow-md hover:bg-orange-600 transition-colors duration-300 transform hover:scale-105">
                    Booking Sekarang
                </button>
                {{-- Anda bisa menambahkan tombol lain seperti "Lihat Galeri", "Hubungi Kami", dll. --}}
            </div>
        </div>
    </section>

    <x-footer />

</body>
</html>