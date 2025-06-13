<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Bandung Vibes')</title> {{-- Judul halaman dinamis --}}

    {{-- Memuat aset CSS dan JS menggunakan Vite (Tailwind CSS, JS custom) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Memuat Font Awesome dari CDN untuk ikon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- Memuat font Inter dari Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* Menggunakan font Inter sebagai font utama */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa; /* Warna latar belakang umum */
            color: #343a40; /* Warna teks default */
        }
        /* Anda bisa menambahkan definisi warna kustom Tailwind jika belum ada di tailwind.config.js */
        /* Contoh: */
        /* .text-brand-orange { color: #fd7e14; } */
        /* .bg-brand-blue-dark { background-color: #1e2f5a; } */
    </style>
</head>
<body>

    {{-- Header atau Navbar untuk Frontend (Anda bisa tambahkan komponen navbar di sini) --}}
    <header class="bg-white shadow-sm py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800">Bandung Vibes</a>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900">Beranda</a></li>
                    <li><a href="{{ route('home') }}#paket-wisata" class="text-gray-600 hover:text-gray-900">Paket Wisata</a></li>
                    @auth
                        <li><a href="{{ route('pesanan.history') }}" class="text-gray-600 hover:text-gray-900">Riwayat Pesanan</a></li> {{-- <-- TAMBAHKAN BARIS INI --}}
                        <li><a href="{{ route('profile.edit') }}" class="text-gray-600 hover:text-gray-900">Profil</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-gray-600 hover:text-gray-900">Logout</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Login</a></li>
                        <li><a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900">Register</a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>

    {{-- Bagian Konten Utama Halaman (akan diisi oleh view pesanan) --}}
    <main class="py-8">
        @yield('content')
    </main>

    {{-- Footer untuk Frontend (Anda bisa tambahkan komponen footer di sini) --}}
    <footer class="bg-gray-800 text-white py-6 text-center text-sm mt-8">
        <p>&copy; {{ date('Y') }} Bandung Vibes. Semua Hak Dilindungi.</p>
    </footer>

</body>
</html>
