@vite(['resources/css/app.css', 'resources/js/app.js'])

<section class="bg-white py-16 sm:py-24">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16" data-aos="fade-out">
            <h2 class="text-3xl sm:text-5xl font-bold text-dest-title">
                Paket Wisata Terpopuler Bandung
            </h2>
            <p class="mt-4 text-base sm:text-lg text-text-muted max-w-2xl mx-auto">
                Pilih petualanganmu! Kami telah merancang paket wisata terbaik berdasarkan wilayah untuk pengalaman liburan yang tak terlupakan di Paris van Java.
            </p>
        </div>

        {{-- Dua kartu utama --}}
        <div class="mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-10 mb-12 md:mb-16" data-aos="fade-in">
            
            {{-- Kartu 1: Bandung Utara --}}
            <div class="bg-subtle-gray rounded-xl border border-transparent overflow-hidden flex flex-col transition-all duration-300 ease-in-out hover:shadow-2xl hover:border-orange-200 group">
                {{-- EFEK DITERAPKAN DI SINI --}}
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

            {{-- Kartu 2: Bandung Selatan --}}
            <div class="bg-subtle-gray rounded-xl border border-transparent overflow-hidden flex flex-col transition-all duration-300 ease-in-out hover:shadow-2xl hover:border-orange-200 group">
                 {{-- EFEK DITERAPKAN DI SINI --}}
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

        {{-- Tiga kartu kecil --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10" data-aos="fade-in">
            
            {{-- Kartu 3: Pusaka Kota --}}
            <div class="bg-subtle-gray rounded-xl border border-transparent overflow-hidden flex flex-col transition-all duration-300 ease-in-out hover:shadow-2xl hover:border-orange-200 group">
                {{-- EFEK DITERAPKAN DI SINI --}}
                <div class="relative overflow-hidden">
                    <img alt="Paket Jelajah Pusaka Kota" class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out" 
                    src="https://cdn.pixabay.com/photo/2023/04/09/17/24/cukul-7911922_1280.jpg"/>
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

            {{-- Kartu 4: Bandung Timur --}}
            <div class="bg-subtle-gray rounded-xl border border-transparent overflow-hidden flex flex-col transition-all duration-300 ease-in-out hover:shadow-2xl hover:border-orange-200 group">
                {{-- EFEK DITERAPKAN DI SINI --}}
                <div class="relative overflow-hidden">
                    <img alt="Paket Harmoni Bandung Timur" class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out" 
                    src="https://cdn.pixabay.com/photo/2023/04/09/17/24/cukul-7911922_1280.jpg"/>
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
            
            {{-- Kartu 5: Bandung Barat --}}
            <div class="bg-subtle-gray rounded-xl border border-transparent overflow-hidden flex flex-col transition-all duration-300 ease-in-out hover:shadow-2xl hover:border-orange-200 group">
                {{-- EFEK DITERAPKAN DI SINI --}}
                <div class="relative overflow-hidden">
                    <img alt="Paket Petualangan Bandung Barat" class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out" 
                    src="https://cdn.pixabay.com/photo/2023/04/09/17/24/cukul-7911922_1280.jpg"/>
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