<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Resapombo</title>
    
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
</head>
<body class="font-sans text-gray-800 antialiased bg-gray-50">

    <x-navbar />

    <section class="relative bg-cover bg-center h-[700px] flex items-center justify-center pt-20" style="background-image: url('https://images.unsplash.com/photo-1589182373726-e4f658ab50f0?q=80&w=2000&auto=format&fit=crop');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        
        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto mt-10">
            <span class="inline-block py-1 px-4 border border-white text-white rounded-full text-xs font-semibold tracking-wider mb-4 uppercase bg-white/20 backdrop-blur-sm">
                Website Desa Resapombo
            </span>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">Selamat Datang di<br>Desa Resapombo</h1>
            <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-2xl mx-auto">Mewujudkan desa yang mandiri, sejahtera, dan berbudaya melalui tata kelola pemerintahan yang transparan dan pengembangan potensi lokal yang berkelanjutan.</p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#" class="bg-brand-green hover:bg-green-800 text-white font-medium py-3 px-8 rounded-full transition flex items-center justify-center gap-2">
                    Jelajahi Potensi <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
                <a href="#" class="bg-white/20 backdrop-blur-sm hover:bg-white/30 border border-white text-white font-medium py-3 px-8 rounded-full transition flex items-center justify-center gap-2">
                    Hubungi Kami <img src="{{ asset('images/icon/wa.png') }}" alt="Icon" class="w-4 h-4">
                </a>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative -mt-16 z-20">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center transform transition hover:-translate-y-1">
                <div class="w-12 h-12 bg-green-100 text-brand-green rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.3.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path fill="#0d631b" d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/></svg>                
                </div>
                <h3 class="text-3xl font-bold text-gray-800">5.420</h3>
                <p class="text-xs text-gray-500 font-semibold mt-1 tracking-widest uppercase">Penduduk</p>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center transform transition hover:-translate-y-1">
                <div class="w-12 h-12 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.3.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path fill="#0088c7" d="M576 112C576 100.9 570.3 90.6 560.8 84.8C551.3 79 539.6 78.4 529.7 83.4L413.5 141.5L234.1 81.6C226 78.9 217.3 79.5 209.7 83.3L81.7 147.3C70.8 152.8 64 163.9 64 176L64 528C64 539.1 69.7 549.4 79.2 555.2C88.7 561 100.4 561.6 110.3 556.6L226.4 498.5L405.8 558.3C413.9 561 422.6 560.4 430.2 556.6L558.2 492.6C569 487.2 575.9 476.1 575.9 464L575.9 112zM256 440.9L256 156.4L384 199.1L384 483.6L256 440.9z"/></svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-800">850<span class="text-lg">ha</span></h3>
                <p class="text-xs text-gray-500 font-semibold mt-1 tracking-widest uppercase">Luas Wilayah</p>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center transform transition hover:-translate-y-1">
                <div class="w-12 h-12 bg-yellow-100 text-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.3.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path fill="#c3c300" d="M341.8 72.6C329.5 61.2 310.5 61.2 298.3 72.6L74.3 280.6C64.7 289.6 61.5 303.5 66.3 315.7C71.1 327.9 82.8 336 96 336L112 336L112 512C112 547.3 140.7 576 176 576L464 576C499.3 576 528 547.3 528 512L528 336L544 336C557.2 336 569 327.9 573.8 315.7C578.6 303.5 575.4 289.5 565.8 280.6L341.8 72.6zM304 384L336 384C362.5 384 384 405.5 384 432L384 528L256 528L256 432C256 405.5 277.5 384 304 384z"/></svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-800">6</h3>
                <p class="text-xs text-gray-500 font-semibold mt-1 tracking-widest uppercase">Dusun</p>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center transform transition hover:-translate-y-1">
                <div class="w-12 h-12 bg-teal-100 text-teal-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.3.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path fill="#0d631b" d="M352 64C316.7 64 288 92.7 288 128L288 160L240 160L240 88C240 74.7 229.3 64 216 64C202.7 64 192 74.7 192 88L192 160L128 160L128 88C128 74.7 117.3 64 104 64C90.7 64 80 74.7 80 88L80 162C52.4 169.1 32 194.2 32 224L32 512C32 547.3 60.7 576 96 576L544 576C579.3 576 608 547.3 608 512L608 320C608 284.7 579.3 256 544 256L480 256L480 128C480 92.7 451.3 64 416 64L352 64zM416 176L416 208C416 216.8 408.8 224 400 224L368 224C359.2 224 352 216.8 352 208L352 176C352 167.2 359.2 160 368 160L400 160C408.8 160 416 167.2 416 176zM400 256C408.8 256 416 263.2 416 272L416 304C416 312.8 408.8 320 400 320L368 320C359.2 320 352 312.8 352 304L352 272C352 263.2 359.2 256 368 256L400 256zM416 368L416 400C416 408.8 408.8 416 400 416L368 416C359.2 416 352 408.8 352 400L352 368C352 359.2 359.2 352 368 352L400 352C408.8 352 416 359.2 416 368zM528 352C536.8 352 544 359.2 544 368L544 400C544 408.8 536.8 416 528 416L496 416C487.2 416 480 408.8 480 400L480 368C480 359.2 487.2 352 496 352L528 352zM288 368L288 400C288 408.8 280.8 416 272 416L240 416C231.2 416 224 408.8 224 400L224 368C224 359.2 231.2 352 240 352L272 352C280.8 352 288 359.2 288 368zM272 256C280.8 256 288 263.2 288 272L288 304C288 312.8 280.8 320 272 320L240 320C231.2 320 224 312.8 224 304L224 272C224 263.2 231.2 256 240 256L272 256zM160 368L160 400C160 408.8 152.8 416 144 416L112 416C103.2 416 96 408.8 96 400L96 368C96 359.2 103.2 352 112 352L144 352C152.8 352 160 359.2 160 368zM144 256C152.8 256 160 263.2 160 272L160 304C160 312.8 152.8 320 144 320L112 320C103.2 320 96 312.8 96 304L96 272C96 263.2 103.2 256 112 256L144 256z"/></svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-800">850</h3>
                <p class="text-xs text-gray-500 font-semibold mt-1 tracking-widest uppercase">RT/RW</p>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- 1. Ubah items-center menjadi items-stretch -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-stretch">
            
            <!-- 2. Tambahkan h-full pada div pembungkus -->
            <div class="rounded-3xl overflow-hidden shadow-xl h-full">
                <!-- 3. Ubah h-auto menjadi h-full pada image -->
                <img src="{{ asset('images/landing/program.JPG') }}" alt="Kegiatan Desa" class="w-full h-full object-cover hover:scale-105 transition duration-500">
            </div>
            
            <!-- 4. Tambahkan flex flex-col justify-center untuk menyeimbangkan layout -->
            <div class="flex flex-col justify-center">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-1 bg-brand-green"></div>
                    <span class="text-brand-green font-bold text-sm uppercase tracking-wider">Tentang Desa</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Sejarah & Profil Singkat Desa Resapombo</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Desa Resapombo adalah sebuah desa agraris yang terletak di dataran tinggi yang subur. Dikenal dengan keramahan warganya dan kekayaan alam yang berlimpah, desa ini terus berkembang menjadi desa mandiri yang mempertahankan nilai-nilai gotong royong.
                </p>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Pemerintah Desa berkomitmen untuk terus meningkatkan pelayanan publik, transparansi informasi, serta mendorong pemberdayaan ekonomi lokal melalui BUMDes dan pengembangan UMKM.
                </p>
                
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center text-gray-700 font-medium">
                        <svg class="w-5 h-5 text-brand-green mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        Pelayanan Prima Terpadu
                    </li>
                    <li class="flex items-center text-gray-700 font-medium">
                        <svg class="w-5 h-5 text-brand-green mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        Transparansi Anggaran Desa
                    </li>
                    <li class="flex items-center text-gray-700 font-medium">
                        <svg class="w-5 h-5 text-brand-green mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        Pemberdayaan Masyarakat Lokal
                    </li>
                </ul>

                <div>
                    <a href="#" class="inline-flex items-center bg-brand-green hover:bg-green-800 text-white font-medium py-3 px-6 rounded-full transition">
                        Baca Profil Lengkap <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <div class="flex justify-center items-center gap-2 mb-2">
                    <div class="w-6 h-1 bg-brand-green"></div>
                    <span class="text-brand-green font-bold text-sm uppercase tracking-wider">Potensi Desa</span>
                    <div class="w-6 h-1 bg-brand-green"></div>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Kekayaan Desa Resapombo</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Menjelajahi beragam sektor yang menjadi pilar ekonomi dan kesejahteraan masyarakat desa kami.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6 h-auto lg:h-[500px]">
                
                <div class="relative group rounded-3xl overflow-hidden lg:row-span-2 h-64 lg:h-full">
                    <img src="https://images.unsplash.com/photo-1592651138402-45e0fb0efbb6?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="Pertanian">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 md:p-8">
                        <div class="w-10 h-10 bg-white/20 backdrop-blur-md rounded-lg flex items-center justify-center mb-3 text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">Pertanian</h3>
                        <p class="text-gray-300 text-sm md:text-base">Tulang punggung ekonomi warga dengan hasil panen melimpah seperti padi, jagung, dan sayuran organik.</p>
                    </div>
                </div>

                <div class="relative group rounded-3xl overflow-hidden h-64 lg:h-auto">
                    <img src="https://images.unsplash.com/photo-1611735341450-74d61e660ad2?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="Perkebunan">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <div class="w-8 h-8 bg-white/20 backdrop-blur-md rounded-lg flex items-center justify-center mb-2 text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-1">Perkebunan</h3>
                        <p class="text-gray-300 text-sm">Wisata Alam & Edukasi</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 md:gap-6 h-64 lg:h-auto">
                    <div class="relative group rounded-3xl overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1542361345-89e58247f2d5?q=80&w=400&auto=format&fit=crop" class="w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="Pariwisata">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-5">
                            <div class="w-8 h-8 bg-white/20 backdrop-blur-md rounded-lg flex items-center justify-center mb-2 text-white">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path></svg>
                            </div>
                            <h3 class="text-lg font-bold text-white mb-1">Pariwisata</h3>
                            <p class="text-gray-300 text-xs">Wisata Alam & Edukasi</p>
                        </div>
                    </div>
                    <div class="relative group rounded-3xl overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1556740758-90de374c12ad?q=80&w=400&auto=format&fit=crop" class="w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="UMKM">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-5">
                            <div class="w-8 h-8 bg-white/20 backdrop-blur-md rounded-lg flex items-center justify-center mb-2 text-white">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                            </div>
                            <h3 class="text-lg font-bold text-white mb-1">UMKM</h3>
                            <p class="text-gray-300 text-xs">Kerajinan & Kuliner</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-10">
                <a href="#" class="inline-flex items-center bg-brand-green hover:bg-green-800 text-white font-medium py-3 px-8 rounded-full transition">
                    Lihat Seluruh Potensi Desa <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
    </section>

    <x-footer />

    
</body>
</html>