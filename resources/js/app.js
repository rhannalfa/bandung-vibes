import './bootstrap';

// import Alpine from 'alpinejs';
// import intersect from '@alpinejs/intersect';
import AOS from 'aos';
import 'aos/dist/aos.css';

window.addEventListener('load', () => {
  AOS.init({
    duration: 800,          // durasi animasi AOS
    once: true,             // animasi hanya sekali saat scroll ke bawah
    delay: 200,             // delay animasi
    anchorPlacement: 'top-bottom', // posisi trigger animasi
  });
});

// Jika ingin mengaktifkan intersect plugin:
// import intersect from '@alpinejs/intersect';
// Alpine.plugin(intersect);

import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

