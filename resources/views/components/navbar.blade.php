@php
// Define a common class string for menu items to avoid repetition
$menuItemClasses = "hover:underline";
$mobileMenuItemClasses = "inline-block px-4 py-2 text-sm font-semibold text-[#ffffff] hover:underline";
$mobileLoginClasses = "inline-block px-4 py-2 text-sm font-semibold text-[#ff9b2f] hover:text-[#ff9d1d]";
$desktopAuthLinkClasses = "text-sm font-semibold text-[#ffffff] hover:text-[#ffa03b]";
$dropdownItemClasses = "block w-full text-left px-4 py-2 text-sm text-white hover:bg-[#ff9b2f]/70 focus:outline-none"; // Class baru untuk item dropdown
@endphp

@vite(['resources/css/app.css', 'resources/js/app.js'])

<nav
  id="navbar"
  class="absolute top-6 left-1/2 backdrop-blur-xl transform -translate-x-1/2 bg-white/20 rounded-full shadow-md w-[100%] max-w-6xl px-4 sm:px-8 py-3 z-20 transition-all duration-300 ease-in-out overflow-visible"
  style="height: 56px;"
>
 <div class="flex items-center justify-between md:justify-start relative w-full" data-aos="fade-in">
  <div class="hidden md:flex items-center space-x-6 text-sm font-semibold text-[#fffffffe]">
   <a href="#" class="{{ $menuItemClasses }}">Home</a>
   <a href="#" class="{{ $menuItemClasses }}">Wisata</a>
   <a href="#" class="{{ $menuItemClasses }}">Pesanan</a>
   {{-- Add other links here as needed --}}
   @auth
    {{-- Example: Show a dashboard link only to authenticated users --}}
    {{-- <a href="{{ route('dashboard') }}" class="{{ $menuItemClasses }}">Dashboard</a> --}}
   @endauth
  </div>

  <div class="absolute left-1/2 transform -translate-x-1/2 text-center">
   <span class="text-lg font-bold text-[#ffffff]">BandungVibes</span>
  </div>

    {{-- Desktop Auth Links / User Menu --}}
  <div class="hidden md:block ml-auto relative"> {{-- Tambahkan 'relative' untuk positioning dropdown --}}
   @guest
    <a href="{{ route('login') }}" class="{{ $desktopAuthLinkClasses }}">Login</a>
   @else
        {{-- Tombol Nickname untuk Dropdown --}}
    <button id="user-menu-button" type="button" class="{{ $desktopAuthLinkClasses }} flex items-center focus:outline-none">
          {{-- Ganti Auth::user()->name dengan field nickname yang sesuai jika berbeda --}}
     {{ Auth::user()->name }} 
          {{-- Icon dropdown (opsional) --}}
          <svg class="ml-1.5 h-4 w-4 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
    </button>

        {{-- Dropdown Menu --}}
        <div
          id="user-menu-dropdown"
          class="hidden absolute right-0 mt-2 w-48 bg-white/30 backdrop-blur-md rounded-md shadow-lg py-1 z-50 ring-1 ring-black ring-opacity-5"
        >
          {{-- Bisa tambahkan link lain di sini, misal ke profil --}}
          {{-- <a href="#" class="{{ $dropdownItemClasses }}">Profil Saya</a> --}}
          <form method="POST" action="{{ route('logout') }}" class="block">
            @csrf
            <button type="submit" class="{{ $dropdownItemClasses }} w-full">
              Logout
            </button>
          </form>
        </div>
   @endguest
  </div>

  <div class="md:hidden ml-auto">
   <button id="mobile-menu-button" class="text-white focus:outline-none">
    <svg
     class="w-6 h-6"
     fill="none"
     stroke="currentColor"
     stroke-width="2"
     viewBox="0 0 24 24"
     xmlns="http://www.w3.org/2000/svg"
    >
     <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
   </button>
  </div>
 </div>

 <div
  id="mobile-menu"
  class="hidden md:hidden mt-2 overflow-x-auto whitespace-nowrap px-2"
  style="width: 100%;"
 >
  <a href="#" class="{{ $mobileMenuItemClasses }}">Home</a>
  <a href="#" class="{{ $mobileMenuItemClasses }}">Wisata</a>
  <a href="#" class="{{ $mobileMenuItemClasses }}">Pesanan</a>
  @auth
  @endguest

  @guest
   <a href="{{ route('login') }}" class="{{ $mobileLoginClasses }}">Login</a>
  @else
   <form method="POST" action="{{ route('logout') }}" class="inline-block">
    @csrf
    <button type="submit" class="{{ $mobileLoginClasses }}">
     Logout
    </button>
   </form>
  @endguest
 </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  const navbar = document.getElementById('navbar');
  
  // Dapatkan elemen div pertama di dalam navbar, ini adalah bar atas Anda
  const topBar = navbar.querySelector(':scope > div:first-child'); 

  let isMobileMenuOpen = false;
  // Ambil baseNavbarHeight dari style inline jika ada, atau default ke 56px
  const baseNavbarHeight = parseInt(navbar.style.height, 10) || 56; 

  if (mobileMenuButton && mobileMenu && navbar && topBar) {
    // Hitung padding vertikal navbar sekali saja untuk efisiensi
    const navbarComputedStyle = window.getComputedStyle(navbar);
    const navbarPaddingTop = parseInt(navbarComputedStyle.paddingTop, 10);
    const navbarPaddingBottom = parseInt(navbarComputedStyle.paddingBottom, 10);

    mobileMenuButton.addEventListener('click', () => {
      isMobileMenuOpen = !isMobileMenuOpen;
      if (isMobileMenuOpen) {
        mobileMenu.classList.remove('hidden');
        
        // Gunakan requestAnimationFrame untuk memastikan menu sudah di-render 
        // dan scrollHeight-nya akurat sebelum menghitung.
        requestAnimationFrame(() => {
          const topBarHeight = topBar.offsetHeight; // Tinggi bar atas (logo, link desktop, dll)
          
          const mobileMenuStyles = window.getComputedStyle(mobileMenu);
          const mobileMenuMarginTop = parseInt(mobileMenuStyles.marginTop, 10);
          
          // scrollHeight memberikan tinggi konten aktual dari menu mobile termasuk paddingnya
          const mobileMenuVisibleHeight = mobileMenu.scrollHeight;

          // Hitung total tinggi yang dibutuhkan untuk konten di dalam area padding navbar
          const contentHeight = topBarHeight + mobileMenuMarginTop + mobileMenuVisibleHeight;
          
          // Atur tinggi total navbar, termasuk padding atas dan bawah navbar itu sendiri
          navbar.style.height = `${contentHeight + navbarPaddingTop + navbarPaddingBottom}px`;
        });
      } else {
        mobileMenu.classList.add('hidden');
        navbar.style.height = `${baseNavbarHeight}px`;
      }
    });
  }

  // Bagian untuk user menu dropdown (jika ada, biarkan seperti sebelumnya)
  const userMenuButton = document.getElementById('user-menu-button');
  const userMenuDropdown = document.getElementById('user-menu-dropdown');

  if (userMenuButton && userMenuDropdown) {
    userMenuButton.addEventListener('click', function (event) {
      event.stopPropagation();
      userMenuDropdown.classList.toggle('hidden');
    });

    window.addEventListener('click', function (event) {
      if (userMenuDropdown && !userMenuDropdown.classList.contains('hidden')) {
        if (!userMenuButton.contains(event.target) && !userMenuDropdown.contains(event.target)) {
          userMenuDropdown.classList.add('hidden');
        }
      }
    });
  }

  // Opsional: Tutup menu mobile jika window di-resize ke lebar desktop
  window.addEventListener('resize', () => {
    if (window.innerWidth >= 768 && isMobileMenuOpen && mobileMenu && navbar) { // 768px adalah breakpoint 'md' Tailwind
      mobileMenu.classList.add('hidden');
      navbar.style.height = `${baseNavbarHeight}px`;
      isMobileMenuOpen = false;
    }
  });
});</script>