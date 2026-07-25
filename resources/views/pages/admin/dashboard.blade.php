<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Desa Resapombo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script> 
</head>
<body class="bg-gray-100 font-sans text-gray-800 antialiased overflow-hidden">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="bg-[#166534] text-white w-64 flex-shrink-0 hidden md:flex flex-col transition-all duration-300 relative z-50">
            <div class="h-16 flex items-center justify-center border-b border-[#14532d]">
                <h2 class="text-xl font-bold">Admin Resapombo</h2>
            </div>
            
            <nav class="flex-1 overflow-y-auto py-4">
                <ul class="space-y-1">
                    <!-- Nav Items dengan fungsi onclick -->
                    <li><a href="#" onclick="switchPage('dashboard', this)" class="menu-item flex items-center px-6 py-3 bg-[#14532d] border-l-4 border-white transition"><i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i> Dashboard</a></li>
                    <li><a href="#" onclick="switchPage('home', this)" class="menu-item flex items-center px-6 py-3 hover:bg-[#14532d] border-l-4 border-transparent transition"><i data-lucide="home" class="w-5 h-5 mr-3"></i> Home / Landing</a></li>
                    <li><a href="#" onclick="switchPage('profil', this)" class="menu-item flex items-center px-6 py-3 hover:bg-[#14532d] border-l-4 border-transparent transition"><i data-lucide="info" class="w-5 h-5 mr-3"></i> Profil Desa</a></li>
                    <li><a href="#" onclick="switchPage('potensi', this)" class="menu-item flex items-center px-6 py-3 hover:bg-[#14532d] border-l-4 border-transparent transition"><i data-lucide="sprout" class="w-5 h-5 mr-3"></i> Potensi</a></li>
                    <li><a href="#" onclick="switchPage('pemerintahan', this)" class="menu-item flex items-center px-6 py-3 hover:bg-[#14532d] border-l-4 border-transparent transition"><i data-lucide="building" class="w-5 h-5 mr-3"></i> Pemerintahan</a></li>
                    <li><a href="#" onclick="switchPage('bumdes', this)" class="menu-item flex items-center px-6 py-3 hover:bg-[#14532d] border-l-4 border-transparent transition"><i data-lucide="shopping-bag" class="w-5 h-5 mr-3"></i> BUMDes</a></li>
                    <li><a href="#" onclick="switchPage('berita', this)" class="menu-item flex items-center px-6 py-3 hover:bg-[#14532d] border-l-4 border-transparent transition"><i data-lucide="newspaper" class="w-5 h-5 mr-3"></i> Berita & Artikel</a></li>
                    <li><a href="#" onclick="switchPage('faq', this)" class="menu-item flex items-center px-6 py-3 hover:bg-[#14532d] border-l-4 border-transparent transition"><i data-lucide="help-circle" class="w-5 h-5 mr-3"></i> FAQ</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6 z-10">
                <button id="mobile-menu-btn" class="md:hidden text-gray-500 hover:text-[#166534] focus:outline-none">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                
                <div class="flex-1"></div>

                <div class="flex items-center">
                    <span class="text-sm font-medium text-gray-700 mr-4">Halo, Admin</span>
                    <a href="/logout" class="text-sm text-red-600 hover:text-red-800 font-semibold flex items-center">
                        <i data-lucide="log-out" class="w-4 h-4 mr-1"></i> Logout
                    </a>
                </div>
            </header>

            <!-- Main Workspace -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6 relative">
                
                <!-- Halaman 1: Dashboard -->
                <div id="dashboard" class="page-content block">
                    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Selamat Datang di Dashboard</h1>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-[#166534]">
                            <h3 class="text-gray-500 text-sm">Total Berita</h3>
                            <p class="text-3xl font-bold text-gray-800 mt-2">24</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-blue-500">
                            <h3 class="text-gray-500 text-sm">Total Potensi Desa</h3>
                            <p class="text-3xl font-bold text-gray-800 mt-2">8</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-yellow-500">
                            <h3 class="text-gray-500 text-sm">Pertanyaan FAQ</h3>
                            <p class="text-3xl font-bold text-gray-800 mt-2">15</p>
                        </div>
                    </div>
                </div>

                <!-- Halaman 2: Home / Landing -->
                <div id="home" class="page-content hidden">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">Kelola Beranda (Landing Page)</h1>
                            <p class="text-sm text-gray-500 mt-1">Edit teks hero banner dan statistik penduduk.</p>
                        </div>
                        <button class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg flex items-center text-sm shadow-sm transition">
                            <i data-lucide="save" class="w-4 h-4 mr-2"></i> Simpan Perubahan
                        </button>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <h3 class="font-semibold text-lg mb-4 border-b pb-2">Hero Section</h3>
                        <label class="block mb-2 text-sm font-medium">Judul Utama</label>
                        <input type="text" class="w-full border rounded-lg p-2 mb-4" value="Selamat Datang di Desa Resapombo">
                        <label class="block mb-2 text-sm font-medium">Sub Judul</label>
                        <textarea class="w-full border rounded-lg p-2" rows="3">Mewujudkan desa yang mandiri, sejahtera, dan berbudaya...</textarea>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="font-semibold text-lg mb-4 border-b pb-2">Data Statistik</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div><label class="text-sm">Penduduk</label><input type="text" class="w-full border rounded-lg p-2" value="5.420"></div>
                            <div><label class="text-sm">Luas Wilayah</label><input type="text" class="w-full border rounded-lg p-2" value="850 ha"></div>
                            <div><label class="text-sm">Dusun</label><input type="text" class="w-full border rounded-lg p-2" value="6"></div>
                            <div><label class="text-sm">RT/RW</label><input type="text" class="w-full border rounded-lg p-2" value="850"></div>
                        </div>
                    </div>
                </div>

                <!-- Halaman 3: Profil Desa -->
                <div id="profil" class="page-content hidden">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">Kelola Profil Desa</h1>
                            <p class="text-sm text-gray-500 mt-1">Edit Sejarah, Visi, Misi, Peta Wilayah, dan Dokumen Desa.</p>
                        </div>
                        <button class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg flex items-center text-sm shadow-sm transition">
                            <i data-lucide="save" class="w-4 h-4 mr-2"></i> Simpan Perubahan
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        
                        <!-- SEJARAH SINGKAT -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h3 class="font-semibold text-lg mb-4 border-b pb-2 flex items-center">
                                <i data-lucide="book-open" class="w-5 h-5 mr-2 text-gray-600"></i> Sejarah Singkat
                            </h3>
                            <textarea class="w-full border rounded-lg p-3 h-40 focus:ring-2 focus:ring-green-500 outline-none">Desa Resapombo adalah sebuah desa agraris yang terletak di dataran tinggi...</textarea>
                        </div>

                        <!-- VISI & MISI -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h3 class="font-semibold text-lg mb-4 border-b pb-2 flex items-center">
                                <i data-lucide="target" class="w-5 h-5 mr-2 text-gray-600"></i> Visi & Misi
                            </h3>
                            
                            <!-- Input Visi -->
                            <div class="mb-5">
                                <label class="block mb-2 text-sm font-medium text-gray-700">Visi</label>
                                <textarea class="w-full border rounded-lg p-3 h-20 focus:ring-2 focus:ring-green-500 outline-none">Mewujudkan Desa Resapombo yang Mandiri, Sejahtera, dan Berbudaya melalui Tata Kelola Pemerintahan yang Transparan dan Pemanfaatan Potensi Lokal.</textarea>
                            </div>
                            
                            <!-- Input Misi -->
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Misi</label>
                                <div class="space-y-3 mb-4" id="misi-container">
                                    
                                    <!-- Item Misi 1 -->
                                    <div class="flex gap-3 items-start border p-3 rounded-lg bg-gray-50">
                                        <div class="flex-1 space-y-2">
                                            <input type="text" class="w-full border rounded-md p-2 text-sm focus:ring-2 focus:ring-green-500 outline-none" value="Pelayanan Prima Terpadu" placeholder="Judul Misi">
                                            <textarea class="w-full border rounded-md p-2 text-sm h-16 focus:ring-2 focus:ring-green-500 outline-none" placeholder="Deskripsi Misi">Meningkatkan kualitas infrastruktur dasar yang mendukung konektivitas dan pergerakan ekonomi warga.</textarea>
                                        </div>
                                        <button class="text-red-500 hover:text-red-700 p-2 transition" title="Hapus Misi">
                                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                                        </button>
                                    </div>

                                    <!-- Item Misi 2 -->
                                    <div class="flex gap-3 items-start border p-3 rounded-lg bg-gray-50">
                                        <div class="flex-1 space-y-2">
                                            <input type="text" class="w-full border rounded-md p-2 text-sm focus:ring-2 focus:ring-green-500 outline-none" value="Pemberdayaan Ekonomi" placeholder="Judul Misi">
                                            <textarea class="w-full border rounded-md p-2 text-sm h-16 focus:ring-2 focus:ring-green-500 outline-none" placeholder="Deskripsi Misi">Mendorong pertumbuhan UMKM dan optimalisasi BUMDes berbasis potensi pertanian dan wisata lokal.</textarea>
                                        </div>
                                        <button class="text-red-500 hover:text-red-700 p-2 transition" title="Hapus Misi">
                                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                                        </button>
                                    </div>

                                </div>
                                <!-- Tombol Tambah Misi -->
                                <button class="text-sm text-[#166534] font-medium flex items-center hover:underline">
                                    <i data-lucide="plus-circle" class="w-4 h-4 mr-1"></i> Tambah Misi Baru
                                </button>
                            </div>
                        </div>

                        <!-- UBAH FOTO PETA -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h3 class="font-semibold text-lg mb-4 border-b pb-2 flex items-center">
                                <i data-lucide="map" class="w-5 h-5 mr-2 text-gray-600"></i> Peta Wilayah
                            </h3>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 flex flex-col items-center justify-center text-center bg-gray-50">
                                <!-- Preview Peta Saat Ini -->
                                <img src="/path-to-your-map-image.jpg" alt="Peta Desa Saat Ini" class="w-full max-h-48 object-cover rounded mb-4 shadow-sm border">
                                
                                <i data-lucide="upload-cloud" class="w-8 h-8 text-gray-400 mb-2"></i>
                                <p class="text-sm text-gray-600 mb-4">Tarik & lepas file gambar peta di sini, atau klik tombol di bawah.</p>
                                <input type="file" id="upload-peta" class="hidden" accept="image/*">
                                <label for="upload-peta" class="bg-white border hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-md cursor-pointer text-sm font-medium transition shadow-sm">
                                    Pilih File Gambar
                                </label>
                                <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG. Maksimal 2MB.</p>
                            </div>
                        </div>

                        <!-- DOKUMEN PUBLIK (PDF) -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h3 class="font-semibold text-lg mb-4 border-b pb-2 flex items-center">
                                <i data-lucide="file-text" class="w-5 h-5 mr-2 text-gray-600"></i> Dokumen Publik
                            </h3>
                            
                            <!-- Form Tambah Dokumen -->
                            <div class="bg-green-50 p-4 rounded-lg border border-green-100 mb-5">
                                <h4 class="text-sm font-medium text-green-900 mb-3">Upload Dokumen Baru</h4>
                                <div class="space-y-3">
                                    <input type="text" class="w-full border rounded-md p-2 text-sm focus:ring-2 focus:ring-green-500 outline-none" placeholder="Nama Dokumen (Contoh: RPJMDes 2024)">
                                    <div class="flex flex-col sm:flex-row items-center gap-2">
                                        <input type="file" class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-white file:text-green-700 file:border file:border-gray-200 hover:file:bg-gray-50" accept=".pdf">
                                        <button class="w-full sm:w-auto bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-md text-sm whitespace-nowrap transition flex items-center justify-center">
                                            <i data-lucide="plus" class="w-4 h-4 mr-1"></i> Tambah
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- List Dokumen Aktif -->
                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-3">Dokumen Tersedia</h4>
                                <div class="space-y-2">
                                    
                                    <!-- Item Dokumen 1 -->
                                    <div class="flex justify-between items-center p-3 border rounded-lg hover:bg-gray-50 transition bg-white">
                                        <div class="flex items-center gap-3">
                                            <div class="bg-red-50 p-2 rounded-md text-red-600 border border-red-100">
                                                <i data-lucide="file-type-2" class="w-5 h-5"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">Profil Desa Lengkap</p>
                                                <p class="text-xs text-gray-500">PDF • 2.4 MB</p>
                                            </div>
                                        </div>
                                        <button class="text-red-500 hover:text-red-700 p-2 transition bg-white rounded-md hover:bg-red-50" title="Hapus Dokumen">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>

                                    <!-- Item Dokumen 2 -->
                                    <div class="flex justify-between items-center p-3 border rounded-lg hover:bg-gray-50 transition bg-white">
                                        <div class="flex items-center gap-3">
                                            <div class="bg-red-50 p-2 rounded-md text-red-600 border border-red-100">
                                                <i data-lucide="file-type-2" class="w-5 h-5"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">Peraturan Desa 2024</p>
                                                <p class="text-xs text-gray-500">PDF • 1.1 MB</p>
                                            </div>
                                        </div>
                                        <button class="text-red-500 hover:text-red-700 p-2 transition bg-white rounded-md hover:bg-red-50" title="Hapus Dokumen">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Halaman 4: Potensi -->
                <div id="potensi" class="page-content hidden">
                    <!-- Header Halaman -->
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">Kelola Potensi Desa</h1>
                            <p class="text-sm text-gray-500 mt-1">Atur kategori potensi (Pertanian, Pariwisata, UMKM) dan statistik Fakta Singkat.</p>
                        </div>
                        <button class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg flex items-center text-sm shadow-sm transition">
                            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Potensi Baru
                        </button>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        
                        <!-- KOLOM KIRI & TENGAH: DAFTAR POTENSI DESA (2/3 Lebar) -->
                        <div class="lg:col-span-2 bg-white rounded-lg shadow-sm p-6">
                            <h3 class="font-semibold text-lg mb-4 border-b pb-2 flex items-center justify-between">
                                <span class="flex items-center">
                                    <i data-lucide="grid" class="w-5 h-5 mr-2 text-gray-600"></i> Daftar Potensi Desa
                                </span>
                            </h3>
                            
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Potensi</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 text-sm">
                                        <tr>
                                            <td class="px-4 py-3 font-medium text-gray-800">Pertanian Organik</td>
                                            <td class="px-4 py-3">
                                                <span class="bg-green-100 text-green-800 text-xs px-2.5 py-1 rounded-full font-medium">Pertanian</span>
                                            </td>
                                            <td class="px-4 py-3 text-right space-x-2">
                                                <button class="text-blue-600 hover:text-blue-800 p-1 transition" title="Edit">
                                                    <i data-lucide="edit-3" class="w-4 h-4 inline"></i>
                                                </button>
                                                <button class="text-red-600 hover:text-red-800 p-1 transition" title="Hapus">
                                                    <i data-lucide="trash-2" class="w-4 h-4 inline"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 font-medium text-gray-800">Wisata Alam Pegunungan</td>
                                            <td class="px-4 py-3">
                                                <span class="bg-amber-100 text-amber-800 text-xs px-2.5 py-1 rounded-full font-medium">Pariwisata</span>
                                            </td>
                                            <td class="px-4 py-3 text-right space-x-2">
                                                <button class="text-blue-600 hover:text-blue-800 p-1 transition" title="Edit">
                                                    <i data-lucide="edit-3" class="w-4 h-4 inline"></i>
                                                </button>
                                                <button class="text-red-600 hover:text-red-800 p-1 transition" title="Hapus">
                                                    <i data-lucide="trash-2" class="w-4 h-4 inline"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 font-medium text-gray-800">Kerajinan Tangan & Olahan Pangan</td>
                                            <td class="px-4 py-3">
                                                <span class="bg-purple-100 text-purple-800 text-xs px-2.5 py-1 rounded-full font-medium">UMKM Lokal</span>
                                            </td>
                                            <td class="px-4 py-3 text-right space-x-2">
                                                <button class="text-blue-600 hover:text-blue-800 p-1 transition" title="Edit">
                                                    <i data-lucide="edit-3" class="w-4 h-4 inline"></i>
                                                </button>
                                                <button class="text-red-600 hover:text-red-800 p-1 transition" title="Hapus">
                                                    <i data-lucide="trash-2" class="w-4 h-4 inline"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- KOLOM KANAN: KELOLA FAKTA SINGKAT (1/3 Lebar) -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h3 class="font-semibold text-lg mb-4 border-b pb-2 flex items-center justify-between">
                                <span class="flex items-center">
                                    <i data-lucide="bar-chart-2" class="w-5 h-5 mr-2 text-gray-600"></i> Fakta Singkat
                                </span>
                            </h3>

                            <!-- Form Tambah Fakta Baru -->
                            <div class="bg-gray-50 p-3 rounded-lg border mb-5">
                                <h4 class="text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Tambah Poin Baru</h4>
                                <div class="space-y-2">
                                    <input type="text" class="w-full border rounded-md p-2 text-sm focus:ring-2 focus:ring-green-500 outline-none" placeholder="Label (contoh: Luas Lahan Subur)">
                                    <input type="text" class="w-full border rounded-md p-2 text-sm focus:ring-2 focus:ring-green-500 outline-none" placeholder="Nilai (contoh: 50 Ha)">
                                    <button class="w-full bg-[#166534] hover:bg-[#14532d] text-white py-2 rounded-md text-sm font-medium transition flex items-center justify-center">
                                        <i data-lucide="plus-circle" class="w-4 h-4 mr-1"></i> Tambah Fakta
                                    </button>
                                </div>
                            </div>

                            <!-- List Item Fakta Singkat (Read, Edit, Delete) -->
                            <div class="space-y-3">
                                <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Daftar Poin Aktif</h4>

                                <!-- Item 1 -->
                                <div class="border rounded-lg p-3 bg-white hover:border-gray-300 transition shadow-sm space-y-2">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1 mr-2">
                                            <label class="text-xs text-gray-400 block mb-1">Label / Nama Fakta</label>
                                            <input type="text" class="w-full font-medium text-gray-800 text-sm border-b border-transparent hover:border-gray-300 focus:border-green-500 focus:bg-gray-50 rounded px-1 py-0.5 outline-none" value="Luas Lahan Subur">
                                        </div>
                                        <button class="text-red-500 hover:text-red-700 p-1 transition" title="Hapus Poin">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                    <div>
                                        <label class="text-xs text-gray-400 block mb-1">Nilai / Angka</label>
                                        <input type="text" class="w-full font-bold text-gray-900 text-sm border-b border-transparent hover:border-gray-300 focus:border-green-500 focus:bg-gray-50 rounded px-1 py-0.5 outline-none" value="50 Ha">
                                    </div>
                                </div>

                                <!-- Item 2 -->
                                <div class="border rounded-lg p-3 bg-white hover:border-gray-300 transition shadow-sm space-y-2">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1 mr-2">
                                            <label class="text-xs text-gray-400 block mb-1">Label / Nama Fakta</label>
                                            <input type="text" class="w-full font-medium text-gray-800 text-sm border-b border-transparent hover:border-gray-300 focus:border-green-500 focus:bg-gray-50 rounded px-1 py-0.5 outline-none" value="Kelompok Tani">
                                        </div>
                                        <button class="text-red-500 hover:text-red-700 p-1 transition" title="Hapus Poin">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                    <div>
                                        <label class="text-xs text-gray-400 block mb-1">Nilai / Angka</label>
                                        <input type="text" class="w-full font-bold text-gray-900 text-sm border-b border-transparent hover:border-gray-300 focus:border-green-500 focus:bg-gray-50 rounded px-1 py-0.5 outline-none" value="8 Kelompok">
                                    </div>
                                </div>

                                <!-- Item 3 -->
                                <div class="border rounded-lg p-3 bg-white hover:border-gray-300 transition shadow-sm space-y-2">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1 mr-2">
                                            <label class="text-xs text-gray-400 block mb-1">Label / Nama Fakta</label>
                                            <input type="text" class="w-full font-medium text-gray-800 text-sm border-b border-transparent hover:border-gray-300 focus:border-green-500 focus:bg-gray-50 rounded px-1 py-0.5 outline-none" value="Produksi Padi/Thn">
                                        </div>
                                        <button class="text-red-500 hover:text-red-700 p-1 transition" title="Hapus Poin">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                    <div>
                                        <label class="text-xs text-gray-400 block mb-1">Nilai / Angka</label>
                                        <input type="text" class="w-full font-bold text-gray-900 text-sm border-b border-transparent hover:border-gray-300 focus:border-green-500 focus:bg-gray-50 rounded px-1 py-0.5 outline-none" value="+ 900 Ton">
                                    </div>
                                </div>

                            </div>
                            
                            <!-- Tombol Simpan Perubahan Fakta Singkat -->
                            <button class="w-full mt-4 bg-gray-900 hover:bg-black text-white py-2 rounded-md text-sm transition flex items-center justify-center">
                                <i data-lucide="save" class="w-4 h-4 mr-1.5"></i> Simpan Fakta Singkat
                            </button>
                        </div>

                    </div>
                </div>

                <!-- Halaman 5: Pemerintahan -->
                <div id="pemerintahan" class="page-content hidden">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">Kelola Pemerintahan</h1>
                            <p class="text-sm text-gray-500 mt-1">Edit struktur organisasi, Kepala Desa, dan Perangkat Desa.</p>
                        </div>
                        <button class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg flex items-center text-sm shadow-sm transition">
                            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Perangkat
                        </button>
                    </div>
                    <!-- Form Kepala Desa -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <h3 class="font-semibold text-lg mb-4 border-b pb-2">Kepala Desa Aktif</h3>
                        <div class="flex items-center gap-4">
                            <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center overflow-hidden">
                                <i data-lucide="user" class="text-gray-400 w-12 h-12"></i>
                            </div>
                            <div class="flex-1">
                                <label class="text-sm">Nama Lengkap</label>
                                <input type="text" class="w-full border rounded p-2 mb-2" value="Bapak Budi Santoso, S.E.">
                                <label class="text-sm">Periode</label>
                                <input type="text" class="w-full border rounded p-2" value="2021 - 2027">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Halaman 6: BUMDes -->
                <div id="bumdes" class="page-content hidden">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">Kelola BUMDes</h1>
                            <p class="text-sm text-gray-500 mt-1">Atur Unit Usaha dan Info Kemitraan BUMDes Maju Resapombo.</p>
                        </div>
                        <button class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg flex items-center text-sm shadow-sm transition">
                            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Unit Usaha
                        </button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Card Unit Usaha -->
                        <div class="bg-white rounded-lg shadow-sm border p-4">
                            <h4 class="font-bold mb-1">Unit Toko Desa</h4>
                            <p class="text-sm text-gray-500 mb-3">Penyediaan Kebutuhan Pokok</p>
                            <div class="flex justify-between border-t pt-3">
                                <button class="text-blue-600 text-sm">Edit</button>
                                <button class="text-red-600 text-sm">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Halaman 7: Berita & Artikel (Asli dari User) -->
                <div id="berita" class="page-content hidden">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">Kelola Berita & Artikel</h1>
                            <p class="text-sm text-gray-500 mt-1">Atur konten untuk halaman Berita di website utama.</p>
                        </div>
                        <button class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg flex items-center text-sm shadow-sm transition">
                            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Berita
                        </button>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Artikel</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">Peresmian Fasilitas Irigasi Baru</div>
                                            <div class="text-sm text-gray-500">Oleh: Tim Redaksi Desa</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Pembangunan</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15 Oktober 2024</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-[#166534]">Published</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                            <a href="#" class="text-red-600 hover:text-red-900">Hapus</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Halaman 8: FAQ -->
                <div id="faq" class="page-content hidden">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">Kelola Tanya Jawab (FAQ)</h1>
                            <p class="text-sm text-gray-500 mt-1">Daftar pertanyaan yang sering diajukan oleh masyarakat.</p>
                        </div>
                        <button class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg flex items-center text-sm shadow-sm transition">
                            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah FAQ
                        </button>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="border border-gray-200 rounded p-4 mb-4">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="font-semibold">Apa saja persyaratan untuk membuat Surat Keterangan Usaha (SKU)?</h4>
                                <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded">Administrasi</span>
                            </div>
                            <p class="text-gray-500 text-sm mb-4">Membawa fotokopi KTP, KK, dan surat pengantar dari RT/RW setempat...</p>
                            <div class="flex justify-end gap-3 border-t pt-2">
                                <button class="text-blue-600 text-sm">Edit</button>
                                <button class="text-red-600 text-sm">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- Script Interaktivitas -->
    <script>
        // Inisialisasi ikon Lucide
        lucide.createIcons();

        // Fungsi Switch Halaman (Tab/SPA)
        function switchPage(pageId, clickedMenu) {
            // 1. Sembunyikan semua konten halaman
            const pages = document.querySelectorAll('.page-content');
            pages.forEach(page => {
                page.classList.remove('block');
                page.classList.add('hidden');
            });

            // 2. Tampilkan halaman yang dipilih
            const targetPage = document.getElementById(pageId);
            if (targetPage) {
                targetPage.classList.remove('hidden');
                targetPage.classList.add('block');
            }

            // 3. Hapus status 'Aktif' dari semua menu di sidebar
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(menu => {
                menu.classList.remove('bg-[#14532d]', 'border-white');
                menu.classList.add('hover:bg-[#14532d]', 'border-transparent');
            });

            // 4. Tambahkan status 'Aktif' pada menu yang diklik
            if (clickedMenu) {
                clickedMenu.classList.remove('hover:bg-[#14532d]', 'border-transparent');
                clickedMenu.classList.add('bg-[#14532d]', 'border-white');
            }

            // Tutup sidebar di mode mobile saat menu diklik
            if (window.innerWidth < 768 && !sidebar.classList.contains('hidden')) {
                toggleMobileMenu();
            }
        }

        // Toggle Sidebar untuk Mobile Responsiveness
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');

        function toggleMobileMenu() {
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
                sidebar.classList.add('absolute', 'z-50', 'h-full');
            } else {
                sidebar.classList.add('hidden');
                sidebar.classList.remove('absolute', 'z-50', 'h-full');
            }
        }

        mobileBtn.addEventListener('click', toggleMobileMenu);
    </script>
</body>
</html>