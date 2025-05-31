@vite(['resources/css/app.css', 'resources/js/app.js'])

<nav
  id="navbar"
  class="absolute top-6 left-1/2 backdrop-blur-xl transform -translate-x-1/2 bg-white/20 rounded-full shadow-md w-[100%] max-w-6xl px-4 sm:px-8 py-3 z-20 transition-all duration-300 ease-in-out overflow-visible"
  style="height: 56px;"
>
  <div class="flex items-center justify-between md:justify-start relative w-full" data-aos="fade-in">
    <!-- Kiri: Menu Desktop -->
    <div class="hidden md:flex items-center space-x-6 text-sm font-semibold text-[#fffffffe]">
      <a href="#" class="hover:underline">Home</a>
      <a href="#" class="hover:underline">Wisata</a>
      <a href="#" class="hover:underline">Pesanan</a>
    </div>

    <!-- Logo Tengah -->
    <div class="absolute left-1/2 transform -translate-x-1/2 text-center">
      <span class="text-lg font-bold text-[#ffffff]">BandungVibes</span>
    </div>

    <!-- Kanan: Login (desktop) -->
    <div class="hidden md:block ml-auto">
      <a href="{{ route('login') }}" class="text-sm font-semibold text-[#ffffff] hover:text-[#ffa03b]">Login</a>
    </div>

    <!-- Kanan: Hamburger Menu (mobile) -->
    <div class="md:hidden ml-auto">
      <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
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

  <!-- Mobile Menu Horizontal di bawah logo -->
  <div
    id="mobile-menu"
    class="hidden md:hidden mt-2 overflow-x-auto whitespace-nowrap px-2"
    style="width: 100%;"
  >
    <a href="#" class="inline-block px-4 py-2 text-sm font-semibold text-[#ffffff] hover:underline">Home</a>
    <a href="#" class="inline-block px-4 py-2 text-sm font-semibold text-[#ffffff] hover:underline">Gallery</a>
    <a href="#" class="inline-block px-4 py-2 text-sm font-semibold text-[#ffffff] hover:underline">About</a>
    <a href="{{ route('login') }}" class="inline-block px-4 py-2 text-sm font-semibold text-[#ff9b2f] hover:text-[#ff9d1d]">Login</a>
  </div>
</nav>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');
    const navbar = document.getElementById('navbar');

    let isOpen = false;
    toggle.addEventListener('click', () => {
      isOpen = !isOpen;
      if (isOpen) {
        menu.classList.remove('hidden');
        // Navbar naik tinggi-nya untuk memberi ruang menu
        navbar.style.height = '100px';
      } else {
        menu.classList.add('hidden');
        navbar.style.height = '56px';
      }
    });
  });
</script>
