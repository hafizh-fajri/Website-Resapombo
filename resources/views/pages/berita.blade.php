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
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        
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
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6 mb-12 relative">
            
            <!-- Bagian Kategori -->
            <div class="relative flex-1 w-full overflow-hidden transition-all duration-300 ease-in-out max-h-[42px]" id="category-container">
                <div class="flex flex-wrap items-center gap-3 pr-12" id="category-list">
                    <!-- Default Kategori (Semua) -->
                    <a href="{{ url()->current() }}{{ $search ? '?search='.$search : '' }}" 
                       class="whitespace-nowrap px-5 py-2 rounded-full text-sm font-medium {{ !$kategoriId ? 'bg-[#0F5132] text-white' : 'bg-[#F1F3F5] text-slate-700 hover:bg-[#E2E6EA]' }} transition">
                        Semua
                    </a>
                    
                    <!-- Looping Kategori dari Database -->
                    @foreach($kategori as $kat)
                        <a href="{{ url()->current() }}?kategori={{ $kat->id }}{{ $search ? '&search='.$search : '' }}" 
                           class="whitespace-nowrap px-5 py-2 rounded-full text-sm font-medium {{ $kategoriId == $kat->id ? 'bg-[#0F5132] text-white' : 'bg-[#F1F3F5] text-slate-700 hover:bg-[#E2E6EA]' }} transition">
                            {{ $kat->nama }}
                        </a>
                    @endforeach
                </div>

                <!-- Tombol Titik Tiga (Expand) -->
                <button id="toggle-category-btn" class="hidden absolute top-0 right-0 h-[42px] px-2 bg-gradient-to-l from-white via-white to-transparent text-slate-500 hover:text-slate-800 items-center justify-center transition-colors">
                    <svg id="icon-dots" class="w-6 h-6 ml-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                    </svg>
                    <svg id="icon-up" class="w-5 h-5 ml-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                    </svg>
                </button>
            </div>

            <!-- Input Pencarian -->
            <form action="{{ url()->current() }}" method="GET" class="relative w-full md:w-80 shrink-0">
                @if($kategoriId)
                    <input type="hidden" name="kategori" value="{{ $kategoriId }}">
                @endif
                <input type="text" name="search" value="{{ $search }}" placeholder="Cari Berita dan Artikel" class="w-full bg-[#F8F9FA] border border-[#E9ECEF] rounded-full px-5 py-2.5 pr-12 text-sm focus:border-[#286B39] focus:outline-none focus:ring-1 focus:ring-[#286B39] transition">
                <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-[#286B39] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </form>
        </div>

        
        <!-- Jika TIDAK ADA pencarian, tampilkan slider highlight -->
        @if(!$search)
            <!-- ========================================= -->
            <!-- Bagian Highlight Berita (Slider Berita Terbaru) -->
            <!-- ========================================= -->
            <div class="mb-16 relative">
                <div class="swiper mySwiper rounded-3xl border border-[#E9ECEF] shadow-sm">
                    <div class="swiper-wrapper">
                        @forelse($beritaTerbaru as $highlight)
                            @php
                                // Cek kondisi link eksternal
                                $urlHighlight = $highlight->link_eksternal ? $highlight->link_eksternal : route('berita.detail', $highlight->id);
                                $targetHighlight = $highlight->link_eksternal ? '_blank' : '_self';
                            @endphp
                            <div class="swiper-slide bg-white">
                                <!-- Seluruh card dibungkus tag <a> agar bisa di-klik -->
                                <a href="{{ $urlHighlight }}" target="{{ $targetHighlight }}" class="group grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-10 p-5 md:p-8 block w-full h-full">
                                    <div class="md:col-span-6 lg:col-span-7 rounded-2xl overflow-hidden aspect-[4/3] md:aspect-video relative bg-slate-100">
                                        <!-- Animasi zoom pada gambar saat card di-hover (group-hover) -->
                                        <img src="{{ asset($highlight->gambar) }}" alt="{{ $highlight->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        <span class="absolute top-4 left-4 bg-[#E7F3EA] text-[#286B39] text-xs font-bold px-3 py-1.5 rounded-full z-10 shadow-sm">
                                            {{ $highlight->kategori->nama }}
                                        </span>
                                    </div>
                                    
                                    <div class="md:col-span-6 lg:col-span-5 flex flex-col justify-center py-2">
                                        <div>
                                            <div class="flex items-center gap-2 text-sm text-slate-500 mb-3 font-medium">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                                {{ \Carbon\Carbon::parse($highlight->tanggal)->translatedFormat('d F Y') }} &bull; Oleh: {{ $highlight->penulis }}
                                            </div>
                                            <!-- Efek warna judul saat card di-hover -->
                                            <h3 class="text-2xl md:text-3xl font-bold text-slate-950 mb-4 leading-tight group-hover:text-[#286B39] transition-colors">{{ $highlight->judul }}</h3>
                                            <p class="text-slate-600 text-base leading-relaxed mb-8 line-clamp-3 md:line-clamp-4">
                                                {{ Str::limit(strip_tags($highlight->isi), 180) }}
                                            </p>
                                        </div>
                                        <div>
                                            <!-- Tombol diganti menjadi div (bukan a) karena induknya sudah menggunakan tag <a> -->
                                            <div class="inline-flex items-center gap-2 bg-[#0F5132] text-white px-6 py-3 rounded-xl text-sm font-semibold group-hover:bg-[#146C43] transition-colors shadow-sm">
                                                Baca Selengkapnya
                                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="swiper-slide p-10 text-center text-slate-500 bg-white">
                                Belum ada berita highlight yang ditambahkan.
                            </div>
                        @endforelse
                    </div>
                    <div class="swiper-pagination !-bottom-5"></div>
                </div>
            </div>
        @else
            <!-- Jika ADA pencarian, sembunyikan slider dan tampilkan info pencarian -->
            <div class="mb-8 p-4 bg-[#E7F3EA] rounded-xl border border-[#286B39]/20 flex justify-between items-center">
                <p class="text-slate-800 font-medium">
                    Menampilkan hasil pencarian untuk: <span class="font-bold text-[#0F5132]">"{{ $search }}"</span>
                </p>
                <a href="{{ url()->current() }}{{ $kategoriId ? '?kategori='.$kategoriId : '' }}" class="text-sm font-semibold text-red-600 hover:text-red-700 underline">
                    Batalkan Pencarian
                </a>
            </div>
        @endif

        <!-- ========================================= -->
        <!-- Bagian Berita Biasa (Grid Card Kecil) -->
        <!-- ========================================= -->
        <div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                
                {{-- Looping untuk Berita Reguler --}}
                @forelse($berita as $item)
                    @php
                        // Cek kondisi link eksternal
                        $urlItem = $item->link_eksternal ? $item->link_eksternal : route('berita.detail', $item->id);
                        $targetItem = $item->link_eksternal ? '_blank' : '_self';
                    @endphp
                    
                    <!-- Seluruh elemen dibungkus menggunakan tag <a> dengan class group -->
                    <a href="{{ $urlItem }}" target="{{ $targetItem }}" class="group block bg-white rounded-3xl border border-[#E9ECEF] p-5 shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col h-full hover:-translate-y-1">
                        <div class="rounded-2xl overflow-hidden aspect-[4/3] mb-5 relative bg-slate-100 shrink-0">
                            <!-- Efek zoom gambar dikontrol oleh group-hover -->
                            <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-3 left-3 bg-[#E7F3EA] text-[#286B39] text-xs font-bold px-3 py-1 rounded-full z-10">
                                {{ $item->kategori->nama }}
                            </span>
                        </div>
                        
                        <div class="flex items-center gap-2 text-sm text-slate-500 mb-3 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                        </div>
                        
                        <!-- Perubahan warna judul saat di-hover (diatur melalui group-hover) -->
                        <h3 class="text-xl font-bold text-slate-950 mb-3 leading-tight line-clamp-2 group-hover:text-[#286B39] transition-colors cursor-pointer">
                            {{ $item->judul }}
                        </h3>
                        
                        <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-3">
                            {{ Str::limit(strip_tags($item->isi), 120) }}
                        </p>
                        
                        <div class="flex items-center justify-between gap-3 text-sm border-t border-[#E9ECEF] pt-4 mt-auto">
                            <span class="text-slate-500 font-medium">{{ $item->penulis }}</span>
                            <!-- Mengubah dari <a> menjadi <span> agar tidak melanggar aturan nested links di HTML -->
                            <span class="text-[#286B39] font-bold flex items-center gap-1 group-hover:gap-2 transition-all">
                                Baca Selengkapnya
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center py-12 text-slate-500 bg-white rounded-3xl border border-[#E9ECEF] flex flex-col items-center justify-center">
                        <svg class="w-12 h-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        @if($search)
                            Tidak ada berita yang ditemukan untuk pencarian "<strong>{{ $search }}</strong>".
                        @else
                            Belum ada berita yang tersedia.
                        @endif
                    </div>
                @endforelse

            </div>
        </div>

    </main>

    <!-- Komponen Footer -->
    <x-footer />

    <!-- Link CDN Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Script Logika Extend Kategori -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('category-container');
            const list = document.getElementById('category-list');
            const toggleBtn = document.getElementById('toggle-category-btn');
            const iconDots = document.getElementById('icon-dots');
            const iconUp = document.getElementById('icon-up');

            function checkOverflow() {
                if (list.scrollHeight > container.clientHeight) {
                    toggleBtn.classList.remove('hidden');
                    toggleBtn.classList.add('flex');
                } else {
                    toggleBtn.classList.add('hidden');
                    toggleBtn.classList.remove('flex');
                }
            }

            checkOverflow();
            window.addEventListener('resize', checkOverflow);

            toggleBtn.addEventListener('click', function() {
                if (container.classList.contains('max-h-[42px]')) {
                    container.classList.remove('max-h-[42px]');
                    container.classList.add('max-h-[500px]');
                    iconDots.classList.add('hidden');
                    iconUp.classList.remove('hidden');
                    toggleBtn.classList.remove('bg-gradient-to-l', 'from-white', 'via-white', 'to-transparent');
                    toggleBtn.classList.add('bg-white');
                } else {
                    container.classList.add('max-h-[42px]');
                    container.classList.remove('max-h-[500px]');
                    iconDots.classList.remove('hidden');
                    iconUp.classList.add('hidden');
                    toggleBtn.classList.add('bg-gradient-to-l', 'from-white', 'via-white', 'to-transparent');
                    toggleBtn.classList.remove('bg-white');
                }
            });
        });
    </script>

    <!-- Script Inisialisasi Swiper -->
    @if(!$search)
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 24,
            centeredSlides: true,
            loop: true,
            grabCursor: true,
            autoplay: {
                delay: 10000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
    @endif
</body>
</html>