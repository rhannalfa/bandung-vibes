@vite(['resources/css/app.css', 'resources/js/app.js'])

<footer class="bg-brand-blue-dark text-gray-300 py-12 sm:py-16" data-aos="fade-in">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h4 class="font-semibold text-white text-lg mb-3">Bandung Vibes</h4>
                    <p class="text-sm leading-relaxed">Solusi perjalanan wisata Anda untuk pengalaman tak terlupakan di Bandung dan sekitarnya. Jelajahi keindahan alam, kuliner lezat, dan budaya Sunda yang kaya.</p>
                </div>
                <div>
                    <h5 class="font-semibold text-white text-base mb-3">Link Cepat</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-brand-orange transition-colors">Beranda</a></li>
                        <li><a href="#" class="hover:text-brand-orange transition-colors">Paket Wisata Bandung</a></li>
                        <li><a href="#" class="hover:text-brand-orange transition-colors">Destinasi Bandung</a></li>
                        <li><a href="#" class="hover:text-brand-orange transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-brand-orange transition-colors">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold text-white text-base mb-3">Hubungi Kami</h5>
                    <ul class="space-y-2 text-sm">
                        <li><i class="fas fa-map-marker-alt fa-fw mr-2"></i> UIN Bandung, Jawa Barat</li>
                        <li><i class="fas fa-phone fa-fw mr-2"></i> (+62) 082</li>
                        <li><i class="fas fa-envelope fa-fw mr-2"></i> Vibes@Bandungvibes.com</li>
                    </ul>
                    <div class="mt-4 flex space-x-3">
                        <a href="#" class="text-gray-400 hover:text-brand-orange transition-colors"><i class="fab fa-facebook-f text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-brand-orange transition-colors"><i class="fab fa-instagram text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-brand-orange transition-colors"><i class="fab fa-tiktok text-xl"></i></a> </div>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-8 text-center text-sm">
                <p>&copy; <span id="currentYear"></span> Bandung Vibes. Semua Hak Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('currentYear').textContent = new Date().getFullYear();
    </script>

