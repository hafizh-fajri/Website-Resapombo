<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Resapombo - BUMDes</title>
    <!-- Pastikan Tailwind CSS sudah dikonfigurasi di project Laravel Anda -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-green': '#166534', /* Hijau gelap standar */
                        'brand-green-light': '#22c55e',
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom transisi untuk efek slide kebawah yang mulus pada tombol extend */
        .slide-content {
            transition: max-height 0.5s ease-in-out, opacity 0.4s ease-in-out;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
        }
        .slide-content.open {
            max-height: 2000px; /* Nilai cukup besar untuk menampung baris tambahan */
            opacity: 1;
        }
    </style>
</head>
<body class="font-sans text-gray-800 antialiased bg-gray-50">

    <!-- NAVBAR -->
    <x-navbar />

    <!-- HERO SECTION -->
    <section class="relative bg-cover bg-center h-[500px] flex items-center justify-center text-center px-4" style="background-image: url('https://images.unsplash.com/photo-1589182373726-e4f658ab50f0?q=80&w=2000&auto=format&fit=crop');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="relative z-10 max-w-2xl text-white">
            <span class="px-3 py-1 text-xs font-semibold tracking-wider uppercase bg-white/20 rounded-full border border-white/50 mb-4 inline-block">Badan Usaha Milik Desa</span>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">BUMDes Maju Resapombo</h1>
            <p class="text-sm md:text-base text-gray-200">Mendorong kemandirian ekonomi desa melalui pengelolaan potensi lokal yang berkelanjutan, profesional, dan transparan untuk kesejahteraan seluruh masyarakat.</p>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- TENTANG BUMDES SECTION -->
        <section class="py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 leading-snug">Motor Penggerak Ekonomi<br>Desa</h2>
                <div>
                    <p class="text-gray-600 mb-4 text-sm md:text-base leading-relaxed">
                        Desa Resapombo adalah sebuah desa agraris yang terletak di dataran tinggi yang subur. Dikenal dengan keramahan warganya dan kekayaan alam yang melimpah, desa ini terus berkembang menjadi desa mandiri yang mempertahankan nilai-nilai gotong royong.
                    </p>
                    <p class="text-gray-600 mb-8 text-sm md:text-base leading-relaxed">
                        Pemerintah Desa berkomitmen untuk terus meningkatkan pelayanan publik, transparansi informasi, serta mendorong pemberdayaan ekonomi lokal melalui BUMDes dan pengembangan UMKM.
                    </p>
                    <div class="flex gap-8">
                        <div class="text-center">
                            <!-- Variabel dari Controller -->
                            <div class="center text-2xl font-bold text-green-700">{{ $totalUnitUsaha ?? 0 }}</div>
                            <div class="text-xs text-gray-500 font-semibold uppercase tracking-wider">Unit Usaha Aktif</div>
                        </div>
                        <div class="text-center">
                            <!-- Variabel dari Controller -->
                            <div class="text-2xl font-bold text-green-700">{{ $totalMitra ?? 0 }}+</div>
                            <div class="text-xs text-gray-500 font-semibold uppercase tracking-wider">Mitra Lokal</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- UNIT USAHA SECTION (GRID & SLIDE DOWN LOGIC & SEARCH) -->
        <section class="py-10">
            <div class="text-center mb-10">
                <div class="inline-block border-t-2 border-green-600 w-8 mb-2"></div>
                <p class="text-green-700 font-semibold text-sm mb-1">BUMDes</p>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Unit Usaha Kami</h2>
                <p class="text-gray-500 text-sm">Pilar-pilar bisnis yang menopang pertumbuhan desa.</p>
                
                <!-- Search Bar -->
                <form action="{{ route('bumdes') }}" method="GET" class="mt-6 max-w-md mx-auto relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Unit Usaha atau Deskripsi..." class="w-full pl-10 pr-4 py-2 bg-gray-100 border-none rounded-full focus:ring-2 focus:ring-green-600 focus:outline-none text-sm">
                </form>
            </div>

            <!-- Cek apakah data BUMDes hasil pencarian ada -->
            @if($bumdes->isEmpty())
                <div class="mt-12 text-center py-10 bg-white rounded-xl border border-gray-100 shadow-sm">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">Unit Usaha tidak ditemukan</h3>
                    <p class="mt-1 text-gray-500">Kami tidak dapat menemukan apa yang Anda cari dengan kata kunci "<span class="font-semibold">{{ request('search') }}</span>".</p>
                    <a href="{{ route('bumdes') }}" class="mt-4 inline-block text-green-600 hover:text-green-700 font-medium bg-green-50 px-4 py-2 rounded-lg transition">Lihat Semua Unit Usaha</a>
                </div>
            @else
                <!-- 3 Card Utama (Selalu Tampil) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
                    @foreach($bumdes->take(3) as $unit)
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                            <!-- Menggunakan asset() untuk memanggil gambar -->
                            <img src="{{ asset($unit->gambar) }}" alt="{{ $unit->nama }}" class="w-full h-48 object-cover">
                            <div class="p-5">
                                <span class=" bg-[#E7F3EA] text-[#286B39] text-xs font-bold px-3 py-1 rounded-full mb-4 inline-block">
                                    {{ $unit->kategori ?? 'Unit Usaha' }}
                                </span>
                                <h3 class="text-xl font-bold text-gray-900 mb-4">{{ $unit->nama }}</h3>
                                <p class="text-gray-600 text-sm">{{ Str::limit($unit->deskripsi, 100) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Sisa Card (Disembunyikan secara default, Muncul saat Extend ditekan) -->
                @if($bumdes->count() > 3)
                    <div id="more-cards" class="slide-content grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                        @foreach($bumdes->skip(3) as $unit)
                            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                                <img src="{{ asset($unit->gambar) }}" alt="{{ $unit->nama }}" class="w-full h-48 object-cover">
                                <div class="p-5">
                                    <span class=" bg-[#E7F3EA] text-[#286B39] text-xs font-bold px-3 py-1 rounded-full mb-4 inline-block">
                                        {{ $unit->kategori ?? 'Unit Usaha' }}
                                    </span>
                                    <h3 class="text-lg font-bold text-gray-900 mb-4">{{ $unit->nama }}</h3>
                                    <p class="text-gray-600 text-sm">{{ Str::limit($unit->deskripsi, 100) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Tombol Toggle Extend -->
                    <div class="mt-10 text-center">
                        <button id="toggle-btn" class="inline-flex items-center px-6 py-2.5 border border-green-700 text-green-700 font-semibold rounded-full hover:bg-green-50 transition-colors focus:outline-none text-sm">
                            <span>Lihat Lebih Banyak</span>
                            <svg id="toggle-icon" class="ml-2 w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </div>
                @endif
            @endif
        </section>

        <!-- CALL TO ACTION SECTION -->
        <section class="py-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Card 1 -->
                <div class="bg-green-800 rounded-2xl p-8 text-white flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-bold mb-3">Peluang Kerjasama</h3>
                        <p class="text-green-100 text-sm leading-relaxed mb-6">Kami terbuka untuk kemitraan strategis dalam pengembangan potensi desa. Diskusikan peluang bersama tim pengurus BUMDes.</p>
                    </div>
                    @php
                        // Memastikan nomor WA ada (mengambil dari item pertama jika koleksi ada, atau default)
                        $waNumber = $kontak->no_wa ?? '6281234567890';
                    @endphp
                    <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="bg-white text-green-800 font-semibold py-2.5 px-6 rounded-lg text-center text-sm flex items-center justify-center hover:bg-gray-100 transition">
                        Chat Via Whatsapp
                    </a>
                </div>
                <!-- Card 2 -->
                <div class="bg-white border border-gray-200 rounded-2xl p-8 flex flex-col justify-between shadow-sm">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Profil Perusahaan</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">Lihat dokumen resmi Profil BUMDes Maju untuk informasi lengkap mengenai legalitas, struktur organisasi, dan laporan tahunan.</p>
                    </div>
                    <!-- Ganti '#' dengan route menuju file PDF/Dokumen profil Anda -->
                    <a href="{{ asset($kontak->file_profil) }}" class="bg-green-800 text-white font-semibold py-2.5 px-6 rounded-lg text-center text-sm flex items-center justify-center hover:bg-green-900 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Lihat Dokumen
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <x-footer />

    <!-- SCRIPT TUKAR SLIDER MENJADI TOGGLE EXTEND -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggle-btn');
            const moreCards = document.getElementById('more-cards');
            const toggleIcon = document.getElementById('toggle-icon');

            if (toggleBtn && moreCards) {
                toggleBtn.addEventListener('click', function() {
                    const isOpen = moreCards.classList.toggle('open');
                    
                    if (isOpen) {
                        toggleBtn.querySelector('span').textContent = 'Sembunyikan';
                        toggleIcon.classList.add('rotate-180');
                    } else {
                        toggleBtn.querySelector('span').textContent = 'Lihat Lebih Banyak';
                        toggleIcon.classList.remove('rotate-180');
                    }
                });
            }
        });
    </script>
</body>
</html>