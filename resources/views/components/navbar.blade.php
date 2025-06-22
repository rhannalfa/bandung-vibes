@php
$menuItemClasses = "nav-link px-1 py-1 text-sm font-semibold text-[#fffffffe] hover:underline";
$mobileMenuItemClasses = "inline-block px-4 py-2 text-sm font-semibold text-[#ffffff] hover:underline";
$mobileLoginClasses = "inline-block px-4 py-2 text-sm font-semibold text-[#ff9b2f] hover:text-[#ff9d1d]";
$desktopAuthLinkClasses = "nav-link text-sm font-semibold text-[#ffffff] hover:text-[#ffa03b]";
$dropdownItemClasses = "block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none"; // Updated for better contrast on dropdown
@endphp

@vite(['resources/css/app.css', 'resources/js/app.js'])

<nav
  id="navbar"
  class="fixed top-6 left-1/2 backdrop-blur-xl transform -translate-x-1/2 bg-white/20 rounded-full shadow-md w-[95%] max-w-6xl px-4 sm:px-8 py-3 z-50 transition-all duration-300 ease-in-out overflow-visible"
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
      <span id="brand-text" class="text-lg font-bold text-[#ffffff] transition-colors duration-300">BandungVibes</span>
    </div>

    {{-- Desktop Authentication Links & User Menu --}}
    <div class="hidden md:block ml-auto relative">
      @guest
        <a href="{{ route('login') }}" id="desktop-login-link" class="{{ $desktopAuthLinkClasses }}">Login</a>
      @else
        <button id="user-menu-button" type="button" class="{{ $desktopAuthLinkClasses }} flex items-center focus:outline-none">
          {{ Auth::user()->name }}
          <svg id="user-menu-arrow" class="ml-1.5 h-4 w-4 fill-current text-white transition-colors duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </button>

        {{-- Dropdown Menu --}}
        <div
          id="user-menu-dropdown"
          class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-1 z-50 ring-1 ring-black ring-opacity-5"
        >
          {{-- The dropdown items now have a dark text color for visibility --}}
          <form method="POST" action="{{ route('logout') }}" class="block">
            @csrf
            <button type="submit" class="{{ $dropdownItemClasses }} w-full">
              Logout
            </button>
          </form>
        </div>
      @endguest
    </div>

    {{-- Mobile Menu Button (Hamburger) --}}
    <div class="md:hidden ml-auto">
      <button id="mobile-menu-button" class="text-white focus:outline-none">
        <svg
          class="w-6 h-6 transition-colors duration-300"
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

  {{-- Mobile Menu Panel --}}
  <div
    id="mobile-menu"
    class="hidden md:hidden mt-2 overflow-x-auto whitespace-nowrap px-2"
    style="width: 100%;"
  >
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
        <button type="submit" class="{{ $mobileLoginClasses }}">
          Logout
        </button>
      </form>
    @endguest
  </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function () {
  // --- Element References ---
  const navbar = document.getElementById('navbar');
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  const userMenuButton = document.getElementById('user-menu-button');
  const userMenuDropdown = document.getElementById('user-menu-dropdown');

  // References for elements that change color on scroll
  const brandText = document.getElementById('brand-text');
  const navLinks = navbar.querySelectorAll('.nav-link');
  const userMenuArrow = document.getElementById('user-menu-arrow');
  const mobileMenuIcon = mobileMenuButton?.querySelector('svg');
  const mobileMenuItems = mobileMenu.querySelectorAll('a, button');

  const topBar = navbar.querySelector(':scope > div:first-child');
  let isMobileMenuOpen = false;
  const baseNavbarHeight = 56; // Base height in pixels

  // --- Scroll Behavior for Navbar Style Change ---
  const handleScroll = () => {
    // Threshold for scroll detection (e.g., 10px)
    const isScrolled = window.scrollY > 10;

    if (navbar) {
      // Toggle navbar background and shadow
      navbar.classList.toggle('bg-white/20', !isScrolled);
      navbar.classList.toggle('backdrop-blur-xl', !isScrolled);
      navbar.classList.toggle('bg-white', isScrolled);
      navbar.classList.toggle('shadow-lg', isScrolled);
    }
    
    // Toggle brand text color
    if (brandText) {
      brandText.classList.toggle('text-[#ffffff]', !isScrolled);
      brandText.classList.toggle('text-gray-900', isScrolled);
    }
    
    // Toggle desktop nav link colors
    navLinks.forEach(link => {
      link.classList.toggle('text-[#fffffffe]', !isScrolled);
      link.classList.toggle('text-[#ffffff]', !isScrolled);
      link.classList.toggle('hover:text-[#ffa03b]', !isScrolled);
      link.classList.toggle('text-gray-700', isScrolled);
      link.classList.toggle('hover:text-[#ff9b2f]', isScrolled);
    });
    
    // Toggle user menu arrow icon color
    if (userMenuArrow) {
      userMenuArrow.classList.toggle('text-white', !isScrolled);
      userMenuArrow.classList.toggle('text-gray-700', isScrolled);
    }
    
    // Toggle mobile hamburger icon color
    if (mobileMenuIcon) {
      mobileMenuButton.classList.toggle('text-white', !isScrolled);
      mobileMenuButton.classList.toggle('text-gray-800', isScrolled);
    }

    // Toggle mobile menu item colors (for when menu is open and user scrolls)
    mobileMenuItems.forEach(item => {
        // We only change the white text links, not the orange ones
        if (item.classList.contains('text-[#ffffff]')) {
            item.classList.toggle('text-[#ffffff]', !isScrolled);
            item.classList.toggle('text-gray-700', isScrolled);
        }
    });
  };

  // Attach scroll listener
  window.addEventListener('scroll', handleScroll);
  // Run once on load in case the page is already scrolled
  handleScroll();


  // --- Mobile Menu Toggle ---
  if (mobileMenuButton && mobileMenu && navbar && topBar) {
    const navbarComputedStyle = window.getComputedStyle(navbar);
    const navbarPaddingTop = parseInt(navbarComputedStyle.paddingTop, 10);
    const navbarPaddingBottom = parseInt(navbarComputedStyle.paddingBottom, 10);

    mobileMenuButton.addEventListener('click', () => {
      isMobileMenuOpen = !isMobileMenuOpen;
      mobileMenu.classList.toggle('hidden');

      if (isMobileMenuOpen) {
        // Calculate and set expanded height
        requestAnimationFrame(() => {
          const topBarHeight = topBar.offsetHeight; 
          const mobileMenuStyles = window.getComputedStyle(mobileMenu);
          const mobileMenuMarginTop = parseInt(mobileMenuStyles.marginTop, 10);
          const mobileMenuVisibleHeight = mobileMenu.scrollHeight;
          const contentHeight = topBarHeight + mobileMenuMarginTop + mobileMenuVisibleHeight;
          navbar.style.height = `${contentHeight + navbarPaddingTop + navbarPaddingBottom}px`;
        });
      } else {
        // Restore to base height
        navbar.style.height = `${baseNavbarHeight}px`;
      }
    });
  }

  // --- User Dropdown Menu Toggle ---
  if (userMenuButton && userMenuDropdown) {
    userMenuButton.addEventListener('click', function (event) {
      event.stopPropagation();
      userMenuDropdown.classList.toggle('hidden');
    });

    window.addEventListener('click', function (event) {
      if (!userMenuDropdown.classList.contains('hidden')) {
        if (!userMenuButton.contains(event.target) && !userMenuDropdown.contains(event.target)) {
          userMenuDropdown.classList.add('hidden');
        }
      }
    });
  }

  // --- Resize Handling ---
  window.addEventListener('resize', () => {
    // Hide mobile menu on switch to desktop view
    if (window.innerWidth >= 768 && isMobileMenuOpen && mobileMenu && navbar) {
      mobileMenu.classList.add('hidden');
      navbar.style.height = `${baseNavbarHeight}px`;
      isMobileMenuOpen = false;
    }
  });
});
</script>
