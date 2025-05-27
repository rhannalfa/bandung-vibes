import './bootstrap';
// import Alpine from 'alpinejs';
// import intersect from '@alpinejs/intersect';
import AOS from 'aos';
import 'aos/dist/aos.css';

window.addEventListener('load', () => {
  AOS.init({
    // Global settings for AOS (optional, customize as needed)
     duration: 500, // values from 0 to 3000, with step 50ms
     once: true,     // whether animation should happen only once - while scrolling down
    // offset: 50,     // offset (in px) from the original trigger point
     delay: 200,       // values from 0 to 3000, with step 50ms
     anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

  });
});


// Alpine.plugin(intersect);
// window.Alpine = Alpine;
// Alpine.start();
