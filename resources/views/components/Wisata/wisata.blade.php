@vite(['resources/css/app.css', 'resources/js/app.js'])
{{-- Anda bisa menambahkan link Font Awesome jika belum ada di layout utama --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
{{-- Tambahkan Google Fonts jika belum ada di layout utama --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    /* Definisi warna kustom jika Anda belum mendefinisikannya di tailwind.config.js */
    .text-dest-title { color: #212529; } /* Dark Gray */
    .text-text-muted { color: #6c757d; } /* Muted Gray */
    .bg-dest-button { background-color: #fd7e14; } /* Orange */
    .hover\:bg-dest-button-hover:hover { background-color: #e66a00; } /* Darker Orange */
    .bg-subtle-gray { background-color: #f1f3f5; } /* Light Gray */
    .border-orange-200 { border-color: #ffc299; } /* Light Orange */
    body { font-family: 'Inter', sans-serif; }
</style>

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
            @forelse ($paketUtama as $paket)
            <div class="paket-card relative bg-white rounded-xl border border-transparent overflow-hidden flex flex-col transition-all duration-300 ease-in-out hover:shadow-2xl hover:border-orange-200 group">
                <div class="relative overflow-hidden">
                    @php
                        // Fungsi helper untuk menentukan URL gambar
                        // Jika path gambar dimulai dengan 'assets/images/', gunakan asset()
                        // Jika tidak (berarti dari Storage, seperti 'paket-wisata/gambar.jpg'), gunakan Storage::url()
                        $getImageUrl = function($path) {
                            if (Str::startsWith($path, 'assets/images/')) {
                                return asset($path);
                            }
                            return Storage::url($path);
                        };
                    @endphp

                    {{-- Tampilkan gambar utama jika ada --}}
                    @if ($paket->gambar_utama)
                        <img alt="{{ $paket->nama_paket }}" class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out" src="{{ $getImageUrl($paket->gambar_utama) }}"/>
                    @else
                        {{-- Jika tidak ada gambar utama, ambil gambar dari resources/assets/images sebagai fallback --}}
                        @php
                            $fallbackImages = [
                                'assets/images/paket-wi/lainnya/ciwidey_1.jpg',
                                'assets/images/paket-wi/lainnya/ciwidey_2.jpg',
                                'assets/images/paket-wi/lainnya/kota_1.jpeg',
                                'assets/images/paket-wi/lainnya/ciater-sari-ater.jpeg',
                                'assets/images/paket-wi/lainnya/ciwidey-kawah-putih.jpeg',
                                'assets/images/paket-wi/lainnya/sejarah-kuliner-kota.jpeg',
                            ];
                            $displayFallbackImage = !empty($fallbackImages) ? $fallbackImages[0] : null;
                        @endphp

                        @if ($displayFallbackImage)
                            <img alt="{{ $paket->nama_paket ?? 'Gambar Default' }}" class="w-full h-72 object-cover rounded-lg" src="{{ asset($displayFallbackImage) }}"/>
                        @else
                            {{-- Fallback jika tidak ada gambar sama sekali (bahkan fallback hardcoded) --}}
                            <img alt="Tidak Ada Gambar" class="w-full h-72 object-cover rounded-lg" src="https://via.placeholder.com/600x400?text=Gambar+Tidak+Tersedia"/>
                        @endif
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute top-4 right-4 bg-black/50 text-white text-xs font-semibold px-3 py-1.5 rounded-full backdrop-blur-sm flex items-center gap-2">
                        <i class="far fa-clock"></i>
                        <span>{{ $paket->durasi ?? 'Fullday Tour' }}</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-dest-title font-bold text-xl md:text-2xl group-hover:text-dest-button transition-colors">
                            {{ $paket->nama_paket }}
                        </h3>
                        <div class="text-right flex-shrink-0 ml-4">
                            <p class="text-xs text-text-muted">Mulai dari</p>
                            <p class="font-extrabold text-xl text-dest-title">
                                Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                    <p class="text-sm text-text-muted leading-relaxed mb-4">
                        {{ Str::limit($paket->deskripsi_paket, 100) }}
                    </p>
                    <div class="text-sm text-dest-title space-y-2 mb-6 flex-grow">
                        @php
                            $destinasiArray = [];
                            if (!empty($paket->destinasi) && is_string($paket->destinasi)) {
                                $destinasiArray = array_filter(explode(',', $paket->destinasi));
                            }
                        @endphp
                        @if (count($destinasiArray) > 0)
                            @foreach(array_slice($destinasiArray, 0, 3) as $dest) {{-- Tampilkan 3 destinasi pertama --}}
                                <p class="flex items-center"><i class="fas fa-check-circle text-dest-button mr-2.5"></i>{{ trim($dest) }}</p>
                            @endforeach
                        @endif
                    </div>
                    <a href="{{ route('detail-paket', $paket->slug) }}" class="mt-auto w-full bg-dest-button text-white font-semibold px-6 py-3 rounded-lg flex items-center justify-center gap-2 hover:bg-dest-button-hover transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                        Lihat Detail <i class="fas fa-arrow-right text-xs ml-1"></i>
                    </a>
                </div>
            </div>
            @empty
                <p class="col-span-full text-center text-gray-500">Belum ada paket wi utama yang tersedia.</p>
            @endforelse
        </div>

        {{-- Tiga kartu kecil --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10" data-aos="fade-in">
            @forelse ($paketLainnya as $paket)
            <div class="bg-subtle-gray rounded-xl border border-transparent overflow-hidden flex flex-col transition-all duration-300 ease-in-out hover:shadow-2xl hover:border-orange-200 group">
                <div class="relative overflow-hidden">
                    @php
                        $getImageUrl = function($path) {
                            if (Str::startsWith($path, 'assets/images/')) {
                                return asset($path);
                            }
                            return Storage::url($path);
                        };
                    @endphp
                    @if ($paket->gambar_utama)
                        <img alt="{{ $paket->nama_paket }}" class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out" src="{{ $getImageUrl($paket->gambar_utama) }}"/>
                    @else
                        {{-- Jika tidak ada gambar utama, gunakan gambar dari resources/assets/images sebagai fallback --}}
                        @php
                            $fallbackImages = [
                                'assets/images/paket-wisata/lainnya/ciwidey_1.jpg',
                                'assets/images/paket-wisata/lainnya/ciwidey_2.jpg',
                                'assets/images/paket-wisata/lainnya/kota_1.jpeg',
                                'assets/images/paket-wisata/ciater-sari-ater.jpeg',
                                'assets/images/paket-wisata/lainnya/ciwidey-kawah-putih.jpeg',
                                'assets/images/paket-wisata/lainnya/sejarah-kuliner-kota.jpeg',
                            ];
                            $displayFallbackImage = !empty($fallbackImages) ? $fallbackImages[0] : null;
                        @endphp
                        @if ($displayFallbackImage)
                            <img alt="{{ $paket->nama_paket ?? 'Gambar Default' }}" class="w-full h-60 object-cover rounded-lg" src="{{ asset($displayFallbackImage) }}"/>
                        @else
                            {{-- Fallback jika tidak ada gambar sama sekali (bahkan fallback hardcoded) --}}
                            <img alt="Tidak Ada Gambar" class="w-full h-60 object-cover rounded-lg" src="https://via.placeholder.com/400x300?text=Gambar+Tidak+Tersedia"/>
                        @endif
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute top-4 right-4 bg-black/50 text-white text-xs font-semibold px-3 py-1.5 rounded-full backdrop-blur-sm flex items-center gap-2">
                        <i class="far fa-clock"></i>
                        <span>{{ $paket->durasi ?? 'Fullday Tour' }}</span>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="text-dest-title font-bold text-lg lg:text-xl mb-2 group-hover:text-dest-button transition-colors">
                        {{ $paket->nama_paket }}
                    </h3>
                    <p class="text-xs sm:text-sm text-text-muted leading-relaxed mb-4">
                        {{ Str::limit($paket->deskripsi_paket, 70) }} {{-- Potong deskripsi lebih pendek untuk kartu kecil --}}
                    </p>
                    <div class="text-xs text-dest-title space-y-1.5 pt-2 border-t border-slate-200 flex-grow">
                        @php
                            $destinasiArray = [];
                            if (!empty($paket->destinasi) && is_string($paket->destinasi)) {
                                $destinasiArray = array_filter(explode(',', $paket->destinasi));
                            }
                        @endphp
                        @if (count($destinasiArray) > 0)
                            @foreach(array_slice($destinasiArray, 0, 3) as $dest) {{-- Tampilkan 3 destinasi pertama --}}
                                <p class="flex items-center"><i class="fas fa-check text-dest-button/70 mr-2.5"></i>{{ trim($dest) }}</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-200 flex justify-between items-center">
                        <div class="text-left">
                            <p class="text-xs text-text-muted">Mulai dari</p>
                            <p class="font-extrabold text-lg text-dest-title">Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}</p>
                        </div>
                        <a href="{{ route('detail-paket', $paket->slug) }}" class="bg-dest-button text-white font-semibold px-4 py-2 rounded-lg flex items-center justify-center gap-2 hover:bg-dest-button-hover transition-all duration-300 transform hover:scale-105">
                            Detail <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
                <p class="col-span-full text-center text-gray-500">Belum ada paket wisata lainnya yang tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
