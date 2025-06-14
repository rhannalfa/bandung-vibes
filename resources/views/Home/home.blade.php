<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandung Vibes</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-200 text-brand-text-dark font-sans antialiased">

    <x-navbar />

<section class="relative min-h-screen mx-auto overflow-hidden flex flex-col z-0">
    <img
        id="hero-background-image" class="absolute inset-0 w-full h-full object-cover -z-20 transition-opacity duration-1000 ease-in-out" src="https://imgs.search.brave.com/kpkrmY4VmbA-PwjOVX6mDQ-D3ahPCOUmtq-ytKQM-1Y/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbmZv/YmFuZHVuZ2tvdGEu/Y29tL3dwLWNvbnRl/bnQvdXBsb2Fkcy8y/MDI0LzEwL1Bob3Rv/LV8tby1jcmVhdGl2/ZS1Qb2RvbW9yby1w/YXJrLnBuZw" alt="Bandung scenic background"
    />
    <div class="absolute inset-0 bg-gradient-to-b from-brand-blue-dark/30 via-brand-blue-dark/50 to-brand-blue-dark/50 -z-20"></div>

    <h2 class="absolute inset-0 flex justify-center items-center text-white font-extrabold text-[70px] xs:text-[80px] sm:text-[120px] md:text-[150px] opacity-20 select-none pointer-events-none -z-10 font-bandung-vibes-watermark">
        BandungVibes
    </h2>

    <div class="relative flex flex-col flex-grow w-full items-center px-4 py-10 z-10 pt-32 pb-8 sm:pt-24 sm:pb-0 sm:justify-center " >

        <div class="flex flex-col items-center text-center w-full max-w-3xl mb-12 sm:mb-0" data-aos="fade-out">
            <span class="text-brand-orange font-semibold text-sm md:text-base tracking-widest mb-4 uppercase block">
                Bandung Vibes
            </span>
            <h1 class="text-white font-extrabold text-4xl sm:text-5xl leading-tight sm:leading-snug relative [text-shadow:_2px_2px_8px_rgba(0,0,0,0.7)]">
                HIDUP PERLU JALAN - JALAN YUK KABUR DULU!!<br class="hidden sm:block"/>
            </h1>
            <p class="text-gray-200 mt-6 text-base sm:text-lg max-w-xl mx-auto">
                Temukan petualangan tak terlupakan di Bandung dan sekitarnya dengan paket wisata eksklusif kami.
            </p>
            <a href="#wisata" class="mt-10 bg-brand-orange text-white text-sm sm:text-base font-semibold rounded-full px-8 py-3.5 flex items-center justify-center mx-auto space-x-2.5 hover:bg-brand-orange-darker transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                <i class="fas fa-paper-plane text-xs"></i>
                <span>Jelajahi Paket</span>
            </a>
        </div>

        <div class="w-full mt-12 sm:absolute sm:bottom-0 sm:left-1/2 sm:transform sm:-translate-x-1/2 sm:max-w-screen-lg sm:xl:max-w-screen-xl sm:z-20 sm:mt-0 sm:mb-[-1px]" >
            <div class="bg-white/10 backdrop-blur-xl shadow-custom-deep grid grid-cols-1 sm:grid-cols-3 text-white rounded-xl sm:rounded-t-2xl overflow-hidden" data-aos="fade-up">

                <div class="px-4 py-5 sm:px-6 sm:py-6 text-center group">
                    <div class="flex flex-col items-center sm:items-start text-center sm:text-left">
                        <i class="fas fa-user-shield text-brand-orange text-2xl sm:text-3xl mb-2 sm:mb-3 transition-transform duration-300 group-hover:scale-110"></i>
                        <h3 class="font-semibold text-base sm:text-lg lg:text-xl mb-1">
                            Private Guide
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-300 group-hover:text-white transition-colors duration-300 leading-normal sm:leading-relaxed">
                            Pemandu pribadi berpengalaman siap menemani perjalanan Anda.
                        </p>
                    </div>
                </div>

                <div class="border-y sm:border-y-0 sm:border-x border-white/20 px-4 py-5 sm:px-6 sm:py-6 text-center group">
                    <div class="flex flex-col items-center sm:items-start text-center sm:text-left">
                        <i class="fas fa-tags text-brand-orange text-2xl sm:text-3xl mb-2 sm:mb-3 transition-transform duration-300 group-hover:scale-110"></i>
                        <h3 class="font-semibold text-base sm:text-lg lg:text-xl mb-1">
                            Affordable Price
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-300 group-hover:text-white transition-colors duration-300 leading-normal sm:leading-relaxed">
                            Harga terbaik untuk pengalaman wisata maksimal dan tak terlupakan.
                        </p>
                    </div>
                </div>

                <div class="px-4 py-5 sm:px-6 sm:py-6 text-center group">
                    <div class="flex flex-col items-center sm:items-start text-center sm:text-left">
                        <i class="fas fa-headset text-brand-orange text-2xl sm:text-3xl mb-2 sm:mb-3 transition-transform duration-300 group-hover:scale-110"></i>
                        <h3 class="font-semibold text-base sm:text-lg lg:text-xl mb-1">
                            Great Support
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-300 group-hover:text-white transition-colors duration-300 leading-normal sm:leading-relaxed">
                            Dukungan pelanggan responsif siap membantu Anda kapan saja.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="wisata">
    <x-wisata.wisata :paketUtama="$paketUtama" :paketLainnya="$paketLainnya" />
</div>

<section
    class="relative w-full h-[50vh] bg-cover bg-center bg-fixed flex items-center"
    style="background-image: url('https://cdn.pixabay.com/photo/2021/12/02/01/22/city-6839388_1280.jpg');">

    <div class="absolute inset-0 bg-gradient-to-r from-[#1e2f5a]/80 to-[#1e2f5a]/40"></div>

    <div class="relative z-10 flex items-center justify-between w-full max-w-7xl mx-auto px-6 sm:px-12 md:px-16" data-aos="fade-in">

        <div class="max-w-xl text-white">
            <h2 class="text-4xl sm:text-5xl font-bold leading-tight mb-4 drop-shadow-lg">
                Jelajahi Pesona Kota Kembang
            </h2>
            <p class="text-base sm:text-lg mb-8 max-w-md drop-shadow-md">
                Temukan keindahan alam yang memukau dan pengalaman tak terlupakan. Paket wisata terbaik Bandung menanti Anda.
            </p>
            <a href="{{ route('wisata.index') }}" class="inline-flex items-center bg-orange-500 text-white font-semibold tracking-wide py-3 px-6 rounded-lg text-base sm:text-lg hover:bg-orange-600 transition-transform transform hover:scale-105 shadow-xl">
                LIHAT SEMUA PAKET
                <svg aria-hidden="true" class="ml-2 w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>

        <button aria-label="Play video" class="hidden sm:flex bg-white/30 hover:bg-white/40 backdrop-blur-sm rounded-full w-20 h-20 items-center justify-center transition-transform transform hover:scale-110 shadow-lg">
            <svg aria-hidden="true" class="w-10 h-10 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z"></path>
            </svg>
        </button>

    </div>
</section>

<x-ulasan :ulasanPelanggan="$ulasanPelanggan" />
    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const imageUrls = [
                "https://imgs.search.brave.com/kpkrmY4VmbA-PwjOVX6mDQ-D3ahPCOUmtq-ytKQM-1Y/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbmZv/YmFuZHVuZ2tvdGEu/Y29tL3dwLWNvbnRl/bnQvdXBsb2Fkcy8y/MDI0LzEwL1Bob3Rv/LV8tby1jcmVhdGl2/ZS1Qb2RvbW9yby1w/YXJrLnBuZw",
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