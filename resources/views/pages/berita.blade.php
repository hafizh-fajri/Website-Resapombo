<!-- resources/views/news.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita & Artikel - Desa Resapombo</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Link CDN Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        /* Kustomisasi Swiper Pagination */
        .swiper-pagination-bullet-active {
            background-color: #286B39 !important;
        }
        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased font-sans">

    <!-- Komponen Navbar -->
    <x-navbar />

    <!-- Menggunakan max-w-6xl agar ada margin lega di kiri-kanan pada layar besar -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
        
        <!-- Bagian Judul -->
        <div class="mb-12">
            <span class="inline-block bg-[#E7F3EA] text-[#286B39] text-xs font-semibold px-3 py-1 rounded-full mb-3">
                WEBSITE DESA RESAPOMBO
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-950 mb-4 tracking-tight">Berita & Artikel</h1>
            <p class="text-slate-600 max-w-2xl leading-relaxed text-lg">
                Dapatkan informasi terbaru seputar pembangunan, kegiatan warga, dan pengumuman resmi dari Pemerintah Desa Resapombo.
            </p>
        </div>

        <!-- Bagian Filter & Pencarian -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 mb-12">
            <!-- Pil Kategori -->
            <div class="flex items-center gap-3 w-full md:w-auto overflow-x-auto pb-2 -mb-2 md:pb-0 md:mb-0 no-scrollbar">
                <button class="whitespace-nowrap px-5 py-2.5 rounded-full text-sm font-medium bg-[#0F5132] text-white">Semua</button>
                <button class="whitespace-nowrap px-5 py-2.5 rounded-full text-sm font-medium bg-[#F1F3F5] text-slate-700 hover:bg-[#E2E6EA] transition">Pembangunan</button>
                <button class="whitespace-nowrap px-5 py-2.5 rounded-full text-sm font-medium bg-[#F1F3F5] text-slate-700 hover:bg-[#E2E6EA] transition">Kegiatan</button>
                <button class="whitespace-nowrap px-5 py-2.5 rounded-full text-sm font-medium bg-[#F1F3F5] text-slate-700 hover:bg-[#E2E6EA] transition">Pengumuman</button>
            </div>

            <!-- Input Pencarian -->
            <div class="relative w-full md:w-80">
                <input type="text" placeholder="Cari Berita dan Artikel" class="w-full bg-[#F8F9FA] border border-[#E9ECEF] rounded-full px-5 py-3 pr-12 text-sm focus:border-[#286B39] focus:outline-none focus:ring-1 focus:ring-[#286B39] transition">
                <div class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>
        </div>

        <!-- ========================================= -->
        <!-- Bagian Highlight Berita (Slider 3 Berita) -->
        <!-- ========================================= -->
        <div class="mb-16 relative">
            
            <!-- Swiper Container -->
            <div class="swiper mySwiper rounded-3xl border border-[#E9ECEF] shadow-sm">
                <div class="swiper-wrapper">
                    
                    <!-- Slide 1 (Irigasi/Pembangunan) -->
                    <div class="swiper-slide bg-white grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-10 p-5 md:p-8">
                        <div class="md:col-span-6 lg:col-span-7 rounded-2xl overflow-hidden aspect-[4/3] md:aspect-video relative bg-slate-100">
                            <!-- Menggunakan gambar online gratis dari Unsplash -->
                            <img src="https://images.unsplash.com/photo-1592982537447-6f2a6a0c5c4e?q=80&w=1000&auto=format&fit=crop" alt="Peresmian Fasilitas Irigasi Baru">
                            <span class="absolute top-4 left-4 bg-[#E7F3EA] text-[#286B39] text-xs font-bold px-3 py-1.5 rounded-full z-10 shadow-sm">Pembangunan</span>
                        </div>
                        <div class="md:col-span-6 lg:col-span-5 flex flex-col justify-center py-2">
                            <div>
                                <div class="flex items-center gap-2 text-sm text-slate-500 mb-3 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    15 Oktober 2024 &bull; Oleh: Tim Redaksi Desa
                                </div>
                                <h3 class="text-2xl md:text-3xl font-bold text-slate-950 mb-4 leading-tight">Peresmian Fasilitas Irigasi Baru Tingkatkan Panen Petani Lokal</h3>
                                <p class="text-slate-600 text-base leading-relaxed mb-8 line-clamp-3 md:line-clamp-4">
                                    Pemerintah Desa Resapombo bersama dinas pertanian kabupaten resmi membuka jalur irigasi blok utara. Proyek yang memakan waktu tiga bulan ini diharapkan dapat memastikan pasokan air stabil saat musim kemarau...
                                </p>
                            </div>
                            <div>
                                <a href="#" class="inline-flex items-center gap-2 bg-[#0F5132] text-white px-6 py-3 rounded-xl text-sm font-semibold hover:bg-[#146C43] transition-colors shadow-sm">
                                    Baca Selengkapnya
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 (Musyawarah) -->
                    <div class="swiper-slide bg-white grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-10 p-5 md:p-8">
                        <div class="md:col-span-6 lg:col-span-7 rounded-2xl overflow-hidden aspect-[4/3] md:aspect-video relative bg-slate-100">
                            <!-- Menggunakan gambar online gratis dari Unsplash -->
                            <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?q=80&w=1000&auto=format&fit=crop" alt="Musyawarah Desa">
                            <span class="absolute top-4 left-4 bg-[#E7F3EA] text-[#286B39] text-xs font-bold px-3 py-1.5 rounded-full z-10 shadow-sm">Kegiatan</span>
                        </div>
                        <div class="md:col-span-6 lg:col-span-5 flex flex-col justify-center py-2">
                            <div>
                                <div class="flex items-center gap-2 text-sm text-slate-500 mb-3 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    12 Oktober 2024 &bull; Oleh: Tim Redaksi Desa
                                </div>
                                <h3 class="text-2xl md:text-3xl font-bold text-slate-950 mb-4 leading-tight">Musyawarah Tahunan Desa: Penetapan Rencana Kerja 2025</h3>
                                <p class="text-slate-600 text-base leading-relaxed mb-8 line-clamp-3 md:line-clamp-4">
                                    Warga desa berkumpul untuk membahas prioritas pembangunan tahun depan. Musyawarah kali ini fokus pada peningkatan fasilitas kesehatan dan perbaikan jalan desa utama.
                                </p>
                            </div>
                            <div>
                                <a href="#" class="inline-flex items-center gap-2 bg-[#0F5132] text-white px-6 py-3 rounded-xl text-sm font-semibold hover:bg-[#146C43] transition-colors shadow-sm">
                                    Baca Selengkapnya
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 (Kesehatan/Posyandu) -->
                    <div class="swiper-slide bg-white grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-10 p-5 md:p-8">
                        <div class="md:col-span-6 lg:col-span-7 rounded-2xl overflow-hidden aspect-[4/3] md:aspect-video relative bg-slate-100">
                            <!-- Menggunakan gambar online gratis dari Unsplash -->
                            <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=1000&auto=format&fit=crop" alt="Penyuluhan Posyandu">
                            <span class="absolute top-4 left-4 bg-[#E7F3EA] text-[#286B39] text-xs font-bold px-3 py-1.5 rounded-full z-10 shadow-sm">Kegiatan</span>
                        </div>
                        <div class="md:col-span-6 lg:col-span-5 flex flex-col justify-center py-2">
                            <div>
                                <div class="flex items-center gap-2 text-sm text-slate-500 mb-3 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    10 Oktober 2024 &bull; Oleh: Bidan Desa
                                </div>
                                <h3 class="text-2xl md:text-3xl font-bold text-slate-950 mb-4 leading-tight">Posyandu Serentak Bulan Oktober: Fokus Pencegahan Stunting</h3>
                                <p class="text-slate-600 text-base leading-relaxed mb-8 line-clamp-3 md:line-clamp-4">
                                    Seluruh posyandu di dusun-dusun melaksanakan pelayanan rutin. Bulan ini, posyandu memberikan tambahan nutrisi bagi ibu hamil dan balita untuk menekan angka stunting.
                                </p>
                            </div>
                            <div>
                                <a href="#" class="inline-flex items-center gap-2 bg-[#0F5132] text-white px-6 py-3 rounded-xl text-sm font-semibold hover:bg-[#146C43] transition-colors shadow-sm">
                                    Baca Selengkapnya
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Pagination Swiper (Bullets) di bawah slider -->
                <div class="swiper-pagination !-bottom-5"></div>
            </div>
        </div>

        <!-- ========================================= -->
        <!-- Bagian Berita Biasa (Grid Card Kecil) -->
        <!-- ========================================= -->
        <div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                
                <!-- Card 1 -->
                <article class="bg-white rounded-3xl border border-[#E9ECEF] p-5 shadow-sm hover:shadow-lg transition-shadow duration-300">
                    <div class="rounded-2xl overflow-hidden aspect-[4/3] mb-5 relative bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1592982537447-6f2a6a0c5c4e?q=80&w=600&auto=format&fit=crop" alt="Berita 1" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 bg-[#E7F3EA] text-[#286B39] text-xs font-bold px-3 py-1 rounded-full z-10">Pembangunan</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-slate-500 mb-3 font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        15 Oktober 2024
                    </div>
                    <h3 class="text-xl font-bold text-slate-950 mb-3 leading-tight line-clamp-2 hover:text-[#286B39] transition-colors cursor-pointer">Musyawarah Perencanaan Pembangunan Desa...</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-3">
                        Pemerintah Desa Resapombo bersama dinas pertanian kabupaten resmi membuka jalur...
                    </p>
                    <div class="flex items-center justify-between gap-3 text-sm border-t border-[#E9ECEF] pt-4 mt-auto">
                        <span class="text-slate-500 font-medium">Tim Redaksi Desa</span>
                        <a href="#" class="text-[#286B39] font-bold flex items-center gap-1 hover:gap-2 transition-all">
                            Baca Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </article>

                <!-- Card 2 -->
                <article class="bg-white rounded-3xl border border-[#E9ECEF] p-5 shadow-sm hover:shadow-lg transition-shadow duration-300">
                    <div class="rounded-2xl overflow-hidden aspect-[4/3] mb-5 relative bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?q=80&w=600&auto=format&fit=crop" alt="Berita 2" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 bg-[#E7F3EA] text-[#286B39] text-xs font-bold px-3 py-1 rounded-full z-10">Pembangunan</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-slate-500 mb-3 font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        15 Oktober 2024
                    </div>
                    <h3 class="text-xl font-bold text-slate-950 mb-3 leading-tight line-clamp-2 hover:text-[#286B39] transition-colors cursor-pointer">Sosialisasi Anggaran Pendapatan dan Belanja Desa (APBDes) 2025</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-3">
                        Pemerintah Desa memaparkan rencana penggunaan anggaran untuk pembangunan infrastruktur desa...
                    </p>
                    <div class="flex items-center justify-between gap-3 text-sm border-t border-[#E9ECEF] pt-4 mt-auto">
                        <span class="text-slate-500 font-medium">Kasi Perencanaan</span>
                        <a href="#" class="text-[#286B39] font-bold flex items-center gap-1 hover:gap-2 transition-all">
                            Baca Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </article>

                <!-- Card 3 -->
                <article class="bg-white rounded-3xl border border-[#E9ECEF] p-5 shadow-sm hover:shadow-lg transition-shadow duration-300">
                    <div class="rounded-2xl overflow-hidden aspect-[4/3] mb-5 relative bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=600&auto=format&fit=crop" alt="Berita 3" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 bg-[#E7F3EA] text-[#286B39] text-xs font-bold px-3 py-1 rounded-full z-10">Pengumuman</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-slate-500 mb-3 font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        15 Oktober 2024
                    </div>
                    <h3 class="text-xl font-bold text-slate-950 mb-3 leading-tight line-clamp-2 hover:text-[#286B39] transition-colors cursor-pointer">Jadwal Rapat Dusun dan Sosialisasi Program Desa di Wilayah Blitar</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-3">
                        Diharapkan seluruh warga dapat menghadiri rapat dusun untuk memberikan masukan terhadap...
                    </p>
                    <div class="flex items-center justify-between gap-3 text-sm border-t border-[#E9ECEF] pt-4 mt-auto">
                        <span class="text-slate-500 font-medium">Sekretaris Desa</span>
                        <a href="#" class="text-[#286B39] font-bold flex items-center gap-1 hover:gap-2 transition-all">
                            Baca Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </article>

            </div>
        </div>

    </main>

    <!-- Komponen Footer -->
    <x-footer />

    <!-- Link CDN Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Script Inisialisasi Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 24, // Jarak antar slide
            centeredSlides: true,
            loop: true, // Mengulang slide dari awal
            grabCursor: true, // Ubah kursor jadi ikon tangan
            
            // Konfigurasi Autoplay (Slide Otomatis)
            autoplay: {
                delay: 10000, // Geser otomatis tiap 10 detik
                disableOnInteraction: false, // Tetap autoplay setelah digeser manual
            },
            
            // Konfigurasi Titik/Bullets di bawah
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
</body>
</html>
