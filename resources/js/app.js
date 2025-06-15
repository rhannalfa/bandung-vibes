import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();
window.addEventListener('load', () => {
  AOS.init({
    duration: 1000,          // durasi animasi AOS
    once: true,             // animasi hanya sekali saat scroll ke bawah
    delay: 100,             // delay animasi
    anchorPlacement: 'top-bottom', // posisi trigger animasi
  });
});