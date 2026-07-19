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
    <div class="relative bg-gray-900 h-[60vh] min-h-[400px] flex items-center justify-center bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1589182373726-e4f658ab50f0?q=80&w=2000&auto=format&fit=crop');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
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
                    <img src="https://images.unsplash.com/photo-1595841696677-6489ff3f8cd1?auto=format&fit=crop&w=800&q=80" alt="Pertanian" class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 text-white">
                        <div class="w-10 h-10 bg-black/50 rounded-full flex items-center justify-center mb-3 backdrop-blur-sm">🌱</div>
                        <h3 class="text-2xl font-bold mb-2">Pertanian</h3>
                        <p class="text-sm text-gray-200 line-clamp-2">Tulang punggung ekonomi warga dengan hasil panen melimpah seperti padi, jagung, dan sayuran organik.</p>
                    </div>
                </div>

                <!-- Kanan (Perkebunan, Pariwisata, Peternakan) -->
                <div class="flex flex-col gap-4">
                    <!-- Perkebunan -->
                    <div class="relative rounded-2xl overflow-hidden group h-48 lg:h-56">
                        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=800&q=80" alt="Perkebunan" class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-5 text-white">
                            <div class="w-8 h-8 bg-black/50 rounded-full flex items-center justify-center mb-2 backdrop-blur-sm">☕</div>
                            <h3 class="text-xl font-bold">Perkebunan</h3>
                            <p class="text-xs text-gray-200">Wisata Alam & Edukasi</p>
                        </div>
                    </div>

                    <!-- Row Bawah Kanan -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 h-auto sm:h-48 lg:h-56">
                        <div class="relative rounded-2xl overflow-hidden group h-48 sm:h-full">
                            <img src="https://images.unsplash.com/photo-1433086966358-54859d0ed716?auto=format&fit=crop&w=400&q=80" alt="Pariwisata" class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-5 text-white">
                                <div class="w-8 h-8 bg-black/50 rounded-full flex items-center justify-center mb-2 backdrop-blur-sm">🏞️</div>
                                <h3 class="text-lg font-bold">Pariwisata</h3>
                                <p class="text-xs text-gray-200">Wisata Alam & Edukasi</p>
                            </div>
                        </div>
                        <div class="relative rounded-2xl overflow-hidden group h-48 sm:h-full">
                            <img src="https://images.unsplash.com/photo-1516467508483-a7212febe31a?auto=format&fit=crop&w=400&q=80" alt="Peternakan" class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-5 text-white">
                                <div class="w-8 h-8 bg-black/50 rounded-full flex items-center justify-center mb-2 backdrop-blur-sm">🐄</div>
                                <h3 class="text-lg font-bold">Peternakan</h3>
                                <p class="text-xs text-gray-200">Sapi Perah & Kambing</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- UMKM Lokal (Bawah Full Width) -->
            <div class="relative rounded-2xl overflow-hidden group h-48 lg:h-64 mt-2">
                <img src="https://images.unsplash.com/photo-1601050690597-df0568f70950?auto=format&fit=crop&w=1200&q=80" alt="UMKM Lokal" class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-6 lg:p-10 text-white flex flex-col justify-end h-full">
                    <div class="w-10 h-10 bg-black/50 rounded-full flex items-center justify-center mb-3 backdrop-blur-sm">🛍️</div>
                    <h3 class="text-2xl font-bold mb-2">UMKM Lokal</h3>
                    <p class="text-sm text-gray-200">Produksi olahan pangan dan kerajinan tangan khas desa</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-10">
            <a href="#" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-green-700 hover:bg-green-800 transition-colors shadow-md">
                Lihat Seluruh Potensi Desa 
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
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Pertanian Berkelanjutan Resapombo</h2>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Sektor pertanian merupakan pilar utama perekonomian Desa Resapombo. Dengan luas lahan sawah produktif mencapai lebih dari 150 hektar, masyarakat desa kami berkomitmen untuk mengembangkan sistem pertanian organik yang ramah lingkungan dan berkelanjutan.
                </p>

                <!-- Dual Images -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    <img src="https://images.unsplash.com/photo-1595841696677-6489ff3f8cd1?auto=format&fit=crop&w=600&q=80" alt="Sawah" class="rounded-xl w-full h-48 object-cover shadow-sm">
                    <img src="https://images.unsplash.com/photo-1589923188900-85dae523342b?auto=format&fit=crop&w=600&q=80" alt="Petani" class="rounded-xl w-full h-48 object-cover shadow-sm">
                </div>

                <h4 class="text-xl font-bold text-gray-900 mb-4">Komoditas Unggulan</h4>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Kami fokus pada pengembangan komoditas bernilai ekonomi tinggi yang sesuai dengan kondisi agroklimat desa kami. Padi varietas unggul baru (VUB) dan sayuran organik menjadi primadona yang terus kami kembangkan melalui kelompok tani terpadu.
                </p>

                <ul class="space-y-4">
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-700 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="text-gray-600"><strong>Padi Organik:</strong> Dipupuk menggunakan kompos lokal, bebas pestisida kimia, dan memiliki nilai jual yang kompetitif di pasar regional.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-700 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="text-gray-600"><strong>Sayuran Dataran Tinggi:</strong> Kubis, wortel, dan kentang yang ditanam dengan sistem rotasi tanam untuk menjaga kesuburan tanah.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-700 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="text-gray-600"><strong>Palawija:</strong> Jagung hibrida dan kedelai sebagai tanaman sela penyangga ketahanan pangan.</span>
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
                            <span class="font-bold text-gray-900">50 Ha</span>
                        </div>
                        <div class="flex justify-between items-center border-b border-gray-100 pb-4">
                            <span class="text-gray-500">Kelompok Tani</span>
                            <span class="font-bold text-gray-900">8 Kelompok</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500">Produksi Padi/Thn</span>
                            <span class="font-bold text-gray-900">+ 900 Ton</span>
                        </div>
                    </div>
                </div>

                <!-- Call to Action Card -->
                <div class="bg-gray-50 rounded-2xl p-8 border border-gray-200">
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Tertarik Kemitraan?</h4>
                    <p class="text-gray-600 mb-6 text-sm">Pemerintah Desa terbuka untuk kerjasama investasi dan kemitraan pemasaran hasil bumi.</p>
                    <a href="#" class="flex justify-center items-center w-full px-4 py-3 border border-transparent font-medium rounded-xl text-white bg-green-700 hover:bg-green-800 transition-colors shadow-sm">
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