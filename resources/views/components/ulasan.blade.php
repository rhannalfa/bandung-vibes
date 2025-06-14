{{-- resources/views/components/ulasan.blade.php --}}

{{-- Bagian Ulasan Pelanggan Dinamis dengan Slider --}}
<section class="bg-gray-50 max-w-full py-16" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6">
            <span class="inline-block bg-yellow-400 text-black text-xs font-semibold tracking-widest rounded-full px-4 py-1.5 uppercase">ULASAN PELANGGAN</span>
        </div>
        <h2 class="text-center text-3xl sm:text-4xl font-light text-gray-800 max-w-4xl mx-auto mb-12">
            Apa Kata Mereka Tentang <strong class="font-extrabold text-black">Bandung Vibes</strong>
        </h2>
        <div class="relative px-12">
            <div id="testimonial-wrapper" class="overflow-hidden">
                {{-- ========================================================================= --}}
                {{-- DIUBAH: Class 'xl:' dihapus agar maksimal 3 ulasan --}}
                {{-- ========================================================================= --}}
                <div id="testimonial-container" class="grid grid-flow-col auto-cols-[90%] sm:auto-cols-[calc(50%-12px)] lg:auto-cols-[calc(33.3333%-16px)] gap-6 transition-transform duration-500 ease-in-out">
                    @forelse ($ulasanPelanggan as $ulasan)
                        <article class="bg-white border border-gray-200 rounded-2xl shadow-lg p-6 flex flex-col testimonial-item group transform hover:scale-105 transition-transform duration-300 cursor-grab">
                            <header class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-14 h-14 rounded-full bg-gray-200 flex items-center justify-center ring-2 ring-yellow-300 group-hover:ring-yellow-400 transition-all">
                                        <svg class="w-8 h-8 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-base font-semibold text-gray-900">{{ $ulasan->user->name ?? 'Pengguna Dihapus' }}</p>
                                        <div class="flex items-center text-yellow-400 mt-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="{{ $i <= $ulasan->rating ? 'fas fa-star' : 'far fa-star' }}"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <div class="relative mt-2 flex-grow">
                                <svg class="absolute top-0 left-0 w-8 h-8 text-gray-100 transform -translate-x-2 -translate-y-2" fill="currentColor" viewBox="0 0 32 32">
                                  <path d="M9.333 8h-2.667c-1.473 0-2.667 1.193-2.667 2.667v8c0 1.473 1.194 2.667 2.667 2.667h2.667v-5.333h-2.667v-2.667h5.333v8c0 1.473-1.193 2.667-2.667 2.667h-2.667c-2.945 0-5.333-2.388-5.333-5.333v-8c0-2.945 2.388-5.333 5.333-5.333h2.667v5.333zM25.333 8h-2.667c-1.473 0-2.667 1.193-2.667 2.667v8c0 1.473 1.194 2.667 2.667 2.667h2.667v-5.333h-2.667v-2.667h5.333v8c0 1.473-1.193 2.667-2.667 2.667h-2.667c-2.945 0-5.333-2.388-5.333-5.333v-8c0-2.945 2.388-5.333 5.333-5.333h2.667v5.333z"></path>
                                </svg>
                                <p class="text-gray-600 text-sm leading-relaxed overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 max-h-[4.5rem] pr-2 z-10 relative">
                                    {{ $ulasan->komentar }}
                                </p>
                            </div>
                            <p class="text-xs text-gray-500 mt-2 pt-2 border-t border-gray-100">
                                Diulas untuk <strong>{{ $ulasan->paketWisata->nama_paket ?? 'Paket Wisata' }}</strong>
                                <br>
                                Pada {{ $ulasan->created_at->format('d M Y') }}
                            </p>
                        </article>
                    @empty
                        <div class="col-span-full text-center text-gray-500 p-12 bg-white rounded-lg shadow-md">
                            <p class="text-lg">Belum ada ulasan untuk ditampilkan.</p>
                            <p class="text-sm mt-2">Jadilah yang pertama memberikan ulasan!</p>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Tombol Navigasi Slider --}}
            <button id="prev-btn" class="absolute top-1/2 -left-4 transform -translate-y-1/2 bg-white rounded-full p-3 shadow-xl hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 transition-all duration-300 z-20" aria-label="Ulasan Sebelumnya">
                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button id="next-btn" class="absolute top-1/2 -right-4 transform -translate-y-1/2 bg-white rounded-full p-3 shadow-xl hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 transition-all duration-300 z-20" aria-label="Ulasan Berikutnya">
                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>
</section>

{{-- ========================================================================= --}}
{{-- DIUBAH: Script JavaScript dengan fungsi getVisibleItems yang disederhanakan --}}
{{-- ========================================================================= --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    const wrapper = document.getElementById("testimonial-wrapper");
    const container = document.getElementById("testimonial-container");
    const prevBtn = document.getElementById("prev-btn");
    const nextBtn = document.getElementById("next-btn");
    const items = document.querySelectorAll(".testimonial-item");

    if (!container || !prevBtn || !nextBtn || items.length === 0) {
        if(prevBtn) prevBtn.style.display = 'none';
        if(nextBtn) nextBtn.style.display = 'none';
        return;
    }

    let currentIndex = 0;
    const totalItems = items.length;
    let isDragging = false;
    let startPos = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let animationID;
    
    // FUNGSI INI DIUBAH - Kondisi untuk 4 item dihapus
    function getVisibleItems() {
        if (window.innerWidth >= 1024) return 3; // Layar LG ke atas (3 ulasan)
        if (window.innerWidth >= 640) return 2;  // Layar SM (2 ulasan)
        return 1; // Layar Mobile (1 ulasan)
    }

    function setPositionByIndex() {
        const visibleItems = getVisibleItems();
        if (!wrapper) return;

        if (totalItems <= visibleItems) {
            container.style.transform = `translateX(0px)`;
            prevBtn.style.display = 'none';
            nextBtn.style.display = 'none';
            container.style.justifyContent = 'center';
            return;
        }
        
        container.style.justifyContent = 'flex-start';

        const gap = parseInt(window.getComputedStyle(container).gap) || 24;
        const itemWidth = items[0].offsetWidth;
        
        currentIndex = Math.max(0, Math.min(currentIndex, totalItems - visibleItems));
        
        currentTranslate = -currentIndex * (itemWidth + gap);
        container.style.transform = `translateX(${currentTranslate}px)`;
        
        updateNavButtons();
    }

    function updateNavButtons() {
        const visibleItems = getVisibleItems();
        prevBtn.style.display = currentIndex > 0 ? "flex" : "none";
        nextBtn.style.display = currentIndex < totalItems - visibleItems ? "flex" : "none";
    }
    
    function slide(direction) {
        const visibleItems = getVisibleItems();
        const step = 1;
        
        currentIndex += direction * step;
        currentIndex = Math.max(0, Math.min(currentIndex, totalItems - visibleItems));
        setPositionByIndex();
    }

    // --- Sisa JavaScript tidak ada perubahan ---
    function dragStart(event) {
        if (totalItems <= getVisibleItems()) return;
        isDragging = true;
        startPos = event.type.includes('mouse') ? event.clientX : event.touches[0].clientX;
        animationID = requestAnimationFrame(animation);
        container.style.cursor = 'grabbing';
        container.classList.remove('transition-transform');
    }

    function drag(event) {
        if (isDragging) {
            const currentPosition = event.type.includes('mouse') ? event.clientX : event.touches[0].clientX;
            currentTranslate = prevTranslate + currentPosition - startPos;
            container.style.transform = `translateX(${currentTranslate}px)`;
        }
    }

    function dragEnd(event) {
        if (!isDragging) return;
        isDragging = false;
        cancelAnimationFrame(animationID);
        
        const movedBy = currentTranslate - prevTranslate;
        const itemWidth = items[0].offsetWidth;
        const threshold = itemWidth / 4;

        if (movedBy < -threshold) {
          slide(1);
        } else if (movedBy > threshold) {
            slide(-1);
        }

        container.classList.add('transition-transform');
        setPositionByIndex();
        container.style.cursor = 'grab';
        prevTranslate = currentTranslate;
    }
    
    function animation() {
        if (isDragging) requestAnimationFrame(animation);
    }
    
    container.addEventListener('mousedown', dragStart);
    container.addEventListener('touchstart', dragStart, { passive: true });
    
    document.addEventListener('mouseup', dragEnd);
    document.addEventListener('mouseleave', dragEnd);
    document.addEventListener('touchend', dragEnd);
    
    document.addEventListener('mousemove', drag);
    document.addEventListener('touchmove', drag, { passive: true });

    nextBtn.addEventListener("click", () => slide(1));
    prevBtn.addEventListener("click", () => slide(-1));

    window.addEventListener("resize", () => {
        container.classList.remove('transition-transform');
        setPositionByIndex();
        container.classList.add('transition-transform');
    });

    setPositionByIndex();
    if(totalItems > getVisibleItems()) {
      container.style.cursor = 'grab';
    }
});
</script>