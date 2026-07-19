<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Resapombo - BUMDes</title>
    <!-- Pastikan Tailwind CSS sudah dikonfigurasi di project Laravel Anda -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Sembunyikan scrollbar untuk slider agar terlihat lebih rapi */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="font-sans text-gray-800 antialiased bg-gray-50">

    <!-- DATA MOCKUP (Disarankan dipindah ke Controller) -->
    @php
        // Ubah jumlah array ini untuk mengetes fitur slider (>3) atau statis (<=3)
        $units = [
            ['title' => 'Unit Toko Desa', 'image' => 'https://images.unsplash.com/photo-1604719312566-8912e9227c6a?auto=format&fit=crop&w=600&q=80', 'features' => ['Penyediaan Kebutuhan Pokok', 'Penyaluran Pupuk Subsidi']],
            ['title' => 'Unit Toko Desa', 'image' => 'https://images.unsplash.com/photo-1604719312566-8912e9227c6a?auto=format&fit=crop&w=600&q=80', 'features' => ['Penyediaan Kebutuhan Pokok', 'Penyaluran Pupuk Subsidi']],
            ['title' => 'Unit Toko Desa', 'image' => 'https://images.unsplash.com/photo-1604719312566-8912e9227c6a?auto=format&fit=crop&w=600&q=80', 'features' => ['Penyediaan Kebutuhan Pokok', 'Penyaluran Pupuk Subsidi']],
            // Hapus komentar pada array di bawah ini untuk melihat mode slider
            // ['title' => 'Unit Jasa Pertanian', 'image' => 'https://images.unsplash.com/photo-1596404984931-4a7b53de3fb9?auto=format&fit=crop&w=600&q=80', 'features' => ['Penyewaan Traktor', 'Konsultasi Panen']],
        ];
    @endphp

    <!-- NAVBAR -->
    <nav class="bg-white px-6 py-4 flex justify-between items-center shadow-sm sticky top-0 z-50">
        <div class="text-green-800 font-bold text-xl">Desa Resapombo</div>
        <!-- Menu Desktop -->
        <ul class="hidden md:flex space-x-6 text-sm text-gray-600">
            <li><a href="#" class="hover:text-green-700">Home</a></li>
            <li><a href="#" class="hover:text-green-700">Profil</a></li>
            <li><a href="#" class="hover:text-green-700">Pemerintahan</a></li>
            <li><a href="#" class="text-green-700 font-semibold border-b-2 border-green-700 pb-1">Potensi</a></li>
            <li><a href="#" class="hover:text-green-700">BUMDes</a></li>
            <li><a href="#" class="hover:text-green-700">Berita</a></li>
            <li><a href="#" class="hover:text-green-700">FAQ</a></li>
        </ul>
        <!-- Hamburger (Mobile) -->
        <button class="md:hidden text-gray-600 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
    </nav>

    <!-- HERO SECTION -->
    <section class="relative bg-cover bg-center h-[500px] flex items-center justify-center text-center px-4" style="background-image: url('https://images.unsplash.com/photo-1596404984931-4a7b53de3fb9?auto=format&fit=crop&w=1920&q=80');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="relative z-10 max-w-2xl text-white">
            <span class="px-3 py-1 text-xs font-semibold tracking-wider uppercase bg-white/20 rounded-full border border-white/50 mb-4 inline-block">Badan Usaha Milik Desa</span>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">BUMDes Maju Resapombo</h1>
            <p class="text-sm md:text-base text-gray-200">Mendorong kemandirian ekonomi desa melalui pengelolaan potensi lokal yang berkelanjutan, profesional, dan transparan untuk kesejahteraan seluruh masyarakat.</p>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section class="max-w-7xl mx-auto px-6 py-16">
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

    <!-- UNIT USAHA SECTION (WITH SLIDER LOGIC) -->
    <section class="max-w-7xl mx-auto px-6 py-10">
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

        @if(count($units) > 3)
            <!-- MODE SLIDER (Untuk >3 item) -->
            <div class="flex overflow-x-auto gap-6 snap-x hide-scrollbar pb-6 cursor-grab active:cursor-grabbing" id="unit-slider">
                @foreach($units as $unit)
                    <div class="min-w-[320px] bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden snap-center flex-shrink-0">
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
                            <a href="#" class="block w-full text-center bg-green-700 hover:bg-green-800 text-white py-2 rounded-lg text-sm font-semibold transition flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 0C5.397 0 0 5.393 0 12.023c0 2.128.555 4.195 1.611 6.015L.171 24l6.111-1.603A11.93 11.93 0 0012.031 24c6.632 0 12.029-5.394 12.029-12.023C24.06 5.393 18.663 0 12.031 0zm3.327 17.26c-.156.44-3.007 1.838-3.007 1.838s-2.022.42-4.993-1.688c-2.97-2.106-3.326-5.46-3.326-5.46s-.11-1.398 1.053-2.585c0 0 .61-.73 1.396-.73s1.29.02 1.29.02c.328.02.775.14.994.66.219.52 1.01 2.457 1.01 2.457s.138.318.02.658c-.117.34-.37.52-.37.52s-1.077 1.26-1.155 1.34c-.078.08 2.05 3.393 4.298 3.733 0 0 .392-.12.59-.34.196-.22 1.39-1.678 1.39-1.678s.256-.28.627-.14c.37.14 2.348 1.1 2.348 1.1s.412.18.49.52c.078.34-.157.94-.313 1.38z"></path></svg>
                                Hubungi Pengelola
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- MODE STATIS (Untuk <= 3 item) -->
            <!-- Pada mobile akan tetap menurun (grid-cols-1), pada desktop berjajar (md:grid-cols-X) -->
            <div class="grid grid-cols-1 md:grid-cols-{{ count($units) }} gap-6">
                @foreach($units as $unit)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
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
                            <a href="#" class="block w-full text-center bg-green-700 hover:bg-green-800 text-white py-2 rounded-lg text-sm font-semibold transition flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 0C5.397 0 0 5.393 0 12.023c0 2.128.555 4.195 1.611 6.015L.171 24l6.111-1.603A11.93 11.93 0 0012.031 24c6.632 0 12.029-5.394 12.029-12.023C24.06 5.393 18.663 0 12.031 0zm3.327 17.26c-.156.44-3.007 1.838-3.007 1.838s-2.022.42-4.993-1.688c-2.97-2.106-3.326-5.46-3.326-5.46s-.11-1.398 1.053-2.585c0 0 .61-.73 1.396-.73s1.29.02 1.29.02c.328.02.775.14.994.66.219.52 1.01 2.457 1.01 2.457s.138.318.02.658c-.117.34-.37.52-.37.52s-1.077 1.26-1.155 1.34c-.078.08 2.05 3.393 4.298 3.733 0 0 .392-.12.59-.34.196-.22 1.39-1.678 1.39-1.678s.256-.28.627-.14c.37.14 2.348 1.1 2.348 1.1s.412.18.49.52c.078.34-.157.94-.313 1.38z"></path></svg>
                                Hubungi Pengelola
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    <!-- CALL TO ACTION SECTION -->
    <section class="max-w-7xl mx-auto px-6 py-10">
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

    <!-- FOOTER -->
    <footer class="bg-green-900 text-white mt-10 rounded-t-3xl mx-4 md:mx-10 mb-4 pb-6">
        <div class="max-w-7xl mx-auto px-6 pt-12 pb-8 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h4 class="text-lg font-bold mb-4">Desa Resapombo</h4>
                <p class="text-sm text-green-200 leading-relaxed">Membangun desa mandiri, transparan, dan sejahtera untuk seluruh masyarakat.</p>
            </div>
            <div>
                <h4 class="text-lg font-bold mb-4">Pemerintahan</h4>
                <ul class="space-y-2 text-sm text-green-200">
                    <li><a href="#" class="hover:text-white transition">Profil Desa</a></li>
                    <li><a href="#" class="hover:text-white transition">Transparansi</a></li>
                    <li><a href="#" class="hover:text-white transition">Layanan Publik</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-bold mb-4">Informasi</h4>
                <ul class="space-y-2 text-sm text-green-200">
                    <li><a href="#" class="hover:text-white transition">Peta Wilayah</a></li>
                    <li><a href="#" class="hover:text-white transition">Kontak Darurat</a></li>
                    <li><a href="#" class="hover:text-white transition">Berita Desa</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-bold mb-4">Kontak</h4>
                <p class="text-sm text-green-200 mb-2">Jl. Raya Desa Resapombo No. 1, Kec. Doko, Kab. Blitar</p>
                <p class="text-sm text-green-200">info@resapombo.desa.id</p>
            </div>
        </div>
        <div class="text-center text-sm text-green-400/60 pt-4 border-t border-green-800/50">
            &copy; 2024 Pemerintah Desa Resapombo. All Rights Reserved.
        </div>
    </footer>

    <!-- JAVASCRIPT: Logic untuk Drag Slider pada Desktop -->
    <script>
        const slider = document.getElementById('unit-slider');
        
        if(slider) {
            let isDown = false;
            let startX;
            let scrollLeft;

            slider.addEventListener('mousedown', (e) => {
                isDown = true;
                slider.classList.add('active');
                startX = e.pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
            });
            slider.addEventListener('mouseleave', () => {
                isDown = false;
                slider.classList.remove('active');
            });
            slider.addEventListener('mouseup', () => {
                isDown = false;
                slider.classList.remove('active');
            });
            slider.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                const walk = (x - startX) * 2; // Kecepatan scroll
                slider.scrollLeft = scrollLeft - walk;
            });
        }
    </script>
</body>
</html>