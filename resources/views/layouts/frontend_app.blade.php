<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Bandung Vibes')</title>
    {{-- Vite directive handles CSS and JS assets, including Tailwind CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff; /* General background color */
            color: #343a40; /* Default text color */
        }
    </style>
</head>
<body>

    {{-- PHP variables for navbar classes. Text is now always white/light. --}}
    @php
    $menuItemClasses = "nav-link px-1 py-1 text-sm font-semibold text-white hover:text-[#ff9b2f] transition-colors duration-300";
    $mobileMenuItemClasses = "inline-block px-4 py-2 text-sm font-semibold text-white hover:underline";
    $mobileLoginClasses = "inline-block px-4 py-2 text-sm font-semibold text-[#ff9b2f] hover:text-[#ff9d1d]";
    $desktopAuthLinkClasses = "nav-link text-sm font-semibold text-white hover:text-[#ff9b2f] transition-colors duration-300";
    $dropdownItemClasses = "block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none";
    @endphp

    {{-- START: Dynamic Floating Navbar --}}
    <nav
      id="navbar"
      class="fixed top-6 left-1/2 backdrop-blur-xl transform -translate-x-1/2 bg-gray-900/40 rounded-full shadow-md w-[95%] max-w-6xl px-4 sm:px-8 py-3 z-50 transition-all duration-300 ease-in-out overflow-visible"
      style="height: 56px;"
    >
      <div class="flex items-center justify-between md:justify-start relative w-full" data-aos="fade-out">
        {{-- Desktop Menu Links --}}
        <div class="hidden md:flex items-center space-x-6">
          <a href="{{ route('home') }}" class="{{ $menuItemClasses }}">Home</a>
          <a href="{{ route('wisata.index') }}" class="{{ $menuItemClasses }}">Wisata</a>
          @auth
            <a href="{{ route('pesanan.history') }}" class="{{ $menuItemClasses }}">Pesanan</a>
          @endauth
        </div>

        {{-- Centered Brand Name --}}
        <div class="absolute left-1/2 transform -translate-x-1/2 text-center">
          <span id="brand-text" class="text-lg font-bold text-white transition-colors duration-300">BandungVibes</span>
        </div>

        {{-- Desktop Authentication Links & User Menu --}}
        <div class="hidden md:block ml-auto relative">
          @guest
            <a href="{{ route('login') }}" class="{{ $desktopAuthLinkClasses }}">Login</a>
          @else
            <button id="user-menu-button" type="button" class="{{ $desktopAuthLinkClasses }} flex items-center focus:outline-none">
              {{ Auth::user()->name }}
              <svg class="ml-1.5 h-4 w-4 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>

            {{-- Dropdown Menu for User --}}
            <div
              id="user-menu-dropdown"
              class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-1 z-50 ring-1 ring-black ring-opacity-5"
            >
              <form method="POST" action="{{ route('logout') }}" class="block">
                @csrf
                <button type="submit" class="{{ $dropdownItemClasses }} w-full">Logout</button>
              </form>
            </div>
          @endguest
        </div>

        {{-- Mobile Menu Button (Hamburger) --}}
        <div class="md:hidden ml-auto">
          <button id="mobile-menu-button" class="text-gray focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>

      {{-- Mobile Menu Panel --}}
      {{-- FIXED: Added correct routes to mobile menu links --}}
      <div id="mobile-menu" class="hidden md:hidden mt-2 overflow-x-auto whitespace-nowrap px-2" style="width: 100%;">
        <a href="{{ route('home') }}" class="{{ $mobileMenuItemClasses }}">Home</a>
        <a href="{{ route('wisata.index') }}" class="{{ $mobileMenuItemClasses }}">Wisata</a>
        @auth
          <a href="{{ route('pesanan.history') }}" class="{{ $mobileMenuItemClasses }}">Pesanan</a>
        @endauth
        @guest
          <a href="{{ route('login') }}" class="{{ $mobileLoginClasses }}">Login</a>
        @else
          <form method="POST" action="{{ route('logout') }}" class="inline-block">
            @csrf
            <button type="submit" class="{{ $mobileLoginClasses }}">Logout</button>
          </form>
        @endguest
      </div>
    </nav>
    {{-- END: Dynamic Floating Navbar --}}


    {{-- Main Content Section --}}
    {{-- Added 'pt-28' to create space below the fixed navbar --}}
    <main class="pt-28">
        @yield('content')
    </main>

    <x-footer />


    {{-- JavaScript for Navbar Interactivity --}}
    <script>
    document.addEventListener('DOMContentLoaded', function () {
      // --- Element References ---
      const navbar = document.getElementById('navbar');
      const mobileMenuButton = document.getElementById('mobile-menu-button');
      const mobileMenu = document.getElementById('mobile-menu');
      const userMenuButton = document.getElementById('user-menu-button');
      const userMenuDropdown = document.getElementById('user-menu-dropdown');
      const topBar = navbar.querySelector(':scope > div:first-child');

      // --- State Variables ---
      let isMobileMenuOpen = false;
      const baseNavbarHeight = 56;

      // --- Scroll Behavior for Navbar Style Change ---
      const handleScroll = () => {
        const isScrolled = window.scrollY > 10;
        if (!navbar) return;

        // Toggle classes for the navbar background effect
        navbar.classList.toggle('bg-gray-800/20', !isScrolled); // Transparent dark gray at top
        navbar.classList.toggle('backdrop-blur-xl', !isScrolled);
        navbar.classList.toggle('bg-gray-800', isScrolled); // Solid dark gray on scroll
        navbar.classList.toggle('shadow-lg', isScrolled);
      };

      // Attach scroll listener and run once on load
      window.addEventListener('scroll', handleScroll);
      handleScroll();

      // --- Mobile Menu Toggle ---
      if (mobileMenuButton && mobileMenu && topBar) {
        mobileMenuButton.addEventListener('click', () => {
          isMobileMenuOpen = !isMobileMenuOpen;
          mobileMenu.classList.toggle('hidden');

          if (isMobileMenuOpen) {
            requestAnimationFrame(() => {
              const navbarPaddingTop = parseInt(window.getComputedStyle(navbar).paddingTop, 10);
              const navbarPaddingBottom = parseInt(window.getComputedStyle(navbar).paddingBottom, 10);
              const topBarHeight = topBar.offsetHeight;
              const mobileMenuMarginTop = parseInt(window.getComputedStyle(mobileMenu).marginTop, 10);
              const mobileMenuHeight = mobileMenu.scrollHeight;
              const totalHeight = topBarHeight + mobileMenuMarginTop + mobileMenuHeight + navbarPaddingTop + navbarPaddingBottom;
              navbar.style.height = `${totalHeight}px`;
            });
          } else {
            navbar.style.height = `${baseNavbarHeight}px`;
          }
        });
      }

      // --- User Dropdown Menu Toggle ---
      if (userMenuButton && userMenuDropdown) {
        userMenuButton.addEventListener('click', (event) => {
          event.stopPropagation();
          userMenuDropdown.classList.toggle('hidden');
        });
        window.addEventListener('click', (event) => {
          if (!userMenuDropdown.classList.contains('hidden') && !userMenuButton.contains(event.target)) {
            userMenuDropdown.classList.add('hidden');
          }
        });
      }

      // --- Resize Handling ---
      window.addEventListener('resize', () => {
        if (window.innerWidth >= 768 && isMobileMenuOpen) {
          mobileMenu.classList.add('hidden');
          navbar.style.height = `${baseNavbarHeight}px`;
          isMobileMenuOpen = false;
        }
      });
    });
    </script>
    @stack('scripts')
</body>
</html>
