<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Wisata - Bandung Vibes</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200 text-brand-text-dark font-sans antialiased">

    <x-navbar /> {{-- Gunakan navbar yang sudah ada --}}

    <section class="py-16 sm:py-24 bg-subtle-gray">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 text-center">
            <h2 class="text-dest-title font-bold text-3xl sm:text-4xl mb-3">
                Daftar Semua Paket Wisata Bandung
            </h2>
            <p class="text-text-muted text-base sm:text-lg mb-12 sm:mb-16 max-w-2xl mx-auto">
                Jelajahi semua pilihan paket wisata yang ditawarkan Bandung Vibes. Temukan petualangan impian Anda!
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                @forelse ($wisatas as $wisata)
                    <div class="bg-white rounded-xl shadow-custom-medium p-6 flex flex-col text-center text-dest-title transition-all duration-300 ease-custom-ease hover:shadow-custom-deep hover:scale-105 transform group">
                        <div class="relative mx-auto mb-5">
                            <div class="absolute inset-0 bg-gradient-to-br from-brand-orange to-yellow-400 rounded-full transform scale-105 blur-md opacity-50 group-hover:opacity-75 transition-opacity duration-300"></div>
                            <div class="relative bg-white rounded-full p-2 shadow-sm inline-block">
                                <img alt="{{ $wisata->nama_wisata }} icon" class="w-24 h-24 sm:w-28 sm:h-28 object-contain rounded-full" src="{{ $wisata->gambar }}"/>
                            </div>
                        </div>
                        <h3 class="font-semibold text-xl sm:text-2xl mb-2 group-hover:text-brand-orange transition-colors duration-300">
                            {{ $wisata->nama_wisata }}
                        </h3>
                        <p class="text-sm text-text-muted mb-4 leading-relaxed min-h-[60px] sm:min-h-[84px]">
                            {{ $wisata->deskripsi_singkat }}
                        </p>
                        <p class="font-semibold text-base text-brand-orange mb-6">
                            {{ $wisata->harga }}
                        </p>
                        <div class="w-full mt-auto space-y-2">
                            <a href="{{ route('wisata.show', $wisata->id) }}" class="block bg-gray-200 text-gray-700 text-sm font-medium rounded-lg w-full py-2.5 shadow-sm hover:bg-gray-300 transition-colors duration-300">
                                Lihat Selengkapnya
                            </a>
                            <button class="bg-brand-orange text-white text-sm font-semibold rounded-lg w-full py-2.5 shadow-md hover:bg-orange-600 transition-colors duration-300 transform hover:scale-105">
                                Booking Sekarang
                            </button>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">Belum ada data wisata yang tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>

    <x-footer /> {{-- Gunakan footer yang sudah ada --}}

</body>
</html>