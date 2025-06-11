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

<body class=" font-sans antialiased">

    <x-navbar /> {{-- Gunakan navbar yang sudah ada --}}
<section class="relative mx-auto overflow-hidden flex flex-col z-0 sm:h-[60vh] md:h-[50vh] lg:h-[40vh]">
    <img
        id="hero-background-image" class="absolute inset-0 w-full h-full object-cover -z-20 transition-opacity duration-1000 ease-in-out" 
        src="
            https://cdn.pixabay.com/photo/2022/06/25/17/51/bandung-city-7283934_1280.jpg
        " alt="Bandung scenic background"
    />
    <div class="absolute inset-0 bg-gradient-to-b from-brand-blue-dark/30 via-brand-blue-dark/50 to-brand-blue-dark/50 -z-20"></div>
    
    <h2 class="absolute inset-0 flex justify-center items-center text-white font-extrabold text-[70px] xs:text-[80px] sm:text-[120px] md:text-[150px] opacity-20 select-none pointer-events-none -z-10 font-bandung-vibes-watermark">
        BandungVibes
    </h2>

    <div class="relative flex flex-col flex-grow w-full items-center px-4 py-10 z-10 pt-32 pb-8 sm:pt-24 sm:pb-0 sm:justify-center " >
    </div>
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0] z-10">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-[60px] sm:h-[90px] md:h-[90px]">
            <path d="M985.66,92.83C906.67,72,823.78,31.84,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="fill-white"></path>
        </svg>
    </div>
</section>

<section class="relative  py-16 sm:py-24">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16" data-aos="fade-out">
            <h2 class="text-3xl sm:text-5xl font-bold text-dest-title">
                Paket Wisata 1 Hari
            </h2>
        </div>

        <div class="mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-10 mb-12 md:mb-16" data-aos="fade-in">
            
            <div class="bg-subtle-gray rounded-xl border border-transparent overflow-hidden flex flex-col transition-all duration-300 ease-in-out hover:shadow-2xl hover:border-orange-200 group">
                <div class="relative overflow-hidden">
                    <img alt="Paket Pesona Bandung Utara" class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out" src="https://imgs.search.brave.com/39AqTIIAmVCsQ8r5dOUYJEO6n7xxRpWWueR6qDFbtRo/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9jZG4u/cGl4YWJheS5jb20v/cGhvdG8vMjAyMy8w/My8xNi8xNS8zNy90/YW5na3ViYW4tcGVy/YWh1LTc4NTY5ODNf/NjQwLmpwZw"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute top-4 right-4 bg-black/50 text-white text-xs font-semibold px-3 py-1.5 rounded-full backdrop-blur-sm flex items-center gap-2">
                        <i class="far fa-clock"></i>
                        <span>Fullday Tour</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-dest-title font-bold text-xl md:text-2xl group-hover:text-dest-button transition-colors">
                            Paket Pesona Bandung Utara
                        </h3>
                        <div class="text-right flex-shrink-0 ml-4">
                            <p class="text-xs text-text-muted">Mulai dari</p>
                            <p class="font-extrabold text-xl text-dest-title">
                                Rp 350.000
                            </p>
                        </div>
                    </div>
                    <p class="text-sm text-text-muted leading-relaxed mb-4">
                        Paket favorit untuk keluarga. Nikmati udara sejuk Lembang sambil menjelajahi destinasi alam, kreasi, dan kuliner paling hits.
                    </p>
                    <div class="text-sm text-dest-title space-y-2 mb-6 flex-grow">
                        <p class="flex items-center"><i class="fas fa-check-circle text-dest-button mr-2.5"></i>Gunung Tangkuban Perahu</p>
                        <p class="flex items-center"><i class="fas fa-check-circle text-dest-button mr-2.5"></i>The Great Asia Africa / Farmhouse</p>
                        <p class="flex items-center"><i class="fas fa-check-circle text-dest-button mr-2.5"></i>Floating Market Lembang</p>
                    </div>
                    <button class="mt-auto w-full bg-dest-button text-white font-semibold px-6 py-3 rounded-lg flex items-center justify-center gap-2 hover:bg-dest-button-hover transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                        Lihat Detail <i class="fas fa-arrow-right text-xs ml-1"></i>
                    </button>
                </div>
            </div>

            <div class="bg-subtle-gray rounded-xl border border-transparent overflow-hidden flex flex-col transition-all duration-300 ease-in-out hover:shadow-2xl hover:border-orange-200 group">
                <div class="relative overflow-hidden">
                    <img alt="Paket Eksotisme Bandung Selatan" class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out" src="https://imgs.search.brave.com/0fRRCumesEtsxL4dbnHpSF9xQcs0XTqBygXvns_09RA/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9jbmMt/bWFnYXppbmUub3Jh/bWlsYW5kLmNvbS9w/YXJlbnRpbmcvaW1h/Z2VzL2dsYW1waW5n/LXJhbmNhYmFsaS53/aWR0aC04MDAuZm9y/bWF0LXdlYnAud2Vi/cA"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute top-4 right-4 bg-black/50 text-white text-xs font-semibold px-3 py-1.5 rounded-full backdrop-blur-sm flex items-center gap-2">
                        <i class="far fa-clock"></i>
                        <span>Fullday Tour</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                     <div class="flex justify-between items-start mb-3">
                        <h3 class="text-dest-title font-bold text-xl md:text-2xl group-hover:text-dest-button transition-colors">
                            Paket Eksotisme Bandung Selatan
                        </h3>
                        <div class="text-right flex-shrink-0 ml-4">
                            <p class="text-xs text-text-muted">Mulai dari</p>
                            <p class="font-extrabold text-xl text-dest-title">
                                Rp 400.000
                            </p>
                        </div>
                    </div>
                    <p class="text-sm text-text-muted leading-relaxed mb-4">
                        Perjalanan magis ke surga selatan Bandung, memanjakan mata dengan danau vulkanik, kebun teh, dan suasana romantis.
                    </p>
                     <div class="text-sm text-dest-title space-y-2 mb-6 flex-grow">
                        <p class="flex items-center"><i class="fas fa-check-circle text-dest-button mr-2.5"></i>Kawah Putih</p>
                        <p class="flex items-center"><i class="fas fa-check-circle text-dest-button mr-2.5"></i>Glamping Lakeside (Resto Pinisi)</p>
                        <p class="flex items-center"><i class="fas fa-check-circle text-dest-button mr-2.5"></i>Perkebunan Teh Rancabali</p>
                    </div>
                    <button class="mt-auto w-full bg-dest-button text-white font-semibold px-6 py-3 rounded-lg flex items-center justify-center gap-2 hover:bg-dest-button-hover transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                        Lihat Detail <i class="fas fa-arrow-right text-xs ml-1"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10" data-aos="fade-in">
            
            <div class="bg-subtle-gray rounded-xl border border-transparent overflow-hidden flex flex-col transition-all duration-300 ease-in-out hover:shadow-2xl hover:border-orange-200 group">
                <div class="relative overflow-hidden">
                    <img alt="Paket Jelajah Pusaka Kota" class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out" 
                    src="
                    https://cdn.pixabay.com/photo/2023/04/09/17/24/cukul-7911922_1280.jpg
                    "/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute top-4 right-4 bg-black/50 text-white text-xs font-semibold px-3 py-1.5 rounded-full backdrop-blur-sm flex items-center gap-2">
                        <i class="far fa-clock"></i>
                        <span>Fullday Tour</span>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="text-dest-title font-bold text-lg lg:text-xl mb-2 group-hover:text-dest-button transition-colors">
                        Paket Jelajah Pusaka Kota
                    </h3>
                    <p class="text-xs sm:text-sm text-text-muted leading-relaxed mb-4">
                        Susuri jejak "Paris van Java", ideal untuk pecinta arsitektur, sejarah, dan denyut nadi kota Bandung.
                    </p>
                    <div class="text-xs text-dest-title space-y-1.5 pt-2 border-t border-slate-200 flex-grow">
                        <p class="flex items-center"><i class="fas fa-check text-dest-button/70 mr-2.5"></i>Gedung Sate & Museum Geologi</p>
                        <p class="flex items-center"><i class="fas fa-check text-dest-button/70 mr-2.5"></i>Jalan Braga</p>
                        <p class="flex items-center"><i class="fas fa-check text-dest-button/70 mr-2.5"></i>Alun-Alun Bandung</p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-200 flex justify-between items-center">
                         <div class="text-left">
                            <p class="text-xs text-text-muted">Mulai dari</p>
                            <p class="font-extrabold text-lg text-dest-title">Rp 150.000</p>
                        </div>
                        <button class="bg-dest-button text-white font-semibold px-4 py-2 rounded-lg flex items-center justify-center gap-2 hover:bg-dest-button-hover transition-all duration-300 transform hover:scale-105">
                            Detail <i class="fas fa-arrow-right text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-subtle-gray rounded-xl border border-transparent overflow-hidden flex flex-col transition-all duration-300 ease-in-out hover:shadow-2xl hover:border-orange-200 group">
                <div class="relative overflow-hidden">
                    <img alt="Paket Harmoni Bandung Timur" class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out" 
                    src="
                        https://cdn.pixabay.com/photo/2023/04/09/17/24/cukul-7911922_1280.jpg                    
                        "/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute top-4 right-4 bg-black/50 text-white text-xs font-semibold px-3 py-1.5 rounded-full backdrop-blur-sm flex items-center gap-2">
                        <i class="far fa-clock"></i>
                        <span>Fullday Tour</span>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="text-dest-title font-bold text-lg lg:text-xl mb-2 group-hover:text-dest-button transition-colors">
                        Paket Harmoni Bandung Timur
                    </h3>
                    <p class="text-xs sm:text-sm text-text-muted leading-relaxed mb-4">
                        Rasakan sisi lain Bandung, memadukan kekayaan budaya Sunda otentik dengan pemandangan alam perbukitan.
                    </p>
                    <div class="text-xs text-dest-title space-y-1.5 pt-2 border-t border-slate-200 flex-grow">
                        <p class="flex items-center"><i class="fas fa-check text-dest-button/70 mr-2.5"></i>Saung Angklung Udjo</p>
                        <p class="flex items-center"><i class="fas fa-check text-dest-button/70 mr-2.5"></i>Bukit Moko (City View)</p>
                        <p class="flex items-center"><i class="fas fa-check text-dest-button/70 mr-2.5"></i>Kuliner Khas Sunda</p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-200 flex justify-between items-center">
                         <div class="text-left">
                            <p class="text-xs text-text-muted">Mulai dari</p>
                            <p class="font-extrabold text-lg text-dest-title">Rp 275.000</p>
                        </div>
                        <button class="bg-dest-button text-white font-semibold px-4 py-2 rounded-lg flex items-center justify-center gap-2 hover:bg-dest-button-hover transition-all duration-300 transform hover:scale-105">
                            Detail <i class="fas fa-arrow-right text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="bg-subtle-gray rounded-xl border border-transparent overflow-hidden flex flex-col transition-all duration-300 ease-in-out hover:shadow-2xl hover:border-orange-200 group">
                <div class="relative overflow-hidden">
                    <img alt="Paket Petualangan Bandung Barat" class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out" 
                    src="
                        https://cdn.pixabay.com/photo/2023/04/09/17/24/cukul-7911922_1280.jpg
                    "/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute top-4 right-4 bg-black/50 text-white text-xs font-semibold px-3 py-1.5 rounded-full backdrop-blur-sm flex items-center gap-2">
                        <i class="far fa-clock"></i>
                        <span>Fullday Tour</span>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="text-dest-title font-bold text-lg lg:text-xl mb-2 group-hover:text-dest-button transition-colors">
                        Paket Petualangan Bandung Barat
                    </h3>
                    <p class="text-xs sm:text-sm text-text-muted leading-relaxed mb-4">
                        Untuk jiwa petualang! Taklukkan lanskap geopark purba, jelajahi perbukitan kapur eksotis, dan susuri gua prasejarah.
                    </p>
                    <div class="text-xs text-dest-title space-y-1.5 pt-2 border-t border-slate-200 flex-grow">
                        <p class="flex items-center"><i class="fas fa-check text-dest-button/70 mr-2.5"></i>Stone Garden Citatah</p>
                        <p class="flex items-center"><i class="fas fa-check text-dest-button/70 mr-2.5"></i>Gua Pawon</p>
                        <p class="flex items-center"><i class="fas fa-check text-dest-button/70 mr-2.5"></i>Curug Pelangi</p>
                    </div>
                     <div class="mt-4 pt-4 border-t border-slate-200 flex justify-between items-center">
                         <div class="text-left">
                            <p class="text-xs text-text-muted">Mulai dari</p>
                            <p class="font-extrabold text-lg text-dest-title">Rp 300.000</p>
                        </div>
                        <button class="bg-dest-button text-white font-semibold px-4 py-2 rounded-lg flex items-center justify-center gap-2 hover:bg-dest-button-hover transition-all duration-300 transform hover:scale-105">
                            Detail <i class="fas fa-arrow-right text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
    
    <section class="py-16 sm:py-24 bg-gray-600">
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