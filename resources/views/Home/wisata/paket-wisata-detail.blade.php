<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Paket: {{ $paket->nama_paket }}</title>
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa; /* Warna latar belakang netral */
        }
        .sticky-sidebar {
            position: -webkit-sticky; /* Untuk kompatibilitas Safari */
            position: sticky;
            top: 2rem; /* Jarak dari atas viewport saat sticky */
        }
        .text-dest-title { color: #212529; } /* Dark Gray */
        .text-text-muted { color: #6c757d; } /* Muted Gray */
        .bg-dest-button { background-color: #fd7e14; } /* Orange */
        .hover\:bg-dest-button-hover:hover { background-color: #e66a00; } /* Darker Orange */
        .bg-subtle-gray { background-color: #f1f3f5; } /* Light Gray */
        .border-orange-200 { border-color: #ffc299; } /* Light Orange */

        .rating-stars {
            display: inline-flex;
            direction: rtl; /* To make stars fill from right to left */
        }
        .rating-stars input {
            display: none; /* Hide default radio buttons */
        }
        .rating-stars label {
            font-size: 2rem; /* Size of the stars */
            color: #ccc; /* Default star color */
            cursor: pointer;
            padding: 0 0.1rem;
            transition: color 0.2s;
        }
        .rating-stars input:checked ~ label {
            color: #ffc107; /* Filled star color */
        }
        .rating-stars label:hover,
        .rating-stars label:hover ~ label {
            color: #ffc107; /* Hover star color */
        }
    </style>
</head>
<body>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="mb-8">
        <nav class="text-sm font-medium text-slate-500 mb-2" data-aos="fade-right">
            <a href="{{ route('home') }}" class="hover:text-orange-500 transition-colors">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ route('wisata.index') }}" class="hover:text-orange-500 transition-colors">Paket Wisata</a>
            <span class="mx-2">/</span>
            <span class="text-slate-800">Detail Paket</span>
        </nav>
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <h1 class="text-3xl lg:text-4xl font-extrabold text-slate-800 tracking-tight" data-aos="fade-right">
                {{ $paket->nama_paket }} {{-- Nama paket wisata dinamis --}}
            </h1>
            <div class="flex items-center gap-2 mt-2 md:mt-0 bg-slate-100 text-slate-700 text-sm font-semibold px-4 py-2 rounded-lg shadow-sm" data-aos="fade-left">
                <i class="far fa-clock"></i>
                <span>{{ $paket->durasi ?? 'Durasi Tidak Tersedia' }}</span> {{-- Durasi paket dinamis --}}
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
        <div class="lg:col-span-2">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8" data-aos="fade-in">
                @php
                    $getImageUrl = function($path) {
                        if (\Illuminate\Support\Str::startsWith($path, 'assets/images/')) {
                            return asset($path);
                        }
                        return Storage::url(ltrim($path, '/'));
                    };

                    $gambarLainnyaArray = [];
                    if (!empty($paket->gambar_lainnya)) {
                        if (is_array($paket->gambar_lainnya)) {
                            $gambarLainnyaArray = $paket->gambar_lainnya;
                        } elseif (is_string($paket->gambar_lainnya)) {
                            $decoded = json_decode($paket->gambar_lainnya, true);
                            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                $gambarLainnyaArray = $decoded;
                            } else {
                                $gambarLainnyaArray = array_filter(explode(',', $paket->gambar_lainnya));
                            }
                        }
                    }
                @endphp

                <div class="col-span-1 sm:col-span-2 rounded-2xl overflow-hidden shadow-lg group">
                    @if ($paket->gambar_utama)
                        <img alt="{{ $paket->nama_paket }}" class="object-cover w-full h-96 group-hover:scale-105 transition-transform duration-500 ease-in-out" src="{{ $getImageUrl($paket->gambar_utama) }}" />
                    @else
                        <img alt="Tidak Ada Gambar Utama" class="object-cover w-full h-96 bg-gray-200 flex items-center justify-center text-gray-500" src="https://via.placeholder.com/900x600?text=Gambar+Utama+Tidak+Tersedia" />
                    @endif
                </div>

                @if (count($gambarLainnyaArray) > 0)
                    @foreach ($gambarLainnyaArray as $gambar_path)
                        <div class="rounded-2xl overflow-hidden shadow-lg group">
                            <img alt="Galeri {{ $paket->nama_paket }}" class="object-cover w-full h-56 group-hover:scale-105 transition-transform duration-500 ease-in-out" src="{{ $getImageUrl($gambar_path) }}" />
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm mb-8" data-aos="fade-out">
                <h2 class="text-2xl font-bold text-slate-800 mb-4">Tentang Paket Ini</h2>
                <p class="text-slate-600 leading-relaxed mb-6 text-justify">{{ $paket->deskripsi_paket }}</p> {{-- Deskripsi paket dinamis --}}

                <h3 class="font-bold text-slate-800 text-lg mb-4 pt-4 border-t border-slate-200">Destinasi Utama</h3>
                <div class="space-y-3 text-slate-700">
                    @foreach(array_filter(explode(',', $paket->destinasi)) as $destinasi)
                        <p class="flex items-center"><i class="fas fa-check-circle text-orange-500/80 mr-3"></i>{{ trim($destinasi) }}</p>
                    @endforeach
                </div>
            </div>

        </div>

        <div class="lg:col-span-1" data-aos="fade-out">
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
                        @php
                            $fasilitasArray = [];
                            if (!empty($paket->fasilitas)) {
                                if (is_array($paket->fasilitas)) {
                                    $fasilitasArray = $paket->fasilitas;
                                } elseif (is_string($paket->fasilitas)) {
                                    $decoded = json_decode($paket->fasilitas, true);
                                    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                        $fasilitasArray = $decoded;
                                    } else {
                                        $fasilitasArray = array_filter(explode("\n", $paket->fasilitas));
                                    }
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
                    <a href="{{ route('pesanan.create', $paket->id) }}" class="w-full h-full flex items-center justify-center">
                        Pesan Sekarang
                    </a>
                </button>
            </div>
        </div>
    </div>

{{-- Bagian Ulasan dan Rating yang Disempurnakan --}}
<div class="mt-12" data-aos="fade-out">
    <h2 class="text-3xl font-extrabold text-slate-800 mb-6 tracking-tight">Ulasan & Rating Pengguna</h2>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-2xl shadow-lg sticky top-4">
                <h3 class="text-xl font-bold text-slate-800 mb-4">Ringkasan Ulasan</h3>
                @php
                    $totalUlasan = $paket->ulasan->count();
                    $rataRataRating = $totalUlasan > 0 ? $paket->ulasan->avg('rating') : 0;
                    $ratingCounts = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];
                    if ($totalUlasan > 0) {
                        foreach ($paket->ulasan as $ulasan) {
                            $ratingCounts[$ulasan->rating]++;
                        }
                    }
                @endphp

                <div class="flex items-center gap-4 mb-6">
                    <div class="text-5xl font-extrabold text-slate-800">{{ number_format($rataRataRating, 1) }}</div>
                    <div>
                        <div class="text-yellow-400">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="{{ $i <= round($rataRataRating) ? 'fas' : 'far' }} fa-star"></i>
                            @endfor
                        </div>
                        <p class="text-slate-500 text-sm">berdasarkan {{ $totalUlasan }} ulasan</p>
                    </div>
                </div>

                {{-- Distribusi Rating --}}
                <div class="space-y-2">
                    @foreach (range(5, 1) as $star)
                        <div class="flex items-center gap-2 text-sm">
                            <span class="w-8 text-slate-600">{{ $star }} <i class="fas fa-star text-yellow-400"></i></span>
                            <div class="w-full bg-slate-200 rounded-full h-2.5">
                                <div class="bg-gradient-to-r from-yellow-400 to-orange-400 h-2.5 rounded-full" style="width: {{ $totalUlasan > 0 ? ($ratingCounts[$star] / $totalUlasan) * 100 : 0 }}%"></div>
                            </div>
                            <span class="w-8 text-right font-medium text-slate-500">{{ $ratingCounts[$star] }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8 pt-6 border-t border-slate-200">
                    @auth
                        @php
                            $hasReviewed = $paket->ulasan->where('user_id', Auth::id())->count() > 0;
                        @endphp

                        @if (!$hasReviewed)
                            <h3 class="text-lg font-semibold text-slate-700 mb-3">Bagaimana pengalaman Anda?</h3>
                            <p class="text-sm text-slate-500 mb-4">Bagikan ulasan Anda untuk membantu pengguna lain.</p>
                            <button onclick="document.getElementById('formUlasan').scrollIntoView({ behavior: 'smooth' });" class="w-full bg-orange-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-orange-600 transition-all duration-300 transform hover:scale-105">
                                Tulis Ulasan
                            </button>
                        @else
                            <div class="p-3 bg-blue-50 border border-blue-200 text-blue-800 rounded-lg text-center">
                                <p class="text-sm font-medium">Terima kasih, Anda sudah mengulas paket ini.</p>
                            </div>
                        @endif
                    @else
                        <div class="p-3 bg-yellow-50 border border-yellow-200 text-yellow-800 rounded-lg text-center">
                            <p class="text-sm"><a href="{{ route('login') }}" class="font-bold underline">Login</a> untuk memberi ulasan.</p>
                        </div>
                    @endauth
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Daftar Ulasan dan Form --}}
        <div class="lg:col-span-2">
            @auth
                @if (!$hasReviewed)
                    <div id="formUlasan" class="bg-white p-6 rounded-2xl shadow-lg mb-8">
                        <h3 class="text-2xl font-bold text-slate-800 mb-4">Tulis Ulasan Anda</h3>
                        {{-- Notifikasi --}}
                        @if (session('success'))
                            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg" role="alert"><p>{{ session('success') }}</p></div>
                        @endif
                        @if (session('error'))
                            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg" role="alert"><p>{{ session('error') }}</p></div>
                        @endif
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                               <ul class="list-disc list-inside">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                            </div>
                        @endif

                        <form action="{{ route('ulasan.store', $paket->id) }}" method="POST">
                            @csrf
                            <div class="mb-5">
                                <label class="block text-slate-700 text-sm font-bold mb-2">Rating Anda:</label>
                                <div class="rating-stars flex flex-row-reverse justify-end items-center">
                                    <input type="radio" id="star5" name="rating" value="5" class="hidden" {{ old('rating') == 5 ? 'checked' : '' }}/><label for="star5" class="cursor-pointer text-2xl text-slate-300 hover:text-yellow-400 transition-colors"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star4" name="rating" value="4" class="hidden" {{ old('rating') == 4 ? 'checked' : '' }}/><label for="star4" class="cursor-pointer text-2xl text-slate-300 hover:text-yellow-400 transition-colors"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star3" name="rating" value="3" class="hidden" {{ old('rating') == 3 ? 'checked' : '' }}/><label for="star3" class="cursor-pointer text-2xl text-slate-300 hover:text-yellow-400 transition-colors"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star2" name="rating" value="2" class="hidden" {{ old('rating') == 2 ? 'checked' : '' }}/><label for="star2" class="cursor-pointer text-2xl text-slate-300 hover:text-yellow-400 transition-colors"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star1" name="rating" value="1" class="hidden" {{ old('rating') == 1 ? 'checked' : '' }}/><label for="star1" class="cursor-pointer text-2xl text-slate-300 hover:text-yellow-400 transition-colors"><i class="fas fa-star"></i></label>
                                </div>
                                @error('rating') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div class="mb-5">
                                <label for="komentar" class="block text-slate-700 text-sm font-bold mb-2">Komentar:</label>
                                <textarea name="komentar" id="komentar" rows="5" class="shadow-sm appearance-none border border-slate-300 rounded-lg w-full py-3 px-4 text-slate-700 leading-tight focus:outline-none focus:ring-2 focus:ring-orange-400 @error('komentar') border-red-500 @enderror" placeholder="Ceritakan detail pengalaman Anda...">{{ old('komentar') }}</textarea>
                                @error('komentar') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                            </div>

                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 rounded-lg focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">Kirim Ulasan</button>
                        </form>
                    </div>
                @endif
            @endauth

               {{-- Daftar Ulasan yang Ada --}}
    <div class="bg-white p-6 rounded-2xl shadow-lg">
        <h3 class="text-2xl font-bold text-slate-800 mb-6">Semua Ulasan ({{ $totalUlasan }})</h3>
        <div class="space-y-8">
            @forelse ($paket->ulasan->sortByDesc('created_at') as $ulasan)
                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <img class="h-12 w-12 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ urlencode($ulasan->user->name ?? 'U') }}&background=random&color=fff" alt="{{ $ulasan->user->name ?? 'User' }}">
                    </div>
                    <div class="flex-grow min-w-0"> {{-- min-w-0 penting untuk flexbox --}}
                        <div class="flex items-center justify-between mb-1">
                            <div>
                                <p class="font-semibold text-slate-800">{{ $ulasan->user->name ?? 'Pengguna Tidak Dikenal' }}</p>
                                <p class="text-xs text-slate-500">{{ $ulasan->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="text-yellow-400 text-sm flex-shrink-0 ml-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="{{ $i <= $ulasan->rating ? 'fas' : 'far' }} fa-star"></i>
                                @endfor
                            </div>
                        </div>
                        {{-- PERBAIKAN DI SINI --}}
                        <p class="text-slate-600 leading-relaxed break-words">{{ $ulasan->komentar }}</p>
                    </div>
                </div>
            @empty
                <div class="text-center py-10">
                    <i class="fas fa-comment-slash fa-3x text-slate-300 mb-4"></i>
                    <p class="text-slate-500">Belum ada ulasan untuk paket ini.</p>
                    <p class="text-sm text-slate-400">Jadilah yang pertama memberikan ulasan!</p>
                </div>
            @endforelse
        </div>
    </div>

        </div>
    </div>
</div>
</main>
<x-footer />

</body>
</html>
