<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kekayaan Desa Resapombo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Menggunakan font Inter sebagai standar agar mirip dengan UI */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#fafafa] text-gray-800 antialiased">

    <!-- Komponen Navbar Laravel -->
    <x-navbar></x-navbar>

    <!-- Hero Section -->
    <header class="relative w-full h-[400px] md:h-[500px]">
        <!-- Background Image dengan Overlay -->
        <div class="absolute inset-0 w-full h-full">
            <!-- Ganti src dengan path gambar gunung/bromo asli milik Anda -->
            <img src="https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" 
                 alt="Pemandangan Desa" 
                 class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black/40"></div>
        </div>

        <!-- Konten Hero -->
        <div class="relative z-10 h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-center">
            <div class="max-w-2xl">
                <span class="inline-block py-1.5 px-4 rounded-full border border-white/50 bg-white/10 backdrop-blur-sm text-xs font-semibold text-white tracking-wider mb-4">
                    WEBSITE DESA RESAPOMBO
                </span>
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 leading-tight">
                    Kekayaan Desa Resapombo
                </h1>
                <p class="text-sm md:text-base text-gray-200 line-clamp-3">
                    Dapatkan informasi terbaru seputar pembangunan, kegiatan warga, dan pengumuman resmi dari Pemerintah Desa Resapombo.
                </p>
            </div>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-16">
        
        <!-- Filter dan Pencarian -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
            <!-- Tombol Filter -->
            <div class="flex flex-wrap gap-2" id="filter-container">
                <button class="filter-btn active bg-green-700 text-white px-5 py-2 rounded-full text-sm font-medium transition-colors">Semua</button>
                <button class="filter-btn bg-gray-100 text-gray-700 hover:bg-gray-200 px-5 py-2 rounded-full text-sm font-medium transition-colors">Pertanian</button>
                <button class="filter-btn bg-gray-100 text-gray-700 hover:bg-gray-200 px-5 py-2 rounded-full text-sm font-medium transition-colors">Kegiatan</button>
                <button class="filter-btn bg-gray-100 text-gray-700 hover:bg-gray-200 px-5 py-2 rounded-full text-sm font-medium transition-colors">Pengumuman</button>
            </div>

            <!-- Input Pencarian -->
            <div class="relative w-full md:w-80">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" 
                       class="block w-full pl-10 pr-3 py-2.5 border-transparent bg-gray-100 rounded-full text-sm placeholder-gray-500 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 transition-all outline-none" 
                       placeholder="Cari Berita dan Artikel...">
            </div>
        </div>

        <!-- Daftar Artikel/Berita -->
        <div class="space-y-6">
            
            <!-- Card Artikel 1 -->
            <article class="bg-white rounded-2xl p-4 flex flex-col md:flex-row gap-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
                <!-- Thumbnail -->
                <div class="w-full md:w-1/3 lg:w-1/4 shrink-0">
                    <img src="https://images.unsplash.com/photo-1592982537447-7440770cbfc9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Peresmian Irigasi" 
                         class="w-full h-48 md:h-full object-cover rounded-xl">
                </div>
                <!-- Konten Teks -->
                <div class="flex-1 py-2 flex flex-col justify-center">
                    <span class="inline-block bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-1 rounded-md w-max mb-3">
                        Pertanian
                    </span>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 hover:text-green-700 transition-colors cursor-pointer">
                        Peresmian Fasilitas Irigasi Baru Tingkatkan Panen Petani Lokal
                    </h2>
                    <p class="text-gray-600 text-sm md:text-base leading-relaxed line-clamp-3">
                        Pemerintah Desa Resapombo bersama dinas pertanian kabupaten resmi membuka jalur irigasi blok utara. Proyek yang memakan waktu tiga bulan ini diharapkan dapat memastikan pasokan air stabil saat...
                    </p>
                </div>
            </article>

            <!-- Card Artikel 2 -->
            <article class="bg-white rounded-2xl p-4 flex flex-col md:flex-row gap-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
                <div class="w-full md:w-1/3 lg:w-1/4 shrink-0">
                    <img src="https://images.unsplash.com/photo-1592982537447-7440770cbfc9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Peresmian Irigasi" 
                         class="w-full h-48 md:h-full object-cover rounded-xl">
                </div>
                <div class="flex-1 py-2 flex flex-col justify-center">
                    <span class="inline-block bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-1 rounded-md w-max mb-3">
                        Pertanian
                    </span>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 hover:text-green-700 transition-colors cursor-pointer">
                        Peresmian Fasilitas Irigasi Baru Tingkatkan Panen Petani Lokal
                    </h2>
                    <p class="text-gray-600 text-sm md:text-base leading-relaxed line-clamp-3">
                        Pemerintah Desa Resapombo bersama dinas pertanian kabupaten resmi membuka jalur irigasi blok utara. Proyek yang memakan waktu tiga bulan ini diharapkan dapat memastikan pasokan air stabil saat...
                    </p>
                </div>
            </article>

            <!-- Card Artikel 3 -->
            <article class="bg-white rounded-2xl p-4 flex flex-col md:flex-row gap-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
                <div class="w-full md:w-1/3 lg:w-1/4 shrink-0">
                    <img src="https://images.unsplash.com/photo-1592982537447-7440770cbfc9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Peresmian Irigasi" 
                         class="w-full h-48 md:h-full object-cover rounded-xl">
                </div>
                <div class="flex-1 py-2 flex flex-col justify-center">
                    <span class="inline-block bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-1 rounded-md w-max mb-3">
                        Pertanian
                    </span>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 hover:text-green-700 transition-colors cursor-pointer">
                        Peresmian Fasilitas Irigasi Baru Tingkatkan Panen Petani Lokal
                    </h2>
                    <p class="text-gray-600 text-sm md:text-base leading-relaxed line-clamp-3">
                        Pemerintah Desa Resapombo bersama dinas pertanian kabupaten resmi membuka jalur irigasi blok utara. Proyek yang memakan waktu tiga bulan ini diharapkan dapat memastikan pasokan air stabil saat...
                    </p>
                </div>
            </article>

        </div>
    </main>

    <!-- Komponen Footer Laravel -->
    <x-footer></x-footer>

    <!-- JavaScript Interaktif Sederhana -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.filter-btn');

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    // Reset kelas pada semua tombol
                    buttons.forEach(btn => {
                        btn.classList.remove('bg-green-700', 'text-white');
                        btn.classList.add('bg-gray-100', 'text-gray-700');
                    });

                    // Set kelas aktif pada tombol yang diklik
                    button.classList.remove('bg-gray-100', 'text-gray-700');
                    button.classList.add('bg-green-700', 'text-white');
                    
                    // Di sini Anda bisa menambahkan logika AJAX atau filter array 
                    // untuk memanipulasi list artikel sesuai kategori.
                });
            });
        });
    </script>
</body>
</html>