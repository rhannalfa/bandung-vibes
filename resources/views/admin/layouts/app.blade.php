<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Bandung Vibes</title>
    {{-- Vite untuk CSS dan JS Anda (dari Tailwind CSS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen">
        <aside class="w-64 bg-gray-800 text-white p-4 space-y-4">
            <h1 class="text-2xl font-bold mb-6">Bandung Vibes Admin</h1>
            <nav>
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('admin.dashboard') }}" class="block p-2 rounded hover:bg-gray-700 @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">Dashboard</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.paket-wisata.index') }}" class="block p-2 rounded hover:bg-gray-700 @if(request()->routeIs('admin.paket-wisata.*')) bg-gray-700 @endif">Kelola Paket Wisata</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.transaksi.index') }}" class="block p-2 rounded hover:bg-gray-700 @if(request()->routeIs('admin.transaksi.*')) bg-gray-700 @endif">Riwayat Transaksi</a>
                    </li>
                    <li class="mb-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left p-2 rounded hover:bg-gray-700">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold">@yield('title', 'Dashboard')</h2>
                <div>
                    Selamat datang, {{ Auth::user()->name }}
                </div>
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>