<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandung Vibes - Solusi Perjalanan Wisata Bandung Anda</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-orange': '#f28c1d',
                        'brand-orange-darker': '#d77a14', // For hover
                        'brand-blue-dark': '#031a44',
                        'brand-blue-dark-transparent': 'rgba(3, 26, 68, 0.85)', // Adjusted transparency
                        'brand-green-lime': '#A7C97A',
                        'brand-green-lime-darker': '#8bb463', // For hover
                        'brand-text-dark': '#1B2240',
                        'brand-border-gray': '#9CA3AF',
                        'brand-box-blue-bg': '#3674B5',
                        'dest-title': '#0B1E44',
                        'dest-button': '#E9A54B',
                        'dest-button-hover': '#d4943f',
                        'subtle-gray': '#f7fafc', // Light gray for card backgrounds
                        'text-muted': '#6b7280', // For less important text
                    },
                    fontFamily: {
                        'sans': ['"Open Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'], // Set Open Sans as default
                        'open-sans-display': ['"Open Sans"', 'sans-serif'], // Specific for watermark if needed
                    },
                    boxShadow: {
                        'custom-light': '0 4px 12px rgba(0, 0, 0, 0.08)',
                        'custom-medium': '0 8px 16px rgba(0, 0, 0, 0.1)',
                        'custom-deep': '0 10px 25px rgba(0,0,0,0.1), 0 20px 40px rgba(0,0,0,0.05)',
                    },
                    transitionTimingFunction: {
                        'custom-ease': 'cubic-bezier(0.25, 0.1, 0.25, 1)',
                    },
                }
            }
        }
    </script>
    <style>
        .font-bandung-vibes-watermark {
            font-family: 'Open Sans', sans-serif; /* Ensure it uses Open Sans */
            font-weight: 800; /* Make it bold as in font import */
        }
        /* Smooth scrolling for anchor links if any */
        html {
            scroll-behavior: smooth;
        }
        .group:hover .group-hover-scale-105 {
            transform: scale(1.05);
        }
        .group:hover .group-hover-text-brand-orange {
            color: #f28c1d;
        }
        
    </style>
</head>
<body class="bg-gray-200 text-brand-text-dark font-sans antialiased">

    <x-navbar /> 

<section class="relative min-h-screen mx-auto overflow-hidden flex flex-col z-0">
    <img
        class="absolute inset-0 w-full h-full object-cover -z-20" /* z-index lebih rendah */
        src="https://imgs.search.brave.com/kpkrmY4VmbA-PwjOVX6mDQ-D3ahPCOUmtq-ytKQM-1Y/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbmZv/YmFuZHVuZ2tvdGEu/Y29tL3dwLWNvbnRl/bnQvdXBsb2Fkcy8y/MDI0LzEwL1Bob3Rv/LV8tby1jcmVhdGl2/ZS1Qb2RvbW9yby1w/YXJrLnBuZw"
        alt="Bandung scenic background"
    />
    <div class="absolute inset-0 bg-gradient-to-b from-brand-blue-dark/85 via-brand-blue-dark/70 to-brand-blue-dark/85 -z-20"></div>
    <h2 class="absolute inset-0 flex justify-center items-center text-white font-extrabold text-[70px] xs:text-[80px] sm:text-[120px] md:text-[150px] opacity-10 select-none pointer-events-none -z-10 font-bandung-vibes-watermark">
        BandungVibes
    </h2>

    <div class="relative flex flex-col flex-grow w-full items-center px-4 z-10 pt-16 pb-8 sm:pt-24 sm:pb-0 sm:justify-center">
        
        <div class="flex flex-col items-center text-center w-full max-w-3xl mb-12 sm:mb-0"> 
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

        <div class="w-full mt-12 sm:absolute sm:bottom-0 sm:left-1/2 sm:transform sm:-translate-x-1/2 sm:max-w-screen-lg sm:xl:max-w-screen-xl sm:z-20 sm:mt-0 sm:mb-[-1px]"> 
            <div class="bg-white/10 backdrop-blur-xl shadow-custom-deep grid grid-cols-1 sm:grid-cols-3 text-white rounded-xl sm:rounded-t-2xl overflow-hidden">
                
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
<section class="py-16 sm:py-24 bg-subtle-gray">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 text-center">
        <h2 class="text-dest-title font-bold text-3xl sm:text-4xl mb-3">
            Paket Wisata Populer Bandung
        </h2>
        <p class="text-text-muted text-base sm:text-lg mb-12 sm:mb-16 max-w-2xl mx-auto">
            Temukan ketenangan dan petualangan dengan paket wisata Bandung yang dirancang khusus untuk menyegarkan jiwa dan pikiran Anda di tengah pesona Parahyangan.
        </p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
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
<section class="bg-white py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-dest-title">
                    Destinasi Ikonik Bandung
                </h2>
                <p class="mt-4 text-base sm:text-lg text-text-muted">
                    Jelajahi destinasi pilihan kami yang menakjubkan di Bandung dan sekitarnya, masing-masing menawarkan pengalaman unik, keindahan alam, dan budaya Sunda yang mempesona.
                </p>
            </div>

            <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-10 mb-12 md:mb-16">
                <div class="bg-subtle-gray rounded-xl shadow-custom-medium overflow-hidden flex flex-col transition-all duration-300 ease-custom-ease hover:shadow-custom-deep group">
                    <div class="relative overflow-hidden">
                        <img alt="Kawah Putih Ciwidey" class="w-full h-72 object-cover group-hover-scale-105 transition-transform duration-500 ease-custom-ease" src="https://imgs.search.brave.com/CsV1f7xIxKrOtlXDxbVk-KlU_2GH0UR3IG_6BjpBNAQ/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9ibHVl/Lmt1bXBhcmFuLmNv/bS9pbWFnZS91cGxv/YWQvZmxfcHJvZ3Jl/c3NpdmUsZmxfbG9z/c3ksY19maWxsLHFf/YXV0bzpiZXN0LHdf/NjQwL3YxNjM0MDI1/NDM5LzAxajJ4NWVq/Mmh2MGgxZ2Q1cmdy/dmNidHQ3LmpwZw"/> <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-dest-title font-semibold text-xl md:text-2xl group-hover-text-brand-orange transition-colors duration-300">
                                Kawah Putih, Ciwidey
                            </h3>
                            <div class="text-right flex-shrink-0 ml-4">
                                <p class="text-xs text-text-muted whitespace-nowrap">Mulai dari</p>
                                <p class="font-bold text-xl text-dest-title whitespace-nowrap">
                                    Rp 75.000
                                </p>
                                <p class="text-xs text-text-muted whitespace-nowrap">per orang</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2 text-sm text-gray-600 mt-1 mb-4">
                            <div class="flex text-dest-button">
                                <i class="fas fa-star text-base"></i> <i class="fas fa-star text-base"></i> <i class="fas fa-star text-base"></i> <i class="fas fa-star text-base"></i> <i class="fas fa-star-half-alt text-base"></i>
                            </div>
                            <span class="text-text-muted text-xs sm:text-sm">(3,872 reviews)</span>
                        </div>
                        <p class="text-sm text-text-muted leading-relaxed mb-6 flex-grow min-h-[60px]">
                            Saksikan keindahan danau kawah vulkanik dengan air berwarna putih kehijauan yang surealis, dikelilingi hutan Cantigi.
                        </p>
                        <button class="mt-auto w-full bg-dest-button text-white text-sm font-semibold px-6 py-3 rounded-lg flex items-center justify-center gap-2 hover:bg-dest-button-hover transition-colors duration-300 shadow-md hover:shadow-lg transform hover:scale-105">
                            Jelajahi Kawah Putih <i class="fas fa-arrow-right text-xs ml-1"></i>
                        </button>
                    </div>
                </div>

                <div class="bg-subtle-gray rounded-xl shadow-custom-medium overflow-hidden flex flex-col transition-all duration-300 ease-custom-ease hover:shadow-custom-deep group">
                     <div class="relative overflow-hidden">
                        <img alt="Tangkuban Perahu Lembang" class="w-full h-72 object-cover group-hover-scale-105 transition-transform duration-500 ease-custom-ease" src="https://imgs.search.brave.com/39AqTIIAmVCsQ8r5dOUYJEO6n7xxRpWWueR6qDFbtRo/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9jZG4u/cGl4YWJheS5jb20v/cGhvdG8vMjAyMy8w/My8xNi8xNS8zNy90/YW5na3ViYW4tcGVy/YWh1LTc4NTY5ODNf/NjQwLmpwZw"/> <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-dest-title font-semibold text-xl md:text-2xl group-hover-text-brand-orange transition-colors duration-300">
                                Tangkuban Perahu
                            </h3>
                            <div class="text-right flex-shrink-0 ml-4">
                                <p class="text-xs text-text-muted whitespace-nowrap">Mulai dari</p>
                                <p class="font-bold text-xl text-dest-title whitespace-nowrap">
                                     Rp 50.000
                                </p>
                                <p class="text-xs text-text-muted whitespace-nowrap">per orang</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2 text-sm text-gray-600 mt-1 mb-4">
                            <div class="flex text-dest-button">
                               <i class="fas fa-star text-base"></i> <i class="fas fa-star text-base"></i> <i class="fas fa-star text-base"></i> <i class="fas fa-star text-base"></i> <i class="far fa-star text-base"></i>
                            </div>
                            <span class="text-text-muted text-xs sm:text-sm">(4,120 reviews)</span>
                        </div>
                        <p class="text-sm text-text-muted leading-relaxed mb-6 flex-grow min-h-[60px]">
                            Gunung berapi aktif yang terkenal dengan legenda Sangkuriang dan kawah-kawahnya yang memukau seperti Kawah Ratu.
                        </p>
                        <button class="mt-auto w-full bg-dest-button text-white text-sm font-semibold px-6 py-3 rounded-lg flex items-center justify-center gap-2 hover:bg-dest-button-hover transition-colors duration-300 shadow-md hover:shadow-lg transform hover:scale-105">
                            Kunjungi Tangkuban Perahu <i class="fas fa-arrow-right text-xs ml-1"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
                <div class="bg-subtle-gray rounded-xl shadow-custom-medium overflow-hidden flex flex-col transition-all duration-300 ease-custom-ease hover:shadow-custom-deep group">
                    <div class="relative overflow-hidden">
                        <img alt="Gedung Sate Bandung" class="w-full h-60 object-cover group-hover-scale-105 transition-transform duration-500 ease-custom-ease" src="https://imgs.search.brave.com/bnS9xF3CFlrJCNR0dDOdVgFsMURdBT3ITMPt2gC2vM8/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9zdGF0/aWsudGVtcG8uY28v/ZGF0YS8yMDIwLzA3/LzI3L2lkXzk1NTY4/NS85NTU2ODVfNzIw/LmpwZw"/> <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <h3 class="text-dest-title font-semibold text-lg lg:text-xl mb-1 group-hover-text-brand-orange transition-colors duration-300">
                            Gedung Sate & Kota
                        </h3>
                        <div class="flex items-center space-x-2 text-xs text-gray-600 mb-2">
                            <div class="flex text-dest-button">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-text-muted text-xs">(3,550 reviews)</span>
                        </div>
                        <p class="text-xs sm:text-sm text-text-muted leading-relaxed mb-3 flex-grow min-h-[50px] sm:min-h-[70px]">
                            Ikon arsitektur Art Deco Bandung, pusat pemerintahan Jawa Barat, dan jelajahi area bersejarah di sekitarnya.
                        </p>
                        <div class="text-text-muted text-xs sm:text-sm mb-4">
                            <span>Mulai </span>
                            <span class="font-bold text-lg text-dest-title ml-1">
                                Rp 25.000
                            </span>
                            <span class="ml-1">per orang</span>
                        </div>
                        <button class="mt-auto w-full bg-dest-button text-white text-xs sm:text-sm font-semibold px-5 py-2.5 rounded-lg flex items-center justify-center gap-2 hover:bg-dest-button-hover transition-colors duration-300 shadow-md hover:shadow-lg transform hover:scale-105">
                            Eksplor Pusat Kota <i class="fas fa-arrow-right text-xs ml-1"></i>
                        </button>
                    </div>
                </div>
                <div class="bg-subtle-gray rounded-xl shadow-custom-medium overflow-hidden flex flex-col transition-all duration-300 ease-custom-ease hover:shadow-custom-deep group">
                    <div class="relative overflow-hidden">
                        <img alt="Farmhouse Lembang" class="w-full h-60 object-cover group-hover-scale-105 transition-transform duration-500 ease-custom-ease" src="https://imgs.search.brave.com/cmzd4iFvX3jOS-sLyzqm6FHXuAi2YQcYZcOxis_8AZw/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9uYWdh/bnRvdXIuY29tL3dw/LWNvbnRlbnQvdXBs/b2Fkcy8yMDIzLzEy/L0Zhcm1ob3VzZS1M/ZW1iYW5nLTUucG5n"/> <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <h3 class="text-dest-title font-semibold text-lg lg:text-xl mb-1 group-hover-text-brand-orange transition-colors duration-300">
                            Farmhouse Lembang
                        </h3>
                        <div class="flex items-center space-x-2 text-xs text-gray-600 mb-2">
                            <div class="flex text-dest-button">
                               <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                            </div>
                            <span class="text-text-muted text-xs">(3,980 reviews)</span>
                        </div>
                        <p class="text-xs sm:text-sm text-text-muted leading-relaxed mb-3 flex-grow min-h-[50px] sm:min-h-[70px]">
                            Wisata keluarga dengan konsep peternakan ala Eropa, spot foto instagramable, dan interaksi dengan hewan ternak.
                        </p>
                        <div class="text-text-muted text-xs sm:text-sm mb-4">
                            <span>Mulai </span>
                            <span class="font-bold text-lg text-dest-title ml-1">
                                Rp 35.000
                            </span>
                            <span class="ml-1">per orang</span>
                        </div>
                        <button class="mt-auto w-full bg-dest-button text-white text-xs sm:text-sm font-semibold px-5 py-2.5 rounded-lg flex items-center justify-center gap-2 hover:bg-dest-button-hover transition-colors duration-300 shadow-md hover:shadow-lg transform hover:scale-105">
                            Kunjungi Farmhouse <i class="fas fa-arrow-right text-xs ml-1"></i>
                        </button>
                    </div>
                </div>
                <div class="bg-subtle-gray rounded-xl shadow-custom-medium overflow-hidden flex flex-col transition-all duration-300 ease-custom-ease hover:shadow-custom-deep group">
                    <div class="relative overflow-hidden">
                        <img alt="Situ Patenggang Rancabali" class="w-full h-60 object-cover group-hover-scale-105 transition-transform duration-500 ease-custom-ease" src="https://imgs.search.brave.com/0fRRCumesEtsxL4dbnHpSF9xQcs0XTqBygXvns_09RA/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9jbmMt/bWFnYXppbmUub3Jh/bWlsYW5kLmNvbS9w/YXJlbnRpbmcvaW1h/Z2VzL2dsYW1waW5n/LXJhbmNhYmFsaS53/aWR0aC04MDAuZm9y/bWF0LXdlYnAud2Vi/cA"/> <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <h3 class="text-dest-title font-semibold text-lg lg:text-xl mb-1 group-hover-text-brand-orange transition-colors duration-300">
                            Situ Patenggang
                        </h3>
                        <div class="flex items-center space-x-2 text-xs text-gray-600 mb-2">
                            <div class="flex text-dest-button">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-text-muted text-xs">(4,210 reviews)</span>
                        </div>
                        <p class="text-xs sm:text-sm text-text-muted leading-relaxed mb-3 flex-grow min-h-[50px] sm:min-h-[70px]">
                            Danau indah dengan legenda Batu Cinta, dikelilingi kebun teh Rancabali, dan spot Glamping Lakeside yang ikonik.
                        </p>
                        <div class="text-text-muted text-xs sm:text-sm mb-4">
                            <span>Mulai </span>
                            <span class="font-bold text-lg text-dest-title ml-1">
                                Rp 40.000
                            </span>
                            <span class="ml-1">per orang</span>
                        </div>
                        <button class="mt-auto w-full bg-dest-button text-white text-xs sm:text-sm font-semibold px-5 py-2.5 rounded-lg flex items-center justify-center gap-2 hover:bg-dest-button-hover transition-colors duration-300 shadow-md hover:shadow-lg transform hover:scale-105">
                            Nikmati Situ Patenggang <i class="fas fa-arrow-right text-xs ml-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-brand-blue-dark text-gray-300 py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h4 class="font-semibold text-white text-lg mb-3">Bandung Vibes</h4>
                    <p class="text-sm leading-relaxed">Solusi perjalanan wisata Anda untuk pengalaman tak terlupakan di Bandung dan sekitarnya. Jelajahi keindahan alam, kuliner lezat, dan budaya Sunda yang kaya.</p>
                </div>
                <div>
                    <h5 class="font-semibold text-white text-base mb-3">Link Cepat</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-brand-orange transition-colors">Beranda</a></li>
                        <li><a href="#" class="hover:text-brand-orange transition-colors">Paket Wisata Bandung</a></li>
                        <li><a href="#" class="hover:text-brand-orange transition-colors">Destinasi Bandung</a></li>
                        <li><a href="#" class="hover:text-brand-orange transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-brand-orange transition-colors">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold text-white text-base mb-3">Hubungi Kami</h5>
                    <ul class="space-y-2 text-sm">
                        <li><i class="fas fa-map-marker-alt fa-fw mr-2"></i> UIN Bandung, Jawa Barat</li>
                        <li><i class="fas fa-phone fa-fw mr-2"></i> (+62) 082</li>
                        <li><i class="fas fa-envelope fa-fw mr-2"></i> Vibes@Bandungvibes.com</li>
                    </ul>
                    <div class="mt-4 flex space-x-3">
                        <a href="#" class="text-gray-400 hover:text-brand-orange transition-colors"><i class="fab fa-facebook-f text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-brand-orange transition-colors"><i class="fab fa-instagram text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-brand-orange transition-colors"><i class="fab fa-tiktok text-xl"></i></a> </div>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-8 text-center text-sm">
                <p>&copy; <span id="currentYear"></span> Bandung Vibes. Semua Hak Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('currentYear').textContent = new Date().getFullYear();
    </script>

</body>
</html>