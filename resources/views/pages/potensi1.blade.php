<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potensi Desa - Desa Resapombo</title>
    <!-- Tailwind CSS (Gunakan Vite di produksi: @vite('resources/css/app.css') ) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
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
<body class="bg-gray-50 text-gray-800">

    <!-- ================= NAVBAR ================= -->
    <x-navbar />

    <!-- ================= HERO SECTION ================= -->
    <!-- Ganti URL background dengan helper Laravel: bg-[url('{{ asset('images/hero.jpg') }}')] -->
    <div class="relative bg-gray-700 h-[60vh] min-h-[400px] flex items-center justify-center bg-cover bg-center" style="background-image: url('{{ asset('images/potensi/pertanian-hero.webp') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
            <span class="inline-block py-1 px-3 rounded-full bg-white/20 text-white text-xs font-semibold tracking-wider mb-4 border border-white/40">KEKAYAAN ALAM & BUDAYA DESA RESAPOMBO</span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">Potensi Desa</h1>
            <p class="text-lg md:text-xl text-gray-200">Menjelajahi keunggulan sumber daya alam, pertanian, dan kearifan lokal yang menjadi pilar pertumbuhan dan kesejahteraan masyarakat Desa Resapombo.</p>
        </div>
    </div>

    <!-- ================= SECTION 1: KEKAYAAN DESA (BENTO GRID) ================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-12">
            <h3 class="text-green-700 font-bold uppercase tracking-wider text-sm mb-2 flex items-center justify-center gap-2">
                <span class="w-6 h-0.5 bg-green-700"></span> TENTANG DESA <span class="w-6 h-0.5 bg-green-700"></span>
            </h3>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Kekayaan Desa Resapombo</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Menelusuri beragam sektor yang menjadi pilar ekonomi dan kesejahteraan masyarakat Desa kami.</p>
        </div>

        <div class="flex flex-col gap-4">
            <!-- Grid Atas -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <!-- Pertanian (Kiri, Tinggi) -->
                <div class="relative rounded-2xl overflow-hidden group h-64 lg:h-auto min-h-[300px]">
                    <img src="{{ asset('images/potensi/pertanian.webp') }}" alt="Pertanian" class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                    
                    <!-- --- MODIFIKASI: Opasitas Gradien Dikurangi (from-black/80 menjadi from-black/60) --- -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                    <!-- --- AKHIR MODIFIKASI --- -->
                    
                    <div class="absolute bottom-0 left-0 p-6 text-white">
                        <div class="w-10 h-10 bg-black/50 rounded-full flex items-center justify-center mb-3 backdrop-blur-sm"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M20 3c-6 .5-9 1.5-11.5 4C6 9.5 5.5 12.5 7 15c1.5 2.3 4.5 3 7 2 3-1.2 4.5-4 4.5-7.5 0-2.5.5-4.5 1.5-6.5Z"/><path d="M9 15c1.5-3.5 4-6 8.5-8"/><path d="M7 15c-1.5 2-2 4-2 6.5"/></svg></div>
                        <h3 class="text-2xl font-bold mb-2">Pertanian</h3>
                        <p class="text-sm text-gray-200 line-clamp-2">Tulang punggung ekonomi warga dengan hasil panen melimpah seperti padi, jagung, dan sayuran organik.</p>
                    </div>
                </div>

                <!-- Kanan (Perkebunan, Pariwisata, Peternakan) -->
                <div class="flex flex-col gap-4">
                    <!-- Perkebunan -->
                    <div class="relative rounded-2xl overflow-hidden group h-48 lg:h-56">
                        <img src="{{ asset('images/potensi/perkebunan.webp') }}" alt="Perkebunan" class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                        
                        <!-- --- MODIFIKASI: Opasitas Gradien Dikurangi (from-black/80 menjadi from-black/60) --- -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <!-- --- AKHIR MODIFIKASI --- -->
                        
                        <div class="absolute bottom-0 left-0 p-5 text-white">
                            <div class="w-8 h-8 bg-black/50 rounded-full flex items-center justify-center mb-2 backdrop-blur-sm"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><ellipse cx="12" cy="12" rx="8" ry="6" transform="rotate(-35 12 12)"/><path d="M8 15.5c1-3 3-3.5 5-5s3.5-2.5 4.3-5.3"/></svg></div>
                            <h3 class="text-xl font-bold">Perkebunan</h3>
                            <p class="text-xs text-gray-200">Wisata Alam & Edukasi</p>
                        </div>
                    </div>

                    <!-- Row Bawah Kanan -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 h-auto sm:h-48 lg:h-56">
                        <div class="relative rounded-2xl overflow-hidden group h-48 sm:h-full">
                            <img src="{{ asset('images/potensi/pariwisata.webp') }}" alt="Pariwisata" class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                            
                            <!-- --- MODIFIKASI: Opasitas Gradien Dikurangi (from-black/80 menjadi from-black/60) --- -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <!-- --- AKHIR MODIFIKASI --- -->
                            
                            <div class="absolute bottom-0 left-0 p-5 text-white">
                                <div class="w-8 h-8 bg-black/50 rounded-full flex items-center justify-center mb-2 backdrop-blur-sm"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M12 3c-4.4 0-8 3.4-8 7.6 0 5.1 6.4 11.6 7.5 12.7a.7.7 0 0 0 1 0C13.6 22.2 20 15.7 20 10.6 20 6.4 16.4 3 12 3Z"/><circle cx="12" cy="10.5" r="3.2"/></svg></div>
                                <h3 class="text-lg font-bold">Pariwisata</h3>
                                <p class="text-xs text-gray-200">Wisata Alam & Edukasi</p>
                            </div>
                        </div>
                        <div class="relative rounded-2xl overflow-hidden group h-48 sm:h-full">
                            <img src="{{ asset('images/potensi/peternakan.webp') }}" alt="Peternakan" class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                            
                            <!-- --- MODIFIKASI: Opasitas Gradien Dikurangi (from-black/80 menjadi from-black/60) --- -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <!-- --- AKHIR MODIFIKASI --- -->
                            
                            <div class="absolute bottom-0 left-0 p-5 text-white">
                                <div class="w-8 h-8 bg-black/50 rounded-full flex items-center justify-center mb-2 backdrop-blur-sm"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M3 20h6.5"/><path d="M11.5 20H16"/><path d="M18 20c1.5-.5 3-1.5 3-3-1-.2-2-.2-3 0"/><path d="M18 17c1-1 1.5-2.3.5-3.5-1 .2-2 .8-2.5 1.7"/><path d="M16.5 15.2c.7-1.4.5-2.8-.8-3.7-1 .8-1.5 2-1.3 3.2"/><path d="M12.5 8.5c2 0 3.8.8 4.5 2.8"/><path d="M9 7.3c1.3-.6 2.7-.9 4-.8"/><path d="M6.3 8.5c.7-.5 1.5-.9 2.4-1.1"/><path d="M4 10.3c.6-.5 1.3-.9 2-1.2"/><path d="M3.2 13c.7-.6 1.3-1.2 2.3-1.5"/><path d="M3.5 16.5c.5-1 1.3-1.8 2.3-2.3"/><path d="M9 16.8c1.3.3 2.7.2 4-.2"/><path d="M13.7 15c1 .8 2.2 1.2 3.5 1"/><path d="M9.5 12.3c1.2-.2 2.4-.1 3.5.4"/><path d="M6.5 13c.6-.2 1.2-.3 1.8-.3"/></svg></div>
                                <h3 class="text-lg font-bold">Peternakan</h3>
                                <p class="text-xs text-gray-200">Sapi Perah & Kambing</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- UMKM Lokal (Bawah Full Width) -->
            <div class="relative rounded-2xl overflow-hidden group h-48 lg:h-64 mt-2">
                <img src="{{ asset('images/potensi/umkm.webp') }}" alt="UMKM Lokal" class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                
                <!-- --- MODIFIKASI: Opasitas Gradien Horizontal Dikurangi (from-black/80 via-black/40 menjadi from-black/60 via-black/30) --- -->
                <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/30 to-transparent"></div>
                <!-- --- AKHIR MODIFIKASI --- -->
                
                <div class="absolute bottom-0 left-0 p-6 lg:p-10 text-white flex flex-col justify-end h-full">
                    <div class="w-10 h-10 bg-black/50 rounded-full flex items-center justify-center mb-3 backdrop-blur-sm"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><circle cx="12" cy="12" r="9"/><path d="M8 12.5l2.5 2.5L16 9.5"/></svg></div>
                    <h3 class="text-2xl font-bold mb-2">UMKM Lokal</h3>
                    <p class="text-sm text-gray-200">Produksi olahan pangan dan kerajinan tangan khas desa</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('kekayaan') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-green-700 hover:bg-green-800 transition-colors shadow-md">
                Lihat Seluruh Kekayaan Desa 
                <svg class="ml-2 -mr-1 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </section>

    <!-- ================= SECTION 2: CONTENT & SIDEBAR ================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 border-t border-gray-200">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <!-- Main Content (Kiri) -->
            <div class="lg:col-span-2">
                <h3 class="text-green-700 font-bold uppercase tracking-wider text-sm mb-2 flex items-center gap-2">
                    <span class="w-6 h-0.5 bg-green-700"></span> TENTANG DESA
                </h3>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Potensi & Kekayaan Alam Desa Resapombo</h2>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Terletak di kawasan dataran tinggi lereng Gunung Kawi dan Gunung Gogoniti, Desa Resapombo dianugerahi kesuburan tanah, udara yang sejuk, serta sumber daya alam yang melimpah. Potensi ekonomi desa berfokus pada dua pilar utama, yaitu Sektor Peternakan Terpadu dan Sektor Pertanian & Perkebunan Berkelanjutan.
                </p>

                <!-- Dual Images -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    <img src="{{ asset('images/potensi/pertanian-hero.webp') }}" alt="Sawah" class="rounded-xl w-full h-48 object-cover shadow-sm">
                    <img src="{{ asset('images/potensi/perkebunan-hero.webp') }}" alt="Petani" class="rounded-xl w-full h-48 object-cover shadow-sm">
                </div>

                <h4 class="text-xl font-bold text-gray-900 mb-4">Pilar Utama Ekonomi Desa</h4>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Sektor peternakan menjadi unggulan desa karena dukungan iklim dataran tinggi serta ketersediaan pakan hijau yang melimpah, menjadikannya sangat potensial untuk terus dikembangkan. Sementara itu, sektor pertanian dan perkebunan memanfaatkan luas lahan tegalan yang mencapai lebih dari 52.000 hektar serta lahan sawah produktif, di mana masyarakat desa berkomitmen untuk terus mengembangkan komoditas bernilai ekonomi tinggi yang sesuai dengan kondisi agroklimat setempat.
                </p>

                <ul class="space-y-4">
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-700 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="text-gray-600"><strong>Peternakan Kambing Perah & Peranakan:</strong> Mayoritas warga mengelola peternakan kambing, baik untuk budidaya daging maupun produksi susu kambing segar berkualitas tinggi.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-700 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="text-gray-600"><strong>Produksi Susu Kambing:</strong> Menjadi salah satu produk komoditas bernilai tinggi yang dikembangkan warga untuk memenuhi kebutuhan pasar lokal hingga kemitraan olahan susu.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-700 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="text-gray-600"><strong>Pengolahan Pupuk Organik:</strong> Limbah peternakan dimanfaatkan kembali menjadi pupuk kandang organik untuk menopang kesuburan tanah pertanian dan perkebunan warga.</span>
                    </li>
                </ul>
            </div>

            <!-- Sidebar (Kanan) -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Fakta Singkat Card -->
                <div class="bg-white rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.1)] p-8 border border-gray-100">
                    <h4 class="text-xl font-bold text-gray-900 mb-6">Fakta Singkat</h4>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b border-gray-100 pb-4">
                            <span class="text-gray-500">Luas Lahan Baku</span>
                            <span class="font-bold text-gray-900">{{ $fakta->luas_lahan_baku }} Ha</span>
                        </div>
                        <div class="flex justify-between items-center border-b border-gray-100 pb-4">
                            <span class="text-gray-500">Kelompok Tani</span>
                            <span class="font-bold text-gray-900">{{ $fakta->kelompok_tani }} Kelompok</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500">Hasil Peternakan/Thn</span>
                            <span class="font-bold text-gray-900">{{ $fakta->produksi_padi }} ton</span>
                        </div>
                    </div>
                </div>

                <!-- Call to Action Card -->
                <div class="bg-gray-50 rounded-2xl p-8 border border-gray-200">
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Tertarik Kemitraan?</h4>
                    <p class="text-gray-600 mb-6 text-sm">Pemerintah Desa terbuka untuk kerjasama investasi dan kemitraan pemasaran hasil bumi.</p>
                    <a href="{{ url("mailto:sembodokrido@gmail.com") }}" class="flex justify-center items-center w-full px-4 py-3 border border-transparent font-medium rounded-xl text-white bg-green-700 hover:bg-green-800 transition-colors shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Hubungi BUMDes
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <x-footer />

    <!-- Script Vanilla JS untuk Mobile Menu -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');

            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>