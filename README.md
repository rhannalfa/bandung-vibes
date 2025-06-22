<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandung Vibes - Project Overview</title>
    <!-- Chosen Palette: Warm Orange & Neutral Gray -->
    <!-- Application Structure Plan: The SPA uses a tabbed navigation interface (Overview, Tech Stack, Installation, Architecture) to break down the README content into manageable, thematic sections. This is more user-friendly than a long, single-scroll page. The 'Installation' section is an interactive accordion, making the step-by-step process easier to follow. The 'Architecture' section uses HTML/CSS diagrams to visually clarify the project's complex dual-source image handling, a key concept from the source report. -->
    <!-- Visualization & Content Choices:
    - Report Info: Project Features -> Goal: Inform -> Presentation: Icon + Text Cards -> Interaction: Hover -> Justification: Visually scannable summary.
    - Report Info: Technology Stack -> Goal: Inform -> Presentation: Icon + Text Cards -> Justification: More engaging than a bulleted list.
    - Report Info: Installation Steps -> Goal: Instruct/Guide -> Presentation: Interactive Accordion -> Interaction: Click to expand, copy code -> Justification: Breaks down a complex process into focused steps, reducing cognitive load.
    - Report Info: Image Management Logic -> Goal: Explain/Clarify -> Presentation: HTML/CSS Flowchart Diagram -> Justification: Visually explains a complex technical concept that is central to the project, which is more effective than text alone.
    - CONFIRMATION: NO SVG/Mermaid used. Icons are from Font Awesome CDN. Diagrams are pure HTML/CSS. -->
    <!-- CONFIRMATION: NO SVG graphics used. NO Mermaid JS used. -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .tab-link.active {
            border-color: #fd7e14;
            color: #fd7e14;
            background-color: #fff;
        }
        .accordion-header.open .accordion-icon {
            transform: rotate(180deg);
        }
    </style>
</head>
<body class="text-gray-800">

    <div class="container mx-auto p-4 sm:p-6 md:p-8">
        
        <header class="text-center mb-8">
            <h1 class="text-5xl font-extrabold text-gray-900">Bandung Vibes</h1>
            <p class="mt-2 text-lg text-gray-600">Interactive Project Overview</p>
        </header>

        <!-- Tab Navigation -->
        <div class="mb-8 border-b border-gray-200">
            <nav class="flex flex-wrap -mb-px" id="tab-nav">
                <a href="#overview" class="tab-link active text-lg font-semibold py-4 px-6 border-b-2 border-transparent hover:text-orange-500 hover:border-orange-500 transition-colors duration-300">Overview</a>
                <a href="#tech-stack" class="tab-link text-lg font-semibold py-4 px-6 border-b-2 border-transparent hover:text-orange-500 hover:border-orange-500 transition-colors duration-300">Tech Stack</a>
                <a href="#installation" class="tab-link text-lg font-semibold py-4 px-6 border-b-2 border-transparent hover:text-orange-500 hover:border-orange-500 transition-colors duration-300">Installation</a>
                <a href="#architecture" class="tab-link text-lg font-semibold py-4 px-6 border-b-2 border-transparent hover:text-orange-500 hover:border-orange-500 transition-colors duration-300">Architecture</a>
            </nav>
        </div>

        <!-- Tab Content -->
        <main id="tab-content">
            <!-- Overview Section -->
            <section id="overview" class="tab-pane">
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <h2 class="text-3xl font-bold mb-4">Project Overview</h2>
                    <p class="text-gray-700 leading-relaxed mb-8">Aplikasi web berbasis Laravel untuk mengelola dan menampilkan paket-paket wisata di Bandung, dirancang untuk memberikan pengalaman pengguna yang menarik dan intuitif. Proyek ini memfokuskan pada pengelolaan data paket wisata, termasuk detail, harga, durasi, destinasi, fasilitas, dan galeri gambar dinamis.</p>
                    
                    <h3 class="text-2xl font-bold mb-6">Fitur Utama</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-gray-50 p-6 rounded-lg hover:shadow-md hover:scale-105 transition-all duration-300">
                            <i class="fas fa-cogs text-3xl text-orange-500 mb-3"></i>
                            <h4 class="font-bold text-lg">Manajemen Paket</h4>
                            <p class="text-gray-600 text-sm">CRUD lengkap untuk paket wisata melalui panel admin.</p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-lg hover:shadow-md hover:scale-105 transition-all duration-300">
                            <i class="fas fa-desktop text-3xl text-orange-500 mb-3"></i>
                            <h4 class="font-bold text-lg">Frontend Responsif</h4>
                            <p class="text-gray-600 text-sm">Tampilan daftar dan detail paket yang menarik di semua perangkat.</p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-lg hover:shadow-md hover:scale-105 transition-all duration-300">
                            <i class="fas fa-images text-3xl text-orange-500 mb-3"></i>
                            <h4 class="font-bold text-lg">Gambar Fleksibel</h4>
                            <p class="text-gray-600 text-sm">Mendukung gambar dari seeder dan upload admin secara dinamis.</p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-lg hover:shadow-md hover:scale-105 transition-all duration-300">
                            <i class="fas fa-star text-3xl text-orange-500 mb-3"></i>
                            <h4 class="font-bold text-lg">Sistem Ulasan</h4>
                            <p class="text-gray-600 text-sm">Pengguna dapat memberi rating dan komentar pada setiap paket.</p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-lg hover:shadow-md hover:scale-105 transition-all duration-300">
                            <i class="fas fa-database text-3xl text-orange-500 mb-3"></i>
                            <h4 class="font-bold text-lg">Struktur Data</h4>
                            <p class="text-gray-600 text-sm">Menggunakan Eloquent `casts` untuk data JSON seperti fasilitas.</p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-lg hover:shadow-md hover:scale-105 transition-all duration-300">
                            <i class="fas fa-link text-3xl text-orange-500 mb-3"></i>
                            <h4 class="font-bold text-lg">URL SEO-Friendly</h4>
                            <p class="text-gray-600 text-sm">Menggunakan slug untuk URL yang bersih dan mudah dibaca.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Tech Stack Section -->
            <section id="tech-stack" class="tab-pane hidden">
                 <div class="bg-white p-8 rounded-xl shadow-lg">
                    <h2 class="text-3xl font-bold mb-8 text-center">Tumpukan Teknologi</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 text-center">
                        <div class="p-4 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                            <i class="fab fa-laravel text-6xl text-red-500"></i>
                            <p class="mt-2 font-semibold">Laravel</p>
                        </div>
                        <div class="p-4 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                            <i class="fab fa-php text-6xl text-indigo-500"></i>
                            <p class="mt-2 font-semibold">PHP</p>
                        </div>
                         <div class="p-4 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                            <i class="fas fa-database text-6xl text-blue-600"></i>
                            <p class="mt-2 font-semibold">MySQL</p>
                        </div>
                        <div class="p-4 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                             <div class="text-6xl text-green-500">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <p class="mt-2 font-semibold">Blade</p>
                        </div>
                        <div class="p-4 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                             <div class="text-6xl text-cyan-500">
                                <i class="fab fa-css3-alt"></i><span class="text-4xl">+</span><i class="fab fa-js"></i>
                            </div>
                            <p class="mt-2 font-semibold">Tailwind CSS</p>
                        </div>
                         <div class="p-4 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                            <i class="fab fa-js-square text-6xl text-yellow-500"></i>
                            <p class="mt-2 font-semibold">JavaScript</p>
                        </div>
                        <div class="p-4 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                             <div class="text-6xl text-purple-500">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <p class="mt-2 font-semibold">Vite</p>
                        </div>
                        <div class="p-4 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                            <i class="fab fa-font-awesome text-6xl text-sky-500"></i>
                            <p class="mt-2 font-semibold">Font Awesome</p>
                        </div>
                    </div>
                 </div>
            </section>

            <!-- Installation Section -->
            <section id="installation" class="tab-pane hidden">
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <h2 class="text-3xl font-bold mb-6">Panduan Instalasi</h2>
                    <div id="accordion-container" class="space-y-4">
                        <!-- Step 1 -->
                        <div class="accordion-item border border-gray-200 rounded-lg">
                            <button class="accordion-header w-full text-left p-4 font-semibold text-lg flex justify-between items-center hover:bg-gray-50 transition-colors">
                                <span>1. Clone Repositori</span>
                                <i class="fas fa-chevron-down accordion-icon transition-transform"></i>
                            </button>
                            <div class="accordion-content hidden p-4 border-t border-gray-200">
                                <p class="text-gray-600 mb-3">Gunakan perintah ini untuk mengunduh proyek ke komputer lokal Anda.</p>
                                <div class="bg-gray-900 text-white p-3 rounded-md flex justify-between items-center font-mono text-sm">
                                    <pre><code>git clone &lt;URL_REPOSITORI_ANDA&gt;
cd bandung-vibes</code></pre>
                                    <button class="copy-btn text-gray-400 hover:text-white" title="Copy to clipboard"><i class="far fa-copy"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Step 2 -->
                        <div class="accordion-item border border-gray-200 rounded-lg">
                            <button class="accordion-header w-full text-left p-4 font-semibold text-lg flex justify-between items-center hover:bg-gray-50 transition-colors">
                                <span>2. Instal Dependensi Composer</span>
                                <i class="fas fa-chevron-down accordion-icon transition-transform"></i>
                            </button>
                            <div class="accordion-content hidden p-4 border-t border-gray-200">
                                <p class="text-gray-600 mb-3">Perintah ini akan menginstal semua paket PHP yang dibutuhkan oleh Laravel.</p>
                                <div class="bg-gray-900 text-white p-3 rounded-md flex justify-between items-center font-mono text-sm">
                                    <pre><code>composer install</code></pre>
                                    <button class="copy-btn text-gray-400 hover:text-white" title="Copy to clipboard"><i class="far fa-copy"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Step 3 -->
                        <div class="accordion-item border border-gray-200 rounded-lg">
                            <button class="accordion-header w-full text-left p-4 font-semibold text-lg flex justify-between items-center hover:bg-gray-50 transition-colors">
                                <span>3. Siapkan File Environment</span>
                                <i class="fas fa-chevron-down accordion-icon transition-transform"></i>
                            </button>
                            <div class="accordion-content hidden p-4 border-t border-gray-200">
                                <p class="text-gray-600 mb-3">Salin file `.env.example` menjadi `.env` dan buat kunci aplikasi.</p>
                                <div class="bg-gray-900 text-white p-3 rounded-md flex justify-between items-center font-mono text-sm">
                                    <pre><code>cp .env.example .env
php artisan key:generate</code></pre>
                                    <button class="copy-btn text-gray-400 hover:text-white" title="Copy to clipboard"><i class="far fa-copy"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Step 4 -->
                        <div class="accordion-item border border-gray-200 rounded-lg">
                            <button class="accordion-header w-full text-left p-4 font-semibold text-lg flex justify-between items-center hover:bg-gray-50 transition-colors">
                                <span>4. Konfigurasi & Jalankan Database</span>
                                <i class="fas fa-chevron-down accordion-icon transition-transform"></i>
                            </button>
                            <div class="accordion-content hidden p-4 border-t border-gray-200">
                                <p class="text-gray-600 mb-3">Atur koneksi database di file `.env`, lalu jalankan migrasi dan seeder.</p>
                                <div class="bg-gray-900 text-white p-3 rounded-md flex justify-between items-center font-mono text-sm">
                                    <pre><code>php artisan migrate:fresh --seed</code></pre>
                                    <button class="copy-btn text-gray-400 hover:text-white" title="Copy to clipboard"><i class="far fa-copy"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Step 5 -->
                        <div class="accordion-item border border-gray-200 rounded-lg">
                            <button class="accordion-header w-full text-left p-4 font-semibold text-lg flex justify-between items-center hover:bg-gray-50 transition-colors">
                                <span>5. Buat Symlink Storage</span>
                                <i class="fas fa-chevron-down accordion-icon transition-transform"></i>
                            </button>
                            <div class="accordion-content hidden p-4 border-t border-gray-200">
                                <p class="text-gray-600 mb-3">Ini penting agar gambar yang diunggah dapat diakses dari web.</p>
                                <div class="bg-gray-900 text-white p-3 rounded-md flex justify-between items-center font-mono text-sm">
                                    <pre><code>php artisan storage:link</code></pre>
                                    <button class="copy-btn text-gray-400 hover:text-white" title="Copy to clipboard"><i class="far fa-copy"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Step 6 -->
                        <div class="accordion-item border border-gray-200 rounded-lg">
                            <button class="accordion-header w-full text-left p-4 font-semibold text-lg flex justify-between items-center hover:bg-gray-50 transition-colors">
                                <span>6. Instal & Jalankan Aset Frontend</span>
                                <i class="fas fa-chevron-down accordion-icon transition-transform"></i>
                            </button>
                            <div class="accordion-content hidden p-4 border-t border-gray-200">
                                <p class="text-gray-600 mb-3">Instal paket NPM dan jalankan Vite untuk pengembangan.</p>
                                <div class="bg-gray-900 text-white p-3 rounded-md flex justify-between items-center font-mono text-sm">
                                    <pre><code>npm install
npm run dev</code></pre>
                                    <button class="copy-btn text-gray-400 hover:text-white" title="Copy to clipboard"><i class="far fa-copy"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Step 7 -->
                        <div class="accordion-item border border-gray-200 rounded-lg">
                            <button class="accordion-header w-full text-left p-4 font-semibold text-lg flex justify-between items-center hover:bg-gray-50 transition-colors">
                                <span>7. Jalankan Server Lokal</span>
                                <i class="fas fa-chevron-down accordion-icon transition-transform"></i>
                            </button>
                            <div class="accordion-content hidden p-4 border-t border-gray-200">
                                <p class="text-gray-600 mb-3">Proyek Anda sekarang siap diakses!</p>
                                <div class="bg-gray-900 text-white p-3 rounded-md flex justify-between items-center font-mono text-sm">
                                    <pre><code>php artisan serve</code></pre>
                                    <button class="copy-btn text-gray-400 hover:text-white" title="Copy to clipboard"><i class="far fa-copy"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Architecture Section -->
            <section id="architecture" class="tab-pane hidden">
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <h2 class="text-3xl font-bold mb-6">Arsitektur & Konsep Kunci</h2>
                    <p class="text-gray-700 leading-relaxed mb-8">Salah satu aspek terpenting dari proyek ini adalah manajemen gambar yang fleksibel. Sistem ini dirancang untuk menangani gambar dari dua sumber berbeda secara mulus: gambar statis dari seeder untuk data awal, dan gambar dinamis yang diunggah oleh admin.</p>
                    
                    <h3 class="text-2xl font-bold mb-6 text-center">Alur Manajemen Gambar</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Diagram 1: Seeder Images -->
                        <div class="border-2 border-dashed border-green-300 p-6 rounded-lg">
                            <h4 class="font-bold text-xl mb-4 text-center">1. Gambar dari Seeder (Aset Statis)</h4>
                            <div class="flex flex-col items-center space-y-4 text-sm">
                                <div class="bg-green-100 p-3 rounded-md w-full text-center">
                                    <i class="fas fa-code mr-2"></i>
                                    Seeder: `gambar_utama' => 'assets/images/...'`
                                </div>
                                <i class="fas fa-arrow-down text-2xl text-green-500"></i>
                                <div class="bg-green-100 p-3 rounded-md w-full text-center">
                                    <i class="fas fa-database mr-2"></i>
                                    Database menyimpan path relatif ke `public`
                                </div>
                                <i class="fas fa-arrow-down text-2xl text-green-500"></i>
                                <div class="bg-green-100 p-3 rounded-md w-full text-center">
                                    <i class="fas fa-folder-open mr-2"></i>
                                    Gambar fisik berada di `public/assets/images/`
                                </div>
                                <i class="fas fa-arrow-down text-2xl text-green-500"></i>
                                <div class="bg-green-100 p-3 rounded-md w-full text-center">
                                    <i class="fab fa-laravel mr-2"></i>
                                    Blade: `asset('assets/images/...')`
                                </div>
                            </div>
                        </div>

                        <!-- Diagram 2: Uploaded Images -->
                        <div class="border-2 border-dashed border-blue-300 p-6 rounded-lg">
                            <h4 class="font-bold text-xl mb-4 text-center">2. Gambar dari Upload Admin</h4>
                            <div class="flex flex-col items-center space-y-4 text-sm">
                                <div class="bg-blue-100 p-3 rounded-md w-full text-center">
                                    <i class="fas fa-upload mr-2"></i>
                                    Admin mengunggah gambar via form
                                </div>
                                <i class="fas fa-arrow-down text-2xl text-blue-500"></i>
                                <div class="bg-blue-100 p-3 rounded-md w-full text-center">
                                    <i class="fas fa-database mr-2"></i>
                                    Database menyimpan path relatif ke `storage`
                                </div>
                                <i class="fas fa-arrow-down text-2xl text-blue-500"></i>
                                <div class="bg-blue-100 p-3 rounded-md w-full text-center">
                                    <i class="fas fa-hdd mr-2"></i>
                                    Gambar fisik berada di `storage/app/public/`
                                </div>
                                <i class="fas fa-arrow-down text-2xl text-blue-500"></i>
                                <div class="bg-blue-100 p-3 rounded-md w-full text-center">
                                    <i class="fab fa-laravel mr-2"></i>
                                    Blade: `Storage::url('path/dari/db')`
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 pt-6 border-t">
                         <h3 class="text-2xl font-bold mb-4">Struktur Data JSON</h3>
                         <p class="text-gray-700 leading-relaxed mb-4">Untuk fleksibilitas, kolom `gambar_lainnya` dan `fasilitas` menggunakan `casts` array di Model Eloquent. Data ini disimpan sebagai JSON di database, memungkinkan penyimpanan daftar item yang dinamis tanpa perlu tabel relasi tambahan.</p>
                         <div class="grid grid-cols-1 md:grid-cols-2 gap-6 font-mono text-sm">
                            <div class="bg-gray-900 text-white p-4 rounded-md">
                                <p class="text-gray-400 mb-2">// Contoh data 'fasilitas' di database:</p>
                                <pre><code>["Transportasi AC", "Pemandu Lokal", "Tiket Masuk"]</code></pre>
                            </div>
                             <div class="bg-gray-900 text-white p-4 rounded-md">
                                <p class="text-gray-400 mb-2">// Contoh data 'gambar_lainnya':</p>
                                <pre><code>["paket-wisata/lainnya/img_1.jpg", "paket-wisata/lainnya/img_2.jpg"]</code></pre>
                            </div>
                         </div>
                    </div>
                </div>
            </section>
        </main>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.tab-link');
            const panes = document.querySelectorAll('.tab-pane');

            tabs.forEach(tab => {
                tab.addEventListener('click', function (event) {
                    event.preventDefault();

                    tabs.forEach(item => item.classList.remove('active'));
                    panes.forEach(pane => pane.classList.add('hidden'));

                    this.classList.add('active');
                    const targetPane = document.querySelector(this.getAttribute('href'));
                    targetPane.classList.remove('hidden');
                });
            });

            const accordionHeaders = document.querySelectorAll('.accordion-header');
            accordionHeaders.forEach(header => {
                header.addEventListener('click', () => {
                    const content = header.nextElementSibling;
                    header.classList.toggle('open');
                    content.classList.toggle('hidden');
                });
            });

            const copyButtons = document.querySelectorAll('.copy-btn');
            copyButtons.forEach(button => {
                button.addEventListener('click', (event) => {
                    const pre = button.previousElementSibling;
                    const code = pre.innerText;

                    const textarea = document.createElement('textarea');
                    textarea.value = code;
                    document.body.appendChild(textarea);
                    textarea.select();
                    try {
                         document.execCommand('copy');
                         const originalIcon = button.innerHTML;
                         button.innerHTML = '<i class="fas fa-check text-green-500"></i>';
                         setTimeout(() => {
                             button.innerHTML = originalIcon;
                         }, 2000);
                    } catch (err) {
                        console.error('Failed to copy: ', err);
                    }
                    document.body.removeChild(textarea);
                });
            });
        });
    </script>

</body>
</html>
