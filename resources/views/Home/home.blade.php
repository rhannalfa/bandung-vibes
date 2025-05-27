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
            <h1 class="text-white font-extrabold text-4xl sm:text-5xl lg:text-6xl leading-tight sm:leading-snug relative [text-shadow:_2px_2px_8px_rgba(0,0,0,0.7)]">
                SOLUSI PERJALANAN<br class="hidden sm:block"/> WISATA ANDA
            </h1>
            <p class="text-gray-200 mt-6 text-base sm:text-lg max-w-xl mx-auto">
                Temukan petualangan tak terlupakan di Bandung dan sekitarnya dengan paket wisata eksklusif kami.
            </p>
            <button class="mt-10 bg-brand-orange text-white text-sm sm:text-base font-semibold rounded-full px-8 py-3.5 flex items-center justify-center mx-auto space-x-2.5 hover:bg-brand-orange-darker transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                <i class="fas fa-paper-plane text-xs"></i>
                <span>Jelajahi Paket</span>
            </button>
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

<section class="py-16 sm:py-24 bg-subtle-gray"  >
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 text-center">
        <h2 class="text-dest-title font-bold text-3xl sm:text-4xl mb-3" data-aos="fade-in">
            Paket Wisata Populer Bandung
        </h2>
        <p class="text-text-muted text-base sm:text-lg mb-12 sm:mb-16 max-w-2xl mx-auto" data-aos="fade-in">
            Temukan ketenangan dan petualangan dengan paket wisata Bandung yang dirancang khusus untuk menyegarkan jiwa dan pikiran Anda di tengah pesona Parahyangan.
        </p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8" data-aos="fade-in">
            <div class="bg-white rounded-xl shadow-custom-medium p-6 flex flex-col text-center text-dest-title transition-all duration-300 ease-custom-ease hover:shadow-custom-deep hover:scale-105 transform group">
                <div class="relative mx-auto mb-5">
                    <div class="absolute inset-0 bg-gradient-to-br from-brand-orange to-yellow-400 rounded-full transform scale-105 blur-md opacity-50 group-hover:opacity-75 transition-opacity duration-300"></div>
                    <div class="relative bg-white rounded-full p-2 shadow-sm inline-block">
                        <img alt="Staycation Bandung icon" class="w-24 h-24 sm:w-28 sm:h-28 object-contain rounded-full" src="https://storage.googleapis.com/a1aa/image/49468e1d-79a1-419a-07cc-fa39a6748906.jpg"/> </div>
                </div>
                <h3 class="font-semibold text-xl sm:text-2xl mb-2 group-hover:text-brand-orange transition-colors duration-300">
                    Staycation Asyik
                </h3>
                <p class="text-sm text-text-muted mb-4 leading-relaxed min-h-[60px] sm:min-h-[84px]">
                    Nikmati kenyamanan menginap di villa atau hotel terbaik Bandung. Cocok untuk keluarga maupun pasangan.
                </p>
                <p class="font-semibold text-base text-brand-orange mb-6">
                    Mulai Rp 450.000/ Malam
                </p>
                <div class="w-full mt-auto space-y-2">
                    <button class="bg-gray-200 text-gray-700 text-sm font-medium rounded-lg w-full py-2.5 shadow-sm hover:bg-gray-300 transition-colors duration-300">
                        Lihat Fasilitas
                    </button>
                    <button class="bg-brand-orange text-white text-sm font-semibold rounded-lg w-full py-2.5 shadow-md hover:bg-orange-600 transition-colors duration-300 transform hover:scale-105">
                        Booking Sekarang
                    </button>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-custom-medium p-6 flex flex-col text-center text-dest-title transition-all duration-300 ease-custom-ease hover:shadow-custom-deep hover:scale-105 transform group">
                <div class="relative mx-auto mb-5">
                    <div class="absolute inset-0 bg-gradient-to-br from-brand-orange to-yellow-400 rounded-full transform scale-105 blur-md opacity-50 group-hover:opacity-75 transition-opacity duration-300"></div>
                    <div class="relative bg-white rounded-full p-2 shadow-sm inline-block">
                        <img alt="Glamping Lembang Ciwidey icon" class="w-24 h-24 sm:w-28 sm:h-28 object-contain rounded-full" src="https://storage.googleapis.com/a1aa/image/f359fe1d-abbf-4f69-a108-41fe50685a10.jpg"/> </div>
                </div>
                <h3 class="font-semibold text-xl sm:text-2xl mb-2 group-hover:text-brand-orange transition-colors duration-300">
                    Glamping Lembang/Ciwidey
                </h3>
                <p class="text-sm text-text-muted mb-4 leading-relaxed min-h-[60px] sm:min-h-[84px]">
                    Rasakan sensasi berkemah mewah di Lembang atau Ciwidey, menyatu dengan keindahan alam tanpa meninggalkan kenyamanan.
                </p>
                <p class="font-semibold text-base text-brand-orange mb-6">
                    Mulai Rp 150.000/ orang
                </p>
                <div class="w-full mt-auto space-y-2">
                    <button class="bg-gray-200 text-gray-700 text-sm font-medium rounded-lg w-full py-2.5 shadow-sm hover:bg-gray-300 transition-colors duration-300">
                        Lihat Fasilitas
                    </button>
                    <button class="bg-brand-orange text-white text-sm font-semibold rounded-lg w-full py-2.5 shadow-md hover:bg-orange-600 transition-colors duration-300 transform hover:scale-105">
                        Booking Sekarang
                    </button>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-custom-medium p-6 flex flex-col text-center text-dest-title transition-all duration-300 ease-custom-ease hover:shadow-custom-deep hover:scale-105 transform group">
                <div class="relative mx-auto mb-5">
                    <div class="absolute inset-0 bg-gradient-to-br from-brand-orange to-yellow-400 rounded-full transform scale-105 blur-md opacity-50 group-hover:opacity-75 transition-opacity duration-300"></div>
                    <div class="relative bg-white rounded-full p-2 shadow-sm inline-block">
                        <img alt="Offroad Lembang icon" class="w-24 h-24 sm:w-28 sm:h-28 object-contain rounded-full" src="https://storage.googleapis.com/a1aa/image/82ec32f4-ec58-4fd3-1476-1a880cbe8e4c.jpg"/> </div>
                </div>
                <h3 class="font-semibold text-xl sm:text-2xl mb-2 group-hover:text-brand-orange transition-colors duration-300">
                    Offroad Lembang
                </h3>
                <p class="text-sm text-text-muted mb-4 leading-relaxed min-h-[60px] sm:min-h-[84px]">
                    Tantang adrenalin Anda menjelajahi jalur ekstrem Lembang dengan mobil 4x4 sambil menikmati pemandangan hutan pinus dan kebun teh.
                </p>
                <p class="font-semibold text-base text-brand-orange mb-6">
                    Mulai Rp 250.000/ orang
                </p>
                <div class="w-full mt-auto space-y-2">
                    <button class="bg-gray-200 text-gray-700 text-sm font-medium rounded-lg w-full py-2.5 shadow-sm hover:bg-gray-300 transition-colors duration-300">
                        Lihat Fasilitas
                    </button>
                    <button class="bg-brand-orange text-white text-sm font-semibold rounded-lg w-full py-2.5 shadow-md hover:bg-orange-600 transition-colors duration-300 transform hover:scale-105">
                        Booking Sekarang
                    </button>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-custom-medium p-6 flex flex-col text-center text-dest-title transition-all duration-300 ease-custom-ease hover:shadow-custom-deep hover:scale-105 transform group">
                <div class="relative mx-auto mb-5">
                    <div class="absolute inset-0 bg-gradient-to-br from-brand-orange to-yellow-400 rounded-full transform scale-105 blur-md opacity-50 group-hover:opacity-75 transition-opacity duration-300"></div>
                    <div class="relative bg-white rounded-full p-2 shadow-sm inline-block">
                        <img alt="Rafting Pangalengan icon" class="w-24 h-24 sm:w-28 sm:h-28 object-contain rounded-full" src="https://storage.googleapis.com/a1aa/image/8fb05f49-0976-4146-8bff-ab8daca8d88c.jpg"/> </div>
                </div>
                <h3 class="font-semibold text-xl sm:text-2xl mb-2 group-hover:text-brand-orange transition-colors duration-300">
                    Arung Jeram Pangalengan
                </h3>
                <p class="text-sm text-text-muted mb-4 leading-relaxed min-h-[60px] sm:min-h-[84px]">
                    Perkuat kerjasama tim melalui aktivitas outbound seru dan arung jeram menantang di sungai Palayangan, Pangalengan.
                </p>
                <p class="font-semibold text-base text-brand-orange mb-6">
                    Mulai Rp 175.000/ orang
                </p>
                <div class="w-full mt-auto space-y-2">
                    <button class="bg-gray-200 text-gray-700 text-sm font-medium rounded-lg w-full py-2.5 shadow-sm hover:bg-gray-300 transition-colors duration-300">
                        Lihat Fasilitas
                    </button>
                    <button class="bg-brand-orange text-white text-sm font-semibold rounded-lg w-full py-2.5 shadow-md hover:bg-orange-600 transition-colors duration-300 transform hover:scale-105">
                        Booking Sekarang
                    </button>
                </div>
            </div>
        </div>
        <button aria-label="Healing Seru Lainnya" class="mt-12 bg-brand-orange text-white text-base font-semibold rounded-full px-10 py-3.5 shadow-lg hover:bg-orange-600 transition-all duration-300 hover:shadow-xl transform hover:scale-105">
            Lihat Semua Wisata Bandung
        </button>
    </div>
</section>

    <x-wisata.wisata />
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