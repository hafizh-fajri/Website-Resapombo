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

    <!-- DATA MOCKUP (Disarankan dipindah ke Controller) -->
    @php
        // Saya menambahkan data dummy ke-4 dan ke-5 agar fitur "Extend" (Lebih dari 3) muncul dan bisa ditest
        $units = [
            ['title' => 'Unit Toko Desa', 'image' => 'https://images.unsplash.com/photo-1604719312566-8912e9227c6a?auto=format&fit=crop&w=600&q=80', 'features' => ['Penyediaan Kebutuhan Pokok', 'Penyaluran Pupuk Subsidi']],
            ['title' => 'Unit Pengelolaan Air', 'image' => 'https://images.unsplash.com/photo-1604719312566-8912e9227c6a?auto=format&fit=crop&w=600&q=80', 'features' => ['Distribusi Air Bersih', 'Perawatan Saluran']],
            ['title' => 'Unit Simpan Pinjam', 'image' => 'https://images.unsplash.com/photo-1604719312566-8912e9227c6a?auto=format&fit=crop&w=600&q=80', 'features' => ['Pinjaman Modal Usaha', 'Tabungan Warga']],
            ['title' => 'Unit Jasa Pertanian', 'image' => 'https://images.unsplash.com/photo-1596404984931-4a7b53de3fb9?auto=format&fit=crop&w=600&q=80', 'features' => ['Penyewaan Traktor', 'Konsultasi Panen']],
            ['title' => 'Unit Pariwisata', 'image' => 'https://images.unsplash.com/photo-1596404984931-4a7b53de3fb9?auto=format&fit=crop&w=600&q=80', 'features' => ['Pengelolaan Tiket', 'Pusat Oleh-Oleh']],
        ];
    @endphp

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
        <section class="py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 leading-snug">Motor Penggerak Ekonomi<br>Desa</h2>
                <div>
                    <p class="text-gray-600 mb-4 text-sm md:text-base leading-relaxed">
                        Desa Resapombo adalah sebuah desa agraris yang terletak di dataran tinggi yang subur. Dikenal dengan keramahan warganya dan kekayaan alam yang melimpah, desa ini terus berkembang menjadi desa mandiri yang mempertahankan nilai-nilai gotong royong.
                    </p>
                    <p class="text-gray-600 mb-8 text-sm md:text-base leading-relaxed">
                        Pemerintah Desa berkomitmen untuk terus meningkatkan pelayanan publik, transparansi informasi, serta mendorong pemberdayaan ekonomi lokal melalui BUMDes dan pengembangan UMKM.
                    </p>
                    <div class="flex gap-8">
                        <div>
                            <div class="text-2xl font-bold text-green-700">4</div>
                            <div class="text-xs text-gray-500 font-semibold uppercase tracking-wider">Unit Usaha Aktif</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-green-700">50+</div>
                            <div class="text-xs text-gray-500 font-semibold uppercase tracking-wider">Mitra Lokal</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- UNIT USAHA SECTION (GRID & SLIDE DOWN LOGIC) -->
        <section class="py-10">
            <div class="text-center mb-10">
                <div class="inline-block border-t-2 border-green-600 w-8 mb-2"></div>
                <p class="text-green-700 font-semibold text-sm mb-1">BUMDes</p>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Unit Usaha Kami</h2>
                <p class="text-gray-500 text-sm">Pilar-pilar bisnis yang menopang pertumbuhan desa.</p>
                
                <!-- Search Bar -->
                <div class="mt-6 max-w-md mx-auto relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" placeholder="Cari Berita dan Artikel" class="w-full pl-10 pr-4 py-2 bg-gray-100 border-none rounded-full focus:ring-2 focus:ring-green-600 focus:outline-none text-sm">
                </div>
            </div>

            <!-- 3 Card Utama (Selalu Tampil) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach(array_slice($units, 0, 3) as $unit)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                        <img src="{{ $unit['image'] }}" alt="{{ $unit['title'] }}" class="w-full h-48 object-cover">
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">{{ $unit['title'] }}</h3>
                            <ul class="space-y-2 mb-6">
                                @foreach($unit['features'] as $feature)
                                    <li class="flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-green-600 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                        {{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                            <button class="w-full flex items-center justify-center bg-green-700 hover:bg-green-800 text-white font-medium py-2.5 px-4 rounded-lg transition-colors text-sm">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 0C5.397 0 0 5.393 0 12.023c0 2.128.555 4.195 1.611 6.015L.171 24l6.111-1.603A11.93 11.93 0 0012.031 24c6.632 0 12.029-5.394 12.029-12.023C24.06 5.393 18.663 0 12.031 0zm3.327 17.26c-.156.44-3.007 1.838-3.007 1.838s-2.022.42-4.993-1.688c-2.97-2.106-3.326-5.46-3.326-5.46s-.11-1.398 1.053-2.585c0 0 .61-.73 1.396-.73s1.29.02 1.29.02c.328.02.775.14.994.66.219.52 1.01 2.457 1.01 2.457s.138.318.02.658c-.117.34-.37.52-.37.52s-1.077 1.26-1.155 1.34c-.078.08 2.05 3.393 4.298 3.733 0 0 .392-.12.59-.34.196-.22 1.39-1.678 1.39-1.678s.256-.28.627-.14c.37.14 2.348 1.1 2.348 1.1s.412.18.49.52c.078.34-.157.94-.313 1.38z"></path></svg>
                                Hubungi Pengelola
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Sisa Card (Disembunyikan secara default, Muncul saat Extend ditekan) -->
            @if(count($units) > 3)
                <div id="more-cards" class="slide-content grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                    @foreach(array_slice($units, 3) as $unit)
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                            <img src="{{ $unit['image'] }}" alt="{{ $unit['title'] }}" class="w-full h-48 object-cover">
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-900 mb-4">{{ $unit['title'] }}</h3>
                                <ul class="space-y-2 mb-6">
                                    @foreach($unit['features'] as $feature)
                                        <li class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 text-green-600 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                            {{ $feature }}
                                        </li>
                                    @endforeach
                                </ul>
                                <button class="w-full flex items-center justify-center bg-green-700 hover:bg-green-800 text-white font-medium py-2.5 px-4 rounded-lg transition-colors text-sm">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 0C5.397 0 0 5.393 0 12.023c0 2.128.555 4.195 1.611 6.015L.171 24l6.111-1.603A11.93 11.93 0 0012.031 24c6.632 0 12.029-5.394 12.029-12.023C24.06 5.393 18.663 0 12.031 0zm..."></path></svg>
                                    Hubungi Pengelola
                                </button>
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
                    <a href="#" class="bg-white text-green-800 font-semibold py-2.5 px-6 rounded-lg text-center text-sm flex items-center justify-center hover:bg-gray-100 transition">
                        Chat Via Whatsapp
                    </a>
                </div>
                <!-- Card 2 -->
                <div class="bg-white border border-gray-200 rounded-2xl p-8 flex flex-col justify-between shadow-sm">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Profil Perusahaan</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">Unduh dokumen resmi Profil BUMDes Maju untuk informasi lengkap mengenai legalitas, struktur organisasi, dan laporan tahunan.</p>
                    </div>
                    <a href="#" class="bg-green-800 text-white font-semibold py-2.5 px-6 rounded-lg text-center text-sm flex items-center justify-center hover:bg-green-900 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Unduh PDF (2.4 MB)
                    </a>
                </div>
            </div>
        </section>
    </main>
    <!-- ABOUT SECTION -->
    

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