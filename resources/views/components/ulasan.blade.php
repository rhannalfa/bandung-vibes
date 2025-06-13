{{-- resources/views/components/ulasan.blade.php --}}

{{-- Bagian Ulasan Pelanggan Dinamis dengan Slider --}}
<section class="bg-gray-50 max-w-full py-12" data-aos="fade-in">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6">
            <span class="inline-block bg-yellow-400 text-black text-xs font-semibold tracking-widest rounded-full px-4 py-1.5 uppercase">ULASAN PELANGGAN</span>
        </div>
        <h2 class="text-center text-3xl sm:text-4xl font-light text-gray-800 max-w-4xl mx-auto mb-12">
            Apa Kata Mereka Tentang <strong class="font-extrabold text-black">Bandung Vibes</strong>
        </h2>
        <div class="relative px-12">
            <div id="testimonial-wrapper" class="overflow-hidden">
                <div id="testimonial-container" class="grid grid-flow-col auto-cols-[100%] lg:auto-cols-[calc(33.3333%-16px)] gap-6">
                    @forelse ($ulasanPelanggan as $ulasan)
                        <article class="bg-white border border-gray-200 rounded-xl shadow-lg p-6 flex flex-col testimonial-item transform hover:scale-105 transition-transform duration-300">
                            <header class="flex items-center justify-between mb-3">
                                <div class="flex items-center space-x-4">
                                    {{-- Foto Pengulas atau Avatar Inisial --}}
                                    {{-- Jika Anda memiliki kolom profile_photo_url di User model, gunakan itu --}}
                                    @if ($ulasan->user->profile_photo_url ?? false)
                                        <img alt="Foto {{ $ulasan->user->name ?? 'Pengguna' }}" class="w-12 h-12 rounded-full object-cover ring-2 ring-yellow-300" src="{{ $ulasan->user->profile_photo_url }}">
                                    @else
                                        {{-- Avatar inisial jika tidak ada foto profil --}}
                                        <div class="w-12 h-12 rounded-full bg-{{ ['red', 'green', 'blue', 'purple', 'yellow'][array_sum(str_split(ord($ulasan->user->name[0] ?? 'A')))%6] }}-600 flex items-center justify-center text-white font-bold text-xl ring-2 ring-yellow-300">
                                            {{ substr($ulasan->user->name ?? '?', 0, 1) }}
                                        </div>
                                    @endif
                                    <span class="text-base font-semibold text-gray-900">{{ $ulasan->user->name ?? 'Pengguna Dihapus' }}</span>
                                </div>
                            </header>
                            <div class="flex items-center mb-2 text-yellow-400">
                                {{-- Rating Bintang --}}
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $ulasan->rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed overflow-y-auto scrollbar-thin max-h-[100px] pr-2">
                                "{{ Str::limit($ulasan->komentar, 150) }}"
                            </p>
                            {{-- Informasi Tambahan (opsional) --}}
                            <p class="text-xs text-slate-400 mt-2">
                                diulas untuk {{ $ulasan->paketWisata->nama_paket ?? 'Paket Tidak Diketahui' }} pada {{ $ulasan->created_at->format('d M Y') }}
                            </p>
                        </article>
                    @empty
                        <div class="col-span-full text-center text-gray-500 p-8">
                            Belum ada ulasan pelanggan yang ditampilkan.
                        </div>
                    @endforelse
                </div>
            </div>
            {{-- Tombol Navigasi Slider --}}
            <button
                id="prev-btn"
                class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-white rounded-full p-2.5 shadow-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition-all duration-300 z-10"
                aria-label="Previous Testimonial"
            >
                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button
                id="next-btn"
                class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-white rounded-full p-2.5 shadow-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition-all duration-300 z-10"
                aria-label="Next Testimonial"
            >
                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("testimonial-container");
    const prevBtn = document.getElementById("prev-btn");
    const nextBtn = document.getElementById("next-btn");
    let items = document.querySelectorAll(".testimonial-item"); // Menggunakan let untuk items agar bisa diupdate

    if (!container || !prevBtn || !nextBtn || items.length === 0) {
        console.error("Elemen testimoni tidak ditemukan atau tidak ada item testimoni.");
        if(prevBtn) prevBtn.style.display = 'none';
        if(nextBtn) nextBtn.style.display = 'none';
        return;
    }

    let currentIndex = 0;
    let totalItems = items.length;
    let isDragging = false;
    let startPos = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let animationId; // Untuk requestAnimationFrame

    function getVisibleItems() {
        if (window.innerWidth >= 1024) return 10; // 3 item untuk layar lg (desktop)
        return 1; // 1 item untuk layar di bawahnya (tablet & mobile)
    }

    // Fungsi untuk mengatur posisi slider berdasarkan currentIndex
    function setPositionByIndex() {
        const visibleItems = getVisibleItems();
        if (!container.parentElement) return;

        const gap = parseInt(window.getComputedStyle(container).columnGap) || 24; // Mengambil nilai gap dari CSS
        const containerWidth = container.parentElement.offsetWidth;
        // Menghitung lebar item berdasarkan jumlah item yang terlihat dan gap
        const itemWidth = (containerWidth - gap * (visibleItems - 1)) / visibleItems;

        currentTranslate = -(itemWidth + gap) * currentIndex;
        setSliderTransform(currentTranslate); // Terapkan transform

        // Mengatur visibilitas tombol navigasi
        prevBtn.style.display = currentIndex > 0 ? "flex" : "none";
        nextBtn.style.display = currentIndex < totalItems - visibleItems ? "flex" : "none";
    }

    // Fungsi untuk menerapkan transform CSS ke slider
    function setSliderTransform(translate) {
        container.style.transform = `translateX(${translate}px)`;
    }

    // --- Event Handlers untuk Dragging (Mouse & Touch) ---
    function touchStart(event) {
        isDragging = true;
        // Dapatkan posisi X awal (untuk mouse atau sentuhan pertama)
        startPos = event.type.includes('mouse') ? event.clientX : event.touches[0].clientX;
        container.style.cursor = 'grabbing'; // Ubah kursor saat dragging
        animationId = requestAnimationFrame(animation); // Mulai loop animasi untuk drag
        prevTranslate = currentTranslate; // Simpan posisi translate saat ini sebelum drag
        // Hentikan default behavior seperti scroll saat menyentuh/menekan
        event.preventDefault();
    }

    function touchMove(event) {
        if (!isDragging) return;
        // Dapatkan posisi X saat ini
        const currentClientX = event.type.includes('mouse') ? event.clientX : event.touches[0].clientX;
        const deltaX = currentClientX - startPos; // Perubahan posisi X
        currentTranslate = prevTranslate + deltaX; // Hitung posisi translate baru
        setSliderTransform(currentTranslate); // Terapkan transform secara real-time
    }

    function touchEnd() {
        isDragging = false;
        cancelAnimationFrame(animationId); // Hentikan loop animasi

        const movedBy = currentTranslate - prevTranslate; // Seberapa jauh digeser dari posisi awal drag

        const visibleItems = getVisibleItems();
        const gap = parseInt(window.getComputedStyle(container).columnGap) || 24;
        const containerWidth = container.parentElement.offsetWidth;
        const itemWidth = (containerWidth - gap * (visibleItems - 1)) / visibleItems;
        const threshold = itemWidth / 4; // Ambang batas untuk menganggap sebagai "geser" ke item berikutnya (1/4 lebar item)

        // Tentukan apakah harus berpindah indeks (snap to nearest item)
        if (movedBy < -threshold && currentIndex < totalItems - visibleItems) {
            // Geser ke kanan (maju)
            currentIndex++;
        } else if (movedBy > threshold && currentIndex > 0) {
            // Geser ke kiri (mundur)
            currentIndex--;
        }

        setPositionByIndex(); // Snap ke posisi indeks baru (dengan transisi)
        container.style.cursor = 'grab'; // Kembalikan kursor
    }

    function animation() {
        // Fungsi ini bisa digunakan untuk animasi yang lebih kompleks (misalnya, inersia)
        // Untuk saat ini, transform langsung di set di touchMove.
        // Fungsi ini memastikan bahwa requestAnimationFrame terus berjalan selama dragging.
        if (isDragging) {
            requestAnimationFrame(animation);
        }
    }

    // --- Memasang Event Listeners ---
    container.addEventListener('mousedown', touchStart);
    container.addEventListener('mouseup', touchEnd);
    container.addEventListener('mouseleave', touchEnd); // Jika mouse keluar saat drag
    container.addEventListener('mousemove', touchMove);

    container.addEventListener('touchstart', touchStart);
    container.addEventListener('touchend', touchEnd);
    container.addEventListener('touchcancel', touchEnd); // Jika sentuhan dibatalkan
    container.addEventListener('touchmove', touchMove);

    // Mencegah pemilihan teks saat drag
    container.style.userSelect = 'none';
    // Mengatur kursor awal
    container.style.cursor = 'grab';


    // --- Event Listeners Tombol Navigasi ---
    nextBtn.addEventListener("click", () => {
        const visibleItems = getVisibleItems();
        if (currentIndex < totalItems - visibleItems) {
            currentIndex++;
            setPositionByIndex();
        }
    });

    prevBtn.addEventListener("click", () => {
        if (currentIndex > 0) {
            currentIndex--;
            setPositionByIndex();
        }
    });

    // --- Event Listener Resize Window ---
    window.addEventListener("resize", () => {
        const visibleItems = getVisibleItems();
        // Pastikan currentIndex tidak keluar dari batas saat resize
        if (currentIndex > totalItems - visibleItems) {
            currentIndex = Math.max(0, totalItems - visibleItems);
        }
        setPositionByIndex(); // Sesuaikan posisi slider saat ukuran jendela berubah
    });

    // Panggil fungsi inisialisasi saat DOM selesai dimuat
    setPositionByIndex();
});
</script>
