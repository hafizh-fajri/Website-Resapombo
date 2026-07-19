<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Desa - Desa Resapombo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .brand-green { background-color: #1a5624; }
        .text-brand-green { color: #1a5624; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <x-navbar />

    <header class="pt-16">
        <div class="relative bg-cover bg-center h-80 lg:h-96" style="background-image: url('https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?q=80&w=2071&auto=format&fit=crop');">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 shadow-sm">Profil Desa</h1>
                <p class="text-lg text-white max-w-2xl opacity-90">Mengenal lebih dekat sejarah, visi misi, dan letak geografis Desa Resapombo sebagai fondasi pembangunan yang berkelanjutan.</p>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-8">
                
                <section>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Sejarah Desa</h2>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <img src="https://images.unsplash.com/photo-1599059813005-11265ba4b4ce?q=80&w=2070&auto=format&fit=crop" alt="Sejarah Desa" class="w-full h-64 object-cover rounded-xl mb-6">
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Desa Resapombo adalah sebuah desa agraris yang terletak di dataran tinggi yang subur. Dikenal dengan keramahan warganya dan kekayaan alam yang melimpah, desa ini terus berkembang menjadi desa mandiri yang mempertahankan nilai-nilai gotong royong.
                        </p>
                        <p class="text-gray-600 leading-relaxed">
                            Pemerintah Desa berkomitmen untuk terus meningkatkan pelayanan publik, transparansi informasi, serta mendorong pemberdayaan ekonomi lokal melalui BUMDes dan pengembangan UMKM.
                        </p>
                    </div>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 mt-10">Visi & Misi</h2>
                    <div class="space-y-6">
                        <div class="brand-green p-8 rounded-2xl text-white shadow-md">
                            <h3 class="text-xl font-bold mb-3">Visi</h3>
                            <p class="text-lg leading-relaxed opacity-95">
                                "Mewujudkan Desa Resapombo yang Mandiri, Sejahtera, dan Berbudaya melalui Tata Kelola Pemerintahan yang Transparan dan Pemanfaatan Potensi Lokal."
                            </p>
                        </div>

                        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                            <h3 class="text-xl font-bold text-gray-900 mb-6">Misi</h3>
                            <ul class="space-y-6">
                                <li class="flex items-start">
                                    <div class="flex-shrink-0 mt-1">
                                        <svg class="h-6 w-6 text-brand-green" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-semibold text-gray-900">Pelayanan Prima Terpadu</h4>
                                        <p class="text-gray-600 mt-1">Meningkatkan kualitas infrastruktur dasar yang mendukung konektivitas dan pergerakan ekonomi warga.</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <div class="flex-shrink-0 mt-1">
                                        <svg class="h-6 w-6 text-brand-green" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-semibold text-gray-900">Pemberdayaan Ekonomi</h4>
                                        <p class="text-gray-600 mt-1">Mendorong pertumbuhan UMKM dan optimalisasi BUMDes berbasis potensi pertanian dan wisata lokal.</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <div class="flex-shrink-0 mt-1">
                                        <svg class="h-6 w-6 text-brand-green" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-semibold text-gray-900">Tata Kelola Pemerintahan</h4>
                                        <p class="text-gray-600 mt-1">Menyelenggarakan tata kelola pemerintahan yang bersih, responsif, dan berbasis teknologi informasi.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>

            <div class="space-y-8 mt-10 lg:mt-0">
                
                <section>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Informasi Umum</h2>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <div class="grid grid-cols-2 gap-4 text-center">
                            <div class="p-4 bg-gray-50 rounded-xl">
                                <div class="bg-[#E6EBE4] w-12 h-12 mx-auto rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path fill="#1d543b" d="M96 192C96 130.1 146.1 80 208 80C269.9 80 320 130.1 320 192C320 253.9 269.9 304 208 304C146.1 304 96 253.9 96 192zM32 528C32 430.8 110.8 352 208 352C305.2 352 384 430.8 384 528L384 534C384 557.2 365.2 576 342 576L74 576C50.8 576 32 557.2 32 534L32 528zM464 128C517 128 560 171 560 224C560 277 517 320 464 320C411 320 368 277 368 224C368 171 411 128 464 128zM464 368C543.5 368 608 432.5 608 512L608 534.4C608 557.4 589.4 576 566.4 576L421.6 576C428.2 563.5 432 549.2 432 534L432 528C432 476.5 414.6 429.1 385.5 391.3C408.1 376.6 435.1 368 464 368z"/></svg>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900">4.520</h4>
                                <p class="text-xs text-gray-500 uppercase tracking-wider mt-1">Penduduk</p>
                            </div>
                            <div class="p-4 bg-gray-50 rounded-xl">
                                <div class="bg-[#E6EBE4] w-12 h-12 mx-auto rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path fill="#1d543b" d="M341.8 72.6C329.5 61.2 310.5 61.2 298.3 72.6L74.3 280.6C64.7 289.6 61.5 303.5 66.3 315.7C71.1 327.9 82.8 336 96 336L112 336L112 512C112 547.3 140.7 576 176 576L464 576C499.3 576 528 547.3 528 512L528 336L544 336C557.2 336 569 327.9 573.8 315.7C578.6 303.5 575.4 289.5 565.8 280.6L341.8 72.6zM304 384L336 384C362.5 384 384 405.5 384 432L384 528L256 528L256 432C256 405.5 277.5 384 304 384z"/></svg>                                </div>
                                <h4 class="text-xl font-bold text-gray-900">1.250</h4>
                                <p class="text-xs text-gray-500 uppercase tracking-wider mt-1">Keluarga</p>
                            </div>
                            <div class="p-4 bg-gray-50 rounded-xl">
                                <div class="bg-[#E6EBE4] w-12 h-12 mx-auto rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path fill="#1d543b" d="M576 112C576 100.9 570.3 90.6 560.8 84.8C551.3 79 539.6 78.4 529.7 83.4L413.5 141.5L234.1 81.6C226 78.9 217.3 79.5 209.7 83.3L81.7 147.3C70.8 152.8 64 163.9 64 176L64 528C64 539.1 69.7 549.4 79.2 555.2C88.7 561 100.4 561.6 110.3 556.6L226.4 498.5L405.8 558.3C413.9 561 422.6 560.4 430.2 556.6L558.2 492.6C569 487.2 575.9 476.1 575.9 464L575.9 112zM256 440.9L256 156.4L384 199.1L384 483.6L256 440.9z"/></svg>                                               </div>
                                <h4 class="text-xl font-bold text-gray-900">8.5 km²</h4>
                                <p class="text-xs text-gray-500 uppercase tracking-wider mt-1">Luas Wilayah</p>
                            </div>
                            <div class="p-4 bg-gray-50 rounded-xl">
                                <div class="bg-[#E6EBE4] w-12 h-12 mx-auto rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path fill="#1d543b" d="M352 64C316.7 64 288 92.7 288 128L288 160L240 160L240 88C240 74.7 229.3 64 216 64C202.7 64 192 74.7 192 88L192 160L128 160L128 88C128 74.7 117.3 64 104 64C90.7 64 80 74.7 80 88L80 162C52.4 169.1 32 194.2 32 224L32 512C32 547.3 60.7 576 96 576L544 576C579.3 576 608 547.3 608 512L608 320C608 284.7 579.3 256 544 256L480 256L480 128C480 92.7 451.3 64 416 64L352 64zM416 176L416 208C416 216.8 408.8 224 400 224L368 224C359.2 224 352 216.8 352 208L352 176C352 167.2 359.2 160 368 160L400 160C408.8 160 416 167.2 416 176zM400 256C408.8 256 416 263.2 416 272L416 304C416 312.8 408.8 320 400 320L368 320C359.2 320 352 312.8 352 304L352 272C352 263.2 359.2 256 368 256L400 256zM416 368L416 400C416 408.8 408.8 416 400 416L368 416C359.2 416 352 408.8 352 400L352 368C352 359.2 359.2 352 368 352L400 352C408.8 352 416 359.2 416 368zM528 352C536.8 352 544 359.2 544 368L544 400C544 408.8 536.8 416 528 416L496 416C487.2 416 480 408.8 480 400L480 368C480 359.2 487.2 352 496 352L528 352zM288 368L288 400C288 408.8 280.8 416 272 416L240 416C231.2 416 224 408.8 224 400L224 368C224 359.2 231.2 352 240 352L272 352C280.8 352 288 359.2 288 368zM272 256C280.8 256 288 263.2 288 272L288 304C288 312.8 280.8 320 272 320L240 320C231.2 320 224 312.8 224 304L224 272C224 263.2 231.2 256 240 256L272 256zM160 368L160 400C160 408.8 152.8 416 144 416L112 416C103.2 416 96 408.8 96 400L96 368C96 359.2 103.2 352 112 352L144 352C152.8 352 160 359.2 160 368zM144 256C152.8 256 160 263.2 160 272L160 304C160 312.8 152.8 320 144 320L112 320C103.2 320 96 312.8 96 304L96 272C96 263.2 103.2 256 112 256L144 256z"/></svg>                                </div>
                                <h4 class="text-xl font-bold text-gray-900">6</h4>
                                <p class="text-xs text-gray-500 uppercase tracking-wider mt-1">Dusun</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Peta Wilayah</h2>
                    <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100">
                        <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=2074&auto=format&fit=crop" alt="Peta Desa" class="w-full h-48 object-cover rounded-xl">
                    </div>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Dokumen Publik</h2>
                    <div class="space-y-4">
                        <a href="#" class="flex items-center p-4 bg-white rounded-2xl shadow-sm border border-gray-100 hover:border-green-300 hover:shadow-md transition">
                            <div class="bg-green-50 p-3 rounded-full mr-4">
                                <svg class="w-6 h-6 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-900">Profil Desa Lengkap</h4>
                                <p class="text-xs text-gray-500 mt-1">PDF • 2.4 MB</p>
                            </div>
                        </a>
                        <a href="#" class="flex items-center p-4 bg-white rounded-2xl shadow-sm border border-gray-100 hover:border-green-300 hover:shadow-md transition">
                            <div class="bg-green-50 p-3 rounded-full mr-4">
                                <svg class="w-6 h-6 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-900">Peraturan Desa 2024</h4>
                                <p class="text-xs text-gray-500 mt-1">PDF • 1.1 MB</p>
                            </div>
                        </a>
                    </div>
                </section>
                
            </div>
        </div>
    </main>

    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('mobile-menu-button');
            const menu = document.getElementById('mobile-menu');

            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>