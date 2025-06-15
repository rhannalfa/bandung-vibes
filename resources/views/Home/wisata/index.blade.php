<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Wisata - Bandung Vibes</title>
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <x-navbar /> {{-- Gunakan navbar yang sudah ada --}}

    {{-- Hero Section --}}
   <section class="relative mx-auto overflow-hidden flex flex-col z-0 sm:h-[60vh] md:h-[50vh] lg:h-[40vh]" data-aos="fade-in">
    <img
        id="hero-background-image" class="absolute inset-0 w-full h-full object-cover -z-20 transition-opacity duration-1000 ease-in-out"
        src="https://cdn.pixabay.com/photo/2022/06/25/17/51/bandung-city-7283934_1280.jpg" alt="Bandung scenic background"
    />
    <div class="absolute inset-0 bg-gradient-to-b from-brand-blue-dark/30 via-brand-blue-dark/50 to-brand-blue-dark/50 -z-20"></div>
    <h2 class="absolute inset-0 flex justify-center items-center text-white font-extrabold text-[70px] xs:text-[80px] sm:text-[120px] md:text-[150px] opacity-20 select-none pointer-events-none -z-10 font-bandung-vibes-watermark">
        BandungVibes
    </h2>
    <div class="relative flex flex-col flex-grow w-full items-center px-4 py-10 z-10 pt-32 pb-8 sm:pt-24 sm:pb-0 sm:justify-center " >
    </div>
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0] z-10">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-[60px] sm:h-[90px] md:h-[90px]">
            <defs>
                </defs>
            <path d="M985.66,92.83C906.67,72,823.78,31.84,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" style="fill: rgba(255, 255, 255, 0);"></path>
            <path d="M995.66,105.83C916.67,85,833.78,44.84,753.84,27.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,40.35V120H1200V108.8C1142.19,131.92,1065.71,124.31,995.66,105.83Z" style="fill: rgba(255, 255, 255, 0);"></path>
            <path d="M1010.66,80.83C931.67,60,848.78,20.84,768.84,3.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,15.35V120H1200V83.8C1147.19,106.92,1070.71,99.31,1010.66,80.83Z" style="fill: rgba(255, 255, 255, 0);"></path>
             <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31.88,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3.2V120H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-white"></path>
        </svg>
    </div>
    </section>

    {{-- Main Content Section --}}
    <section class="relative py-16 sm:py-24"data-aos="fade-out">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16" data-aos="fade-out">
                <h2 class="text-3xl sm:text-5xl font-bold text-dest-title">
                    Paket Wisata Populer
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10" data-aos="fade-in">
                @forelse ($paketWisataPopuler as $paket)
                    <div class="bg-subtle-gray rounded-xl border border-transparent overflow-hidden flex flex-col transition-all duration-300 ease-in-out hover:shadow-2xl hover:border-orange-200 group">
                        <div class="relative overflow-hidden">
                            {{-- ====================================================== --}}
                            {{-- START: Logika Gambar Dinamis yang Ditingkatkan --}}
                            {{-- ====================================================== --}}
                            @php
                                // Helper untuk mendapatkan URL gambar, baik dari storage maupun assets
                                $getImageUrl = function($path) {
                                    if (Str::startsWith($path, 'assets/images/')) {
                                        return asset($path);
                                    }
                                    return Storage::url($path);
                                };

                                // Daftar gambar fallback dengan kata kunci
                                $fallbackImages = [
                                    'ciwidey' => 'assets/images/paket-wisata/lainnya/ciwidey_1.jpg',
                                    'kawah-putih' => 'assets/images/paket-wisata/lainnya/ciwidey-kawah-putih.jpeg',
                                    'kota' => 'assets/images/paket-wisata/lainnya/kota_1.jpeg',
                                    'kuliner' => 'assets/images/paket-wisata/lainnya/sejarah-kuliner-kota.jpeg',
                                    'ciater' => 'assets/images/paket-wisata/ciater-sari-ater.jpeg',
                                    'sari-ater' => 'assets/images/paket-wisata/ciater-sari-ater.jpeg',
                                ];

                                $selectedFallback = null;
                                $packageNameSlug = Str::slug($paket->nama_paket ?? '');

                                // Cari gambar fallback yang cocok berdasarkan kata kunci
                                foreach ($fallbackImages as $keyword => $imagePath) {
                                    if (Str::contains($packageNameSlug, $keyword)) {
                                        $selectedFallback = $imagePath;
                                        break;
                                    }
                                }
                            @endphp

                            @if (!empty($paket->gambar_utama))
                                {{-- Gunakan gambar utama jika ada --}}
                                <img alt="{{ $paket->nama_paket }}" class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out" src="{{ $getImageUrl($paket->gambar_utama) }}" />
                            @elseif ($selectedFallback)
                                {{-- Jika tidak, gunakan gambar fallback dinamis yang ditemukan --}}
                                <img alt="{{ $paket->nama_paket ?? 'Gambar Default' }}" class="w-full h-60 object-cover" src="{{ asset($selectedFallback) }}" />
                            @else
                                {{-- Jika tidak ada sama sekali, gunakan placeholder --}}
                                <img alt="Gambar Tidak Tersedia" class="w-full h-60 object-cover" src="https://via.placeholder.com/600x400?text=Image+Not+Available" />
                            @endif
                            {{-- ====================================================== --}}
                            {{-- END: Logika Gambar Dinamis --}}
                            {{-- ====================================================== --}}


                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute top-4 right-4 bg-black/50 text-white text-xs font-semibold px-3 py-1.5 rounded-full backdrop-blur-sm flex items-center gap-2">
                                <i class="far fa-clock"></i>
                                <span>{{ $paket->durasi ?? 'Fullday' }}</span>
                            </div>
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="text-dest-title font-bold text-lg lg:text-xl mb-2 group-hover:text-dest-button transition-colors">
                                {{ $paket->nama_paket }}
                            </h3>
                            <p class="text-xs sm:text-sm text-text-muted leading-relaxed mb-4">
                                {{ Str::limit($paket->deskripsi_paket, 100) }}
                            </p>
                            <div class="text-xs text-dest-title space-y-1.5 pt-2 border-t border-slate-200 flex-grow">
                                {{-- Loop untuk menampilkan destinasi --}}
                                @foreach(explode(',', $paket->destinasi) as $index => $dest)
                                    @if($index < 3) {{-- Batasi hanya 3 destinasi yang ditampilkan --}}
                                        <p class="flex items-center truncate"><i class="fas fa-check text-dest-button/70 mr-2.5"></i>{{ trim($dest) }}</p>
                                    @endif
                                @endforeach
                            </div>
                            <div class="mt-4 pt-4 border-t border-slate-200 flex justify-between items-center">
                                <div class="text-left">
                                    <p class="text-xs text-text-muted">Mulai dari</p>
                                    <p class="font-extrabold text-lg text-dest-title">Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}</p>
                                </div>
                                <a href="{{ route('detail-paket', $paket->slug) }}" class="bg-dest-button text-white font-semibold px-4 py-2 rounded-lg flex items-center justify-center gap-2 hover:bg-dest-button-hover transition-all duration-300 transform hover:scale-105">
                                    <span>Lihat Detail</span>
                                    <i class="fas fa-arrow-right text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">Belum ada paket wisata tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>

    <x-footer /> {{-- Gunakan footer yang sudah ada --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {


            const imageUrls = [
                "https://cdn.pixabay.com/photo/2022/06/25/17/51/bandung-city-7283934_1280.jpg",
                "https://imgs.search.brave.com/AWwOFv6qkc_0Bk6nPydJRw2XZ49Ye8IBzM39xOAYdFI/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTQw/MjM1ODEwMy9pZC9m/b3RvL24tZ2VkdW5n/LWktZXNjb21wdG8t/bS1pLWotc2FsYWgt/c2F0dS1iYW5ndW5h/bi1iZXJzZWphcmFo/LWRpLWJhbmR1bmct/bGFuc2thcC1uaWVz/Y29tcHRvbXkuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPWoz/Vmt1blhpMnZSdm8t/SGFwVTFTUDUtTXpP/TU9HY2NRczBLUEJz/QnJfM3c9"
            ];

            const heroImageElement = document.getElementById('hero-background-image');
            let currentImageIndex = 0;

            if (heroImageElement) {
                heroImageElement.style.opacity = 1;

                setInterval(() => {
                    heroImageElement.style.opacity = 0;

                    setTimeout(() => {
                        currentImageIndex = (currentImageIndex + 1) % imageUrls.length;
                        heroImageElement.src = imageUrls[currentImageIndex];
                        heroImageElement.style.opacity = 1;
                    }, 500); // Durasi ini (1000ms = 1s) harus sama dengan durasi transisi di CSS Anda (duration-1000)

                }, 5000); // Interval total: 1s fade out + 1s fade in + 3s waktu tampil = 5s
            } else {
                console.error("Elemen dengan ID 'hero-background-image' tidak ditemukan.");
            }
        
        });
    </script>

</body>

</html>