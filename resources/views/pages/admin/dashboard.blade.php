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
        <aside id="sidebar"
            class="bg-[#166534] text-white w-64 flex-shrink-0 hidden md:flex flex-col transition-all duration-300 relative z-30">
            <div class="h-16 flex items-center justify-center border-b border-[#14532d]">
                <h2 class="text-xl font-bold">Admin Resapombo</h2>
            </div>

            <nav class="flex-1 overflow-y-auto py-4">
                <ul class="space-y-1">
                    <li><a href="#" onclick="switchPage('dashboard', this)"
                            class="menu-item flex items-center px-6 py-3 bg-[#14532d] border-l-4 border-white transition"><i
                                data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i> Dashboard</a></li>
                    <li><a href="#" onclick="switchPage('home', this)"
                            class="menu-item flex items-center px-6 py-3 hover:bg-[#14532d] border-l-4 border-transparent transition"><i
                                data-lucide="home" class="w-5 h-5 mr-3"></i> Home / Landing</a></li>
                    <li><a href="#" onclick="switchPage('profil', this)"
                            class="menu-item flex items-center px-6 py-3 hover:bg-[#14532d] border-l-4 border-transparent transition"><i
                                data-lucide="info" class="w-5 h-5 mr-3"></i> Profil Desa</a></li>
                    <li><a href="#" onclick="switchPage('pemerintahan', this)"
                            class="menu-item flex items-center px-6 py-3 hover:bg-[#14532d] border-l-4 border-transparent transition"><i
                                data-lucide="building" class="w-5 h-5 mr-3"></i> Pemerintahan</a></li>
                    <li><a href="#" onclick="switchPage('potensi', this)"
                            class="menu-item flex items-center px-6 py-3 hover:bg-[#14532d] border-l-4 border-transparent transition"><i
                                data-lucide="sprout" class="w-5 h-5 mr-3"></i> Potensi</a></li>
                    <li><a href="#" onclick="switchPage('bumdes', this)"
                            class="menu-item flex items-center px-6 py-3 hover:bg-[#14532d] border-l-4 border-transparent transition"><i
                                data-lucide="shopping-bag" class="w-5 h-5 mr-3"></i> BUMDes</a></li>
                    <li><a href="#" onclick="switchPage('berita', this)"
                            class="menu-item flex items-center px-6 py-3 hover:bg-[#14532d] border-l-4 border-transparent transition"><i
                                data-lucide="newspaper" class="w-5 h-5 mr-3"></i> Berita & Artikel</a></li>
                    <li><a href="#" onclick="switchPage('faq', this)"
                            class="menu-item flex items-center px-6 py-3 hover:bg-[#14532d] border-l-4 border-transparent transition"><i
                                data-lucide="help-circle" class="w-5 h-5 mr-3"></i> FAQ</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6 z-10">
                <button id="mobile-menu-btn" onclick="toggleMobileSidebar()" class="md:hidden text-gray-500 hover:text-[#166534] focus:outline-none">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>

                <div class="flex-1"></div>

                <div class="flex items-center">
                    <span class="text-sm font-medium text-gray-700 mr-4">Halo, Admin</span>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-red-600 hover:text-red-800 font-semibold flex items-center">
                            <i data-lucide="log-out" class="w-4 h-4 mr-1"></i> Logout
                        </button>
                    </form>
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
                            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalBerita }}</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-blue-500">
                            <h3 class="text-gray-500 text-sm">Total Potensi Desa</h3>
                            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalPotensi }}</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-yellow-500">
                            <h3 class="text-gray-500 text-sm">Pertanyaan FAQ</h3>
                            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalFaq }}</p>
                        </div>
                    </div>
                </div>

                <!-- Halaman 2: Home / Landing -->
                <div id="home" class="page-content hidden">
                    <form action="{{ route('admin.informasi.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                            <div>
                                <h1 class="text-2xl font-semibold text-gray-900">Kelola Beranda (Landing Page)</h1>
                                <p class="text-sm text-gray-500 mt-1">Edit teks hero banner dan statistik penduduk.</p>
                            </div>
                            <button type="submit"
                                class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg flex items-center text-sm shadow-sm transition">
                                <i data-lucide="save" class="w-4 h-4 mr-2"></i> Simpan Perubahan
                            </button>
                        </div>

                        <!-- Data Statistik -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h3 class="font-semibold text-lg mb-4 border-b pb-2 text-gray-800">Data Statistik</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
                                <div>
                                    <label for="penduduk" class="block text-sm font-medium text-gray-700 mb-1">Penduduk</label>
                                    <input type="text" id="penduduk" name="jumlah_penduduk"
                                        class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-[#166534] focus:border-transparent outline-none transition"
                                        value="{{ old('jumlah_penduduk', $informasi->jumlah_penduduk ?? '5.420') }}" required>
                                </div>
                                <div>
                                    <label for="luas_wilayah" class="block text-sm font-medium text-gray-700 mb-1">Luas Wilayah</label>
                                    <input type="text" id="luas_wilayah" name="luas_wilayah"
                                        class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-[#166534] focus:border-transparent outline-none transition"
                                        value="{{ old('luas_wilayah', $informasi->luas_wilayah ?? '-') }}" required>
                                </div>
                                <div>
                                    <label for="dusun" class="block text-sm font-medium text-gray-700 mb-1">Dusun</label>
                                    <input type="text" id="dusun" name="jumlah_dusun"
                                        class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-[#166534] focus:border-transparent outline-none transition"
                                        value="{{ old('jumlah_dusun', $informasi->jumlah_dusun ?? '-') }}" required>
                                </div>
                                <div>
                                    <label for="rt" class="block text-sm font-medium text-gray-700 mb-1">RT</label>
                                    <input type="text" id="rt" name="jumlah_rt"
                                        class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-[#166534] focus:border-transparent outline-none transition"
                                        value="{{ old('jumlah_rt', $informasi->jumlah_rt ?? '-') }}" required>
                                </div>
                                <div>
                                    <label for="rw" class="block text-sm font-medium text-gray-700 mb-1">RW</label>
                                    <input type="text" id="rw" name="jumlah_rw"
                                        class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-[#166534] focus:border-transparent outline-none transition"
                                        value="{{ old('jumlah_rw', $informasi->jumlah_rw ?? '-') }}" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Halaman 3: Profil Desa -->
                <div id="profil" class="page-content hidden">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">Kelola Profil Desa</h1>
                            <p class="text-sm text-gray-500 mt-1">Edit Visi, Misi, Dokumen Desa, dan Riwayat Kepala Desa.</p>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="mb-6 p-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-200 flex items-center">
                            <i data-lucide="check-circle" class="w-5 h-5 mr-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                        <!-- KARTU 1: VISI & MISI -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h3 class="font-semibold text-lg mb-4 border-b pb-2 flex items-center">
                                <i data-lucide="target" class="w-5 h-5 mr-2 text-gray-600"></i> Visi & Misi
                            </h3>

                            <form action="{{ route('admin.profil.visi.update') }}" method="POST" class="mb-8">
                                @csrf
                                @method('PUT')
                                <div class="mb-2">
                                    <label class="block mb-2 text-sm font-medium text-gray-700">Visi Desa</label>
                                    <textarea name="isi"
                                        class="w-full border rounded-lg p-3 h-20 focus:ring-2 focus:ring-green-500 outline-none">{{ old('isi', $visi->isi ?? '') }}</textarea>
                                    @error('isi')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit"
                                    class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg text-sm shadow-sm transition flex items-center">
                                    <i data-lucide="save" class="w-4 h-4 mr-2"></i> Simpan Visi
                                </button>
                            </form>

                            <label class="block mb-2 text-sm font-medium text-gray-700">Misi Desa</label>
                            <form action="{{ route('admin.profil.misi.store') }}" method="POST"
                                class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-4">
                                @csrf
                                <h4 class="text-sm font-medium text-gray-800 mb-3">Tambah Misi Baru</h4>
                                <div class="space-y-3">
                                    <div>
                                        <input type="text" name="judul" value="{{ old('judul') }}"
                                            class="w-full border rounded-md p-2 text-sm focus:ring-2 focus:ring-green-500 outline-none"
                                            placeholder="Judul Misi">
                                        @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <textarea name="deskripsi"
                                            class="w-full border rounded-md p-2 text-sm h-16 focus:ring-2 focus:ring-green-500 outline-none"
                                            placeholder="Deskripsi Misi">{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <button type="submit"
                                        class="text-sm text-[#166534] font-medium flex items-center hover:underline">
                                        <i data-lucide="plus-circle" class="w-4 h-4 mr-1"></i> Tambah Misi
                                    </button>
                                </div>
                            </form>

                            <div class="space-y-3" id="misi-container">
                                @forelse ($misi as $item)
                                    <div class="flex gap-3 items-start border p-3 rounded-lg bg-white hover:bg-gray-50 transition">
                                        <div class="flex-1 space-y-1">
                                            <p class="font-semibold text-sm text-gray-900">{{ $item->judul }}</p>
                                            <p class="text-sm text-gray-600">{{ $item->deskripsi }}</p>
                                        </div>
                                        <form action="{{ route('admin.profil.misi.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin mau hapus misi ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700 p-2 transition rounded-md hover:bg-red-50"
                                                title="Hapus Misi">
                                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                                            </button>
                                        </form>
                                    </div>
                                @empty
                                    <p class="text-sm text-gray-500 italic text-center p-4 border rounded-lg bg-gray-50">
                                        Belum ada misi yang ditambahkan.</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- KARTU 2: DOKUMEN PUBLIK (PDF) -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h3 class="font-semibold text-lg mb-4 border-b pb-2 flex items-center">
                                <i data-lucide="file-text" class="w-5 h-5 mr-2 text-gray-600"></i> Dokumen Publik
                            </h3>

                            <form action="{{ route('admin.profil.dokumen.store') }}" method="POST"
                                enctype="multipart/form-data"
                                class="bg-green-50 p-4 rounded-lg border border-green-100 mb-5">
                                @csrf
                                <h4 class="text-sm font-medium text-green-900 mb-3">Upload Dokumen Baru</h4>
                                <div class="space-y-3">
                                    <div>
                                        <input type="text" name="nama" value="{{ old('nama') }}"
                                            class="w-full border rounded-md p-2 text-sm focus:ring-2 focus:ring-green-500 outline-none"
                                            placeholder="Nama Dokumen (Contoh: RPJMDes 2024)">
                                        @error('nama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>

                                    <div class="flex flex-col sm:flex-row items-center gap-2">
                                        <input type="file" name="file" accept="application/pdf"
                                            class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-white file:text-green-700 file:border file:border-gray-200 hover:file:bg-gray-50">
                                        <button type="submit"
                                            class="w-full sm:w-auto bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-md text-sm whitespace-nowrap transition flex items-center justify-center">
                                            <i data-lucide="upload" class="w-4 h-4 mr-1"></i> Upload
                                        </button>
                                    </div>
                                    @error('file') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                            </form>

                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-3">Dokumen Tersedia</h4>
                                <div class="space-y-2">
                                    @forelse ($dokumen as $item)
                                        <div class="flex justify-between items-center p-3 border rounded-lg hover:bg-gray-50 transition bg-white">
                                            <div class="flex items-center gap-3 min-w-0">
                                                <div class="bg-red-50 p-2 rounded-md text-red-600 border border-red-100 shrink-0">
                                                    <i data-lucide="file-type-2" class="w-5 h-5"></i>
                                                </div>
                                                <div class="min-w-0">
                                                    <a href="{{ route('admin.profil.dokumen.lihat', $item->id) }}"
                                                        target="_blank"
                                                        class="text-sm font-medium text-gray-800 hover:text-green-700 hover:underline block truncate"
                                                        title="{{ $item->nama }}">
                                                        {{ $item->nama }}
                                                    </a>
                                                    <p class="text-xs text-gray-500">Berkas PDF</p>
                                                </div>
                                            </div>
                                            <form action="{{ route('admin.profil.dokumen.destroy', $item->id) }}"
                                                method="POST" onsubmit="return confirm('Yakin mau hapus dokumen ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-500 hover:text-red-700 p-2 transition bg-white rounded-md hover:bg-red-50 shrink-0"
                                                    title="Hapus Dokumen">
                                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @empty
                                        <p class="text-sm text-gray-500 italic text-center p-4 border rounded-lg bg-gray-50">
                                            Belum ada dokumen publik.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- KARTU 3: RIWAYAT KEPALA DESA -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mt-6">
                        <h3 class="font-semibold text-lg mb-4 border-b pb-2 flex items-center">
                            <i data-lucide="users" class="w-5 h-5 mr-2 text-gray-600"></i> Riwayat Kepala Desa
                        </h3>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <div class="col-span-1">
                                <form action="{{ route('admin.profil.kepala-desa.store') }}" method="POST"
                                    enctype="multipart/form-data" class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                                    @csrf
                                    <h4 class="text-sm font-medium text-blue-900 mb-3">Tambah Data Kades</h4>
                                    <div class="space-y-3">
                                        <div>
                                            <label class="block mb-1 text-xs font-medium text-gray-700">Nama Lengkap</label>
                                            <input type="text" name="nama" value="{{ old('nama') }}"
                                                class="w-full border rounded-md p-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                                            @error('nama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                        </div>
                                        <div>
                                            <label class="block mb-1 text-xs font-medium text-gray-700">Masa Jabatan (cth: 1945 - 1967)</label>
                                            <input type="text" name="masa_jabatan" value="{{ old('masa_jabatan') }}"
                                                class="w-full border rounded-md p-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                                            @error('masa_jabatan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                        </div>
                                        <div>
                                            <label class="block mb-1 text-xs font-medium text-gray-700">Foto Profil</label>
                                            <input type="file" name="foto" accept="image/*"
                                                class="w-full text-sm text-gray-600 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-white file:text-blue-700 file:border file:border-gray-200 hover:file:bg-gray-50">
                                            @error('foto') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                        </div>
                                        <button type="submit"
                                            class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm transition flex items-center justify-center mt-2">
                                            <i data-lucide="plus" class="w-4 h-4 mr-1"></i> Tambah Data
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-span-1 lg:col-span-2">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    @forelse ($kepalaDesa as $item)
                                        <div class="flex gap-4 items-center p-4 border rounded-lg hover:bg-gray-50 transition bg-white shadow-sm min-w-0">
                                            <div class="w-16 h-16 rounded-full overflow-hidden bg-gray-100 border border-gray-200 flex-shrink-0 flex justify-center items-center">
                                                @if ($item->foto)
                                                    <img src="{{ asset($item->foto) }}" alt="{{ $item->nama }}"
                                                        class="w-full h-full object-cover">
                                                @else
                                                    <i data-lucide="user" class="w-8 h-8 text-gray-400"></i>
                                                @endif
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-semibold text-gray-900 truncate" title="{{ $item->nama }}">{{ $item->nama }}</p>
                                                <p class="text-xs text-gray-600 mb-2 truncate">Periode: {{ $item->masa_jabatan }}</p>
                                                <form action="{{ route('admin.profil.kepala-desa.destroy', $item->id) }}"
                                                    method="POST" onsubmit="return confirm('Yakin mau hapus riwayat kepala desa ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-xs text-red-500 hover:text-red-700 font-medium flex items-center bg-red-50 hover:bg-red-100 px-2 py-1 rounded transition">
                                                        <i data-lucide="trash-2" class="w-3 h-3 mr-1"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-span-full p-6 text-center text-sm text-gray-500 border border-dashed rounded-lg bg-gray-50">
                                            Belum ada riwayat kepala desa yang ditambahkan.
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Halaman 4: Potensi -->
                <div id="potensi" class="page-content hidden">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">Kelola Potensi Desa</h1>
                            <p class="text-sm text-gray-500 mt-1">Atur kategori potensi dan statistik Fakta Singkat.</p>
                        </div>
                        <button onclick="openModal('addModal')"
                            class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg flex items-center text-sm shadow-sm transition">
                            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Potensi Baru
                        </button>
                    </div>

                    @if (session('success'))
                        <div class="mb-6 p-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-200 flex items-center">
                            <i data-lucide="check-circle" class="w-5 h-5 mr-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 p-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200">
                            <div class="flex items-center mb-2 font-semibold">
                                <i data-lucide="alert-circle" class="w-5 h-5 mr-2"></i> Terdapat Kesalahan:
                            </div>
                            <ul class="list-disc pl-9 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 bg-white rounded-lg shadow-sm p-6">
                            <h3 class="font-semibold text-lg mb-4 border-b pb-2 flex items-center justify-between">
                                <span class="flex items-center">
                                    <i data-lucide="grid" class="w-5 h-5 mr-2 text-gray-600"></i> Daftar Potensi Desa
                                </span>
                            </h3>

                            <!-- TABEL 1: POTENSI DESA -->
                            <div class="overflow-x-auto">
                                <table class="w-full table-fixed divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="w-20 px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">Gambar</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">Info Potensi</th>
                                            <th class="w-32 px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">Kategori</th>
                                            <th class="w-24 px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase whitespace-nowrap">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 text-sm">
                                        @forelse ($potensi as $item)
                                            <tr class="hover:bg-gray-50 transition">
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    @if ($item->gambar)
                                                        <img src="{{ asset($item->gambar) }}" alt="{{ $item->nama }}" class="w-14 h-14 object-cover rounded-md border">
                                                    @else
                                                        <div class="w-14 h-14 bg-gray-100 rounded-md border flex items-center justify-center text-gray-400">
                                                            <i data-lucide="image" class="w-6 h-6"></i>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="px-4 py-3 truncate">
                                                    <p class="font-medium text-gray-900 truncate" title="{{ $item->nama }}">{{ $item->nama }}</p>
                                                    <p class="text-xs text-gray-500 mt-1 truncate" title="{{ $item->deskripsi }}">
                                                        {{ $item->deskripsi }}
                                                    </p>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    @php
                                                        $color = match ($item->kategori) {
                                                            'Pertanian' => 'bg-green-100 text-green-800',
                                                            'Pariwisata' => 'bg-amber-100 text-amber-800',
                                                            'UMKM' => 'bg-purple-100 text-purple-800',
                                                            'Peternakan' => 'bg-orange-100 text-orange-800',
                                                            'Perkebunan' => 'bg-lime-100 text-lime-800',
                                                            default => 'bg-gray-100 text-gray-800'
                                                        };
                                                    @endphp
                                                    <span class="{{ $color }} text-xs px-2.5 py-1 rounded-full font-medium whitespace-nowrap inline-block truncate max-w-full">
                                                        {{ $item->kategori ?? '-' }}
                                                    </span>
                                                </td>
                                                <td class="px-4 py-3 text-right space-x-1 whitespace-nowrap">
                                                    <button onclick="openModal('editModal{{ $item->id }}')" class="text-blue-600 hover:text-blue-800 hover:bg-blue-50 p-1.5 rounded transition" title="Edit">
                                                        <i data-lucide="edit-3" class="w-4 h-4 inline"></i>
                                                    </button>
                                                    <form action="{{ route('admin.potensi.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin mau hapus potensi ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800 hover:bg-red-50 p-1.5 rounded transition" title="Hapus">
                                                            <i data-lucide="trash-2" class="w-4 h-4 inline"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="px-4 py-8 text-center text-gray-500 text-sm italic bg-gray-50">
                                                    Belum ada data potensi desa. Klik "Tambah Potensi Baru" untuk memulai.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div>
                            <div class="bg-white rounded-lg shadow-sm p-6 h-fit">
                                <h3 class="font-semibold text-lg mb-4 border-b pb-2 flex items-center justify-between">
                                    <span class="flex items-center">
                                        <i data-lucide="bar-chart-2" class="w-5 h-5 mr-2 text-gray-600"></i> Fakta Singkat
                                    </span>
                                </h3>

                                <form action="{{ route('admin.fakta.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="space-y-3">
                                        <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Atur Data Statistik</h4>
                                        <div class="border rounded-lg p-3 bg-white hover:border-gray-300 transition shadow-sm space-y-2">
                                            <div>
                                                <label class="text-xs text-gray-500 block mb-1">Luas Lahan Baku (Ha)</label>
                                                <input type="number" step="0.01" name="luas_lahan_baku" class="w-full font-bold text-gray-900 text-sm border-b border-transparent hover:border-gray-300 focus:border-green-500 focus:bg-gray-50 rounded px-1 py-0.5 outline-none transition" value="{{ old('luas_lahan_baku', $fakta->luas_lahan_baku ?? 0) }}">
                                            </div>
                                        </div>
                                        <div class="border rounded-lg p-3 bg-white hover:border-gray-300 transition shadow-sm space-y-2">
                                            <div>
                                                <label class="text-xs text-gray-500 block mb-1">Jumlah Kelompok Tani</label>
                                                <input type="number" name="kelompok_tani" class="w-full font-bold text-gray-900 text-sm border-b border-transparent hover:border-gray-300 focus:border-green-500 focus:bg-gray-50 rounded px-1 py-0.5 outline-none transition" value="{{ old('kelompok_tani', $fakta->kelompok_tani ?? 0) }}">
                                            </div>
                                        </div>
                                        <div class="border rounded-lg p-3 bg-white hover:border-gray-300 transition shadow-sm space-y-2">
                                            <div>
                                                <label class="text-xs text-gray-500 block mb-1">Produksi Padi (Ton)</label>
                                                <input type="number" step="0.01" name="produksi_padi" class="w-full font-bold text-gray-900 text-sm border-b border-transparent hover:border-gray-300 focus:border-green-500 focus:bg-gray-50 rounded px-1 py-0.5 outline-none transition" value="{{ old('produksi_padi', $fakta->produksi_padi ?? 0) }}">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="w-full mt-4 bg-gray-900 hover:bg-black text-white py-2 rounded-md text-sm transition flex items-center justify-center">
                                        <i data-lucide="save" class="w-4 h-4 mr-1.5"></i> Simpan Fakta Singkat
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Halaman Pemerintahan -->
                <div id="pemerintahan" class="page-content hidden">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">Kelola Pemerintahan</h1>
                            <p class="text-sm text-gray-500 mt-1">Edit struktur organisasi, Kepala Desa, dan Perangkat Desa.</p>
                        </div>
                        <button onclick="openModal('addPerangkatModal')" class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg flex items-center text-sm shadow-sm transition">
                            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Perangkat
                        </button>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg flex items-center">
                            <i data-lucide="check-circle" class="w-5 h-5 mr-2"></i>
                            <span class="text-sm font-medium">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
                            <div class="flex items-center mb-2">
                                <i data-lucide="alert-circle" class="w-5 h-5 mr-2"></i>
                                <span class="text-sm font-bold">Terjadi Kesalahan:</span>
                            </div>
                            <ul class="list-disc pl-9 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @php
                        $kades = $perangkat->firstWhere('jabatan.tingkat', 1);
                    @endphp

                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 mb-6">
                        <h3 class="font-semibold text-lg mb-4 border-b border-gray-100 pb-2">Kepala Desa Aktif</h3>
                        @if($kades)
                            <div class="flex items-center gap-6">
                                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center overflow-hidden border-2 border-[#166534] shrink-0">
                                    @if($kades->foto)
                                        <img src="{{ asset($kades->foto) }}" alt="Foto Kades" class="w-full h-full object-cover">
                                    @else
                                        <i data-lucide="user" class="text-gray-400 w-12 h-12"></i>
                                    @endif
                                </div>
                                <div class="flex-1 space-y-3 min-w-0">
                                    <div>
                                        <label class="text-xs text-gray-500 font-bold uppercase tracking-wider">Nama Lengkap</label>
                                        <div class="text-lg font-semibold text-gray-900 mt-1 truncate" title="{{ $kades->nama }}">{{ $kades->nama }}</div>
                                    </div>
                                    <div class="flex gap-8">
                                        <div>
                                            <label class="text-xs text-gray-500 font-bold uppercase tracking-wider">Jabatan</label>
                                            <div class="text-sm text-gray-700 mt-1 truncate">{{ $kades->jabatan->nama ?? '-' }}</div>
                                        </div>
                                        <div>
                                            <label class="text-xs text-gray-500 font-bold uppercase tracking-wider">No. WhatsApp</label>
                                            <div class="text-sm text-gray-700 mt-1 truncate">{{ $kades->no_wa ?? '-' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p class="text-sm text-gray-500 italic">Data Kepala Desa belum ada. Silakan tambahkan perangkat dengan Tingkat Jabatan 1.</p>
                        @endif
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-7 gap-6">
                        <div class="lg:col-span-2 bg-white rounded-lg shadow-sm border border-gray-100 p-6">
                            <h3 class="font-semibold text-lg mb-4 border-b border-gray-100 pb-2">Kelola Jabatan</h3>

                            <form action="{{ route('admin.jabatan.store') }}" method="POST" class="mb-6 space-y-3">
                                @csrf
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Jabatan</label>
                                    <input type="text" name="nama" placeholder="Cth: Kepala Dusun" class="w-full border border-gray-300 rounded-md p-2 text-sm focus:ring-2 focus:ring-[#166534] outline-none" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Tingkat (1 = Tertinggi)</label>
                                    <input type="number" name="tingkat" min="1" placeholder="Cth: 2" class="w-full border border-gray-300 rounded-md p-2 text-sm focus:ring-2 focus:ring-[#166534] outline-none" required>
                                </div>
                                <button type="submit" class="w-full bg-gray-800 hover:bg-gray-900 text-white px-4 py-2 rounded-lg text-sm shadow-sm transition">Tambah Jabatan</button>
                            </form>

                            <!-- TABEL 2: JABATAN -->
                            <div class="overflow-x-auto rounded-lg border border-gray-200">
                                <table class="w-full table-fixed text-sm text-left text-gray-600">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                                        <tr>
                                            <th class="px-4 py-3 text-center w-12 whitespace-nowrap">Tk.</th>
                                            <th class="px-4 py-3 whitespace-nowrap">Nama Jabatan</th>
                                            <th class="px-4 py-3 text-center w-16 whitespace-nowrap">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($jabatan as $item)
                                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                                                <td class="px-4 py-3 text-center font-medium truncate">{{ $item->tingkat }}</td>
                                                <td class="px-4 py-3 truncate" title="{{ $item->nama }}">{{ $item->nama }}</td>
                                                <td class="px-4 py-3 text-center whitespace-nowrap">
                                                    <form action="{{ route('admin.jabatan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus jabatan ini? Semua perangkat dengan jabatan ini juga akan terhapus!')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:text-red-700 transition" title="Hapus">
                                                            <i data-lucide="trash-2" class="w-4 h-4 inline"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="px-4 py-6 text-center text-sm text-gray-400 italic">Belum ada data jabatan.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="lg:col-span-5 bg-white rounded-lg shadow-sm border border-gray-100 p-6">
                            <h3 class="font-semibold text-lg mb-4 border-b border-gray-100 pb-2">Daftar Perangkat Desa</h3>

                            <!-- TABEL 3: PERANGKAT DESA -->
                            <div class="overflow-x-auto">
                                <table class="w-full table-fixed text-sm text-left text-gray-600">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-y border-gray-200">
                                        <tr>
                                            <th class="px-4 py-3 w-16 whitespace-nowrap">Foto</th>
                                            <th class="px-4 py-3 w-1/4 whitespace-nowrap">Nama</th>
                                            <th class="px-4 py-3 w-1/5 whitespace-nowrap">Jabatan</th>
                                            <th class="px-4 py-3 w-28 whitespace-nowrap">No WA</th>
                                            <th class="px-4 py-3 whitespace-nowrap">Detail</th>
                                            <th class="px-4 py-3 text-center w-24 whitespace-nowrap">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($perangkat as $item)
                                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="w-10 h-10 rounded-full bg-gray-200 overflow-hidden">
                                                        @if ($item->foto)
                                                            <img src="{{ asset($item->foto) }}" class="w-full h-full object-cover">
                                                        @else
                                                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                                                <i data-lucide="user" class="w-5 h-5"></i>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 font-medium text-gray-900 truncate" title="{{ $item->nama }}">{{ $item->nama }}</td>
                                                <td class="px-4 py-3 truncate">
                                                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full inline-block truncate max-w-full">
                                                        {{ $item->jabatan->nama ?? '-' }}
                                                    </span>
                                                </td>
                                                <td class="px-4 py-3 truncate">{{ $item->no_wa ?? '-' }}</td>
                                                <td class="px-4 py-3 truncate" title="{{ $item->kata_sambutan }}">
                                                    {{ $item->kata_sambutan ?? '-' }}
                                                </td>
                                                <td class="px-4 py-3 text-center space-x-1 whitespace-nowrap">
                                                    <button onclick="openModal('editPerangkatModal{{ $item->id }}')" class="text-blue-600 hover:text-blue-800 transition p-1" title="Edit">
                                                        <i data-lucide="edit" class="w-4 h-4 inline"></i>
                                                    </button>
                                                    <form action="{{ route('admin.perangkat.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin mau hapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:text-red-700 transition p-1" title="Hapus">
                                                            <i data-lucide="trash-2" class="w-4 h-4 inline"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="px-4 py-8 text-center text-sm text-gray-400 italic">Belum ada data perangkat desa.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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
                        <button onclick="openModal('tambahUnitUsahaModal')" class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg flex items-center text-sm shadow-sm transition">
                            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah BUMDes
                        </button>
                    </div>

                    @if (session('success'))
                        <div class="mb-6 p-4 text-sm text-green-800 bg-green-100 rounded-lg border border-green-200">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 p-4 text-sm text-red-800 bg-red-100 rounded-lg border border-red-200">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 items-start">
                        <div class="lg:col-span-3">
                            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                                <!-- TABEL 4: BUMDES -->
                                <div class="overflow-x-auto">
                                    <table class="w-full table-fixed text-left text-sm text-gray-600">
                                        <thead class="bg-gray-50 text-gray-900 border-b border-gray-100">
                                            <tr>
                                                <th class="p-4 font-semibold w-24 whitespace-nowrap">Gambar</th>
                                                <th class="p-4 font-semibold w-1/3 whitespace-nowrap">Nama</th>
                                                <th class="p-4 font-semibold whitespace-nowrap">Deskripsi</th>
                                                <th class="p-4 font-semibold text-center w-28 whitespace-nowrap">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-100">
                                            @forelse ($bumdes as $item)
                                                <tr class="hover:bg-gray-50 transition">
                                                    <td class="p-4 whitespace-nowrap">
                                                        @if ($item->gambar)
                                                            <img src="{{ asset($item->gambar) }}" alt="{{ $item->nama }}" class="w-16 h-16 object-cover rounded-md border border-gray-200 shadow-sm">
                                                        @else
                                                            <div class="w-16 h-16 bg-gray-100 rounded-md border border-gray-200 flex items-center justify-center text-gray-400 text-xs italic">-</div>
                                                        @endif
                                                    </td>
                                                    <td class="p-4 font-medium text-gray-900 truncate" title="{{ $item->nama }}">{{ $item->nama }}</td>
                                                    <td class="p-4 text-xs text-gray-500 truncate" title="{{ $item->deskripsi }}">{{ $item->deskripsi }}</td>
                                                    <td class="p-4 whitespace-nowrap text-center">
                                                        <div class="flex items-center justify-center space-x-2">
                                                            <button type="button" onclick="openModal('editBumdesModal{{ $item->id }}')" class="text-blue-600 hover:text-blue-800 font-medium text-xs transition">
                                                                Edit
                                                            </button>
                                                            <form action="{{ route('admin.bumdes.destroy', $item->id) }}" method="POST" class="inline-block m-0 p-0" onsubmit="return confirm('Yakin mau hapus data ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium text-xs transition">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="p-8 text-center text-gray-500 text-sm italic">Belum ada data BUMDes.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-2 bg-white rounded-lg shadow-sm border border-gray-100 p-6 h-fit">
                            <h3 class="font-semibold text-lg mb-4 border-b pb-2 flex items-center justify-between">
                                <span class="flex items-center">
                                    <i data-lucide="phone" class="w-5 h-5 mr-2 text-gray-600"></i> Kontak BUMDes
                                </span>
                            </h3>

                            <form action="{{ route('admin.bumdes.kontak.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="space-y-4">
                                    <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Atur narahubung & Profil</h4>
                                    <div class="border rounded-lg p-3 bg-white hover:border-gray-300 transition shadow-sm space-y-2">
                                        <div>
                                            <label class="text-xs text-gray-500 block mb-1">Gunakan format wa.me/62xxxxxxxxx</label>
                                            <input type="text" name="no_wa" class="w-full font-bold text-gray-900 text-sm border-b border-transparent hover:border-gray-300 focus:border-green-500 focus:bg-gray-50 rounded px-1 py-0.5 outline-none transition" value="{{ old('no_wa', $KontakBumdes->no_wa ?? '') }}" placeholder="Contoh: wa.me/6281234567890">
                                        </div>
                                    </div>

                                    <div class="border rounded-lg p-3 bg-white hover:border-gray-300 transition shadow-sm space-y-2">
                                        <div>
                                            <label class="text-xs text-gray-500 block mb-1">File Profil BUMDes (PDF)</label>
                                            <input type="file" name="file_profil" accept="application/pdf" class="w-full text-sm text-gray-900 border border-gray-300 rounded cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-1 file:px-4 file:rounded-l file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                                            @if(isset($KontakBumdes) && $KontakBumdes->file_profil)
                                                <p class="text-xs text-green-600 mt-2 flex items-center truncate">
                                                    <i data-lucide="check-circle" class="w-3 h-3 mr-1 inline shrink-0"></i>
                                                    <a href="{{ asset($KontakBumdes->file_profil) }}" target="_blank" class="hover:underline truncate">Lihat file profil saat ini</a>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="w-full mt-6 bg-gray-900 hover:bg-black text-white py-2.5 rounded-md text-sm font-medium transition flex items-center justify-center">
                                    <i data-lucide="save" class="w-4 h-4 mr-2"></i> Simpan Kontak BUMDes
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Halaman 7: Berita -->
                <div id="berita" class="page-content hidden">
                    @if (session('success'))
                        <div class="mb-4 bg-green-100 text-[#166534] px-4 py-2 rounded-lg text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">Kelola Berita & Artikel</h1>
                            <p class="text-sm text-gray-500 mt-1">Atur konten untuk halaman Berita di website utama.</p>
                        </div>
                        <button type="button" onclick="openModal('modalCreateBerita')"
                            class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg flex items-center text-sm shadow-sm transition">
                            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Berita
                        </button>
                    </div>

                    <!-- Kategori Berita -->
                    <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
                        <h3 class="text-sm font-semibold text-gray-700 mb-3">Kategori Berita</h3>
                        <form action="{{ route('admin.kategori-berita.store') }}" method="POST" class="flex gap-2 mb-3">
                            @csrf
                            <input type="text" name="nama" placeholder="Nama kategori baru, contoh: Pembangunan" class="flex-1 border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                            <button type="submit" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-1.5 rounded-lg text-sm">Tambah</button>
                        </form>
                        @error('nama')
                            <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                        @enderror
                        <div class="flex flex-wrap gap-2">
                            @forelse ($kategoriBerita as $kat)
                                <div class="border border-gray-300 rounded-full pl-3 pr-1 py-1 flex items-center gap-2 text-sm">
                                    {{ $kat->nama }}
                                    <form action="{{ route('admin.kategori-berita.destroy', $kat->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini? Artikel dengan kategori ini akan jadi tanpa kategori.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 rounded-full w-5 h-5 flex items-center justify-center">
                                            <i data-lucide="x" class="w-3 h-3"></i>
                                        </button>
                                    </form>
                                </div>
                            @empty
                                <p class="text-sm text-gray-400">Belum ada kategori.</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- TABEL 5: BERITA -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full table-fixed divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-2/5 whitespace-nowrap">Judul Artikel</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/5 whitespace-nowrap">Kategori</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-28 whitespace-nowrap">Tanggal</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-32 whitespace-nowrap">Tipe</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider w-28 whitespace-nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($artikel as $item)
                                        @php
                                            $artikelJs = [
                                                'id' => $item->id,
                                                'judul' => $item->judul,
                                                'kategori_berita_id' => $item->kategori_berita_id,
                                                'tanggal' => $item->tanggal ? $item->tanggal->format('Y-m-d') : '',
                                                'penulis' => $item->penulis,
                                                'sinopsis' => $item->sinopsis,
                                                'isi' => $item->isi,
                                                'link_eksternal' => $item->link_eksternal,
                                                'gambar' => $item->gambar ? asset($item->gambar) : null,
                                            ];
                                        @endphp
                                        <tr>
                                            <td class="px-6 py-4 truncate">
                                                <div class="text-sm font-medium text-gray-900 truncate" title="{{ $item->judul }}">{{ $item->judul }}</div>
                                                <div class="text-xs text-gray-500 truncate" title="Oleh: {{ $item->penulis }}">Oleh: {{ $item->penulis }}</div>
                                            </td>
                                            <td class="px-6 py-4 truncate">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 truncate max-w-full">
                                                    {{ $item->kategori->nama ?? 'Tanpa Kategori' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $item->tanggal ? $item->tanggal->format('d-m-Y') : '-' }}
                                            </td>
                                            <td class="px-6 py-4 truncate">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-[#166534] truncate max-w-full">
                                                    {{ $item->link_eksternal ? 'Link Eksternal' : 'Tulisan Sendiri' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button type="button" class="text-indigo-600 hover:text-indigo-900 mr-2" data-artikel='@json($artikelJs)' onclick="openEditBerita(this)">Edit</button>
                                                <form action="{{ route('admin.artikel.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin mau hapus berita ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-400 italic">Belum ada berita.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Halaman 8: FAQ / Layanan Desa -->
                <div id="faq" class="page-content hidden">
                    @if (session('success'))
                        <div class="mb-4 bg-green-100 text-[#166534] px-4 py-2 rounded-lg text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">Kelola Layanan Desa</h1>
                            <p class="text-sm text-gray-500 mt-1">Atur daftar layanan, kategori, kontak, dan jam operasional.</p>
                        </div>
                        <button type="button" onclick="openModal('modalCreateLayanan')"
                            class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg flex items-center text-sm shadow-sm transition">
                            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Layanan
                        </button>
                    </div>

                    <!-- Kategori Layanan -->
                    <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
                        <h3 class="text-sm font-semibold text-gray-700 mb-3">Kategori Layanan</h3>
                        <form action="{{ route('admin.layanan.kategori.store') }}" method="POST" class="flex gap-2 mb-3">
                            @csrf
                            <input type="text" name="nama" placeholder="Nama kategori baru, contoh: Administrasi" class="flex-1 border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                            <button type="submit" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-1.5 rounded-lg text-sm">Tambah</button>
                        </form>
                        @error('nama')
                            <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                        @enderror

                        <div class="flex flex-wrap gap-2">
                            @forelse ($kategori as $kat)
                                <div class="border border-gray-300 rounded-full pl-3 pr-1 py-1 flex items-center gap-2 text-sm">
                                    {{ $kat->nama }}
                                    <form action="{{ route('admin.layanan.kategori.destroy', $kat->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini? Layanan dengan kategori ini akan jadi tanpa kategori.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 rounded-full w-5 h-5 flex items-center justify-center">
                                            <i data-lucide="x" class="w-3 h-3"></i>
                                        </button>
                                    </form>
                                </div>
                            @empty
                                <p class="text-sm text-gray-400">Belum ada kategori.</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- TABEL 6: LAYANAN -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
                        <div class="overflow-x-auto">
                            <table class="w-full table-fixed divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-2/5 whitespace-nowrap">Nama Layanan</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/4 whitespace-nowrap">Kategori</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-32 whitespace-nowrap">PDF Formulir</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider w-28 whitespace-nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($layanan as $item)
                                        @php
                                            $layananJs = [
                                                'id' => $item->id,
                                                'nama' => $item->nama,
                                                'kategori_layanan_id' => $item->kategori_layanan_id,
                                                'langkah' => $item->langkah,
                                                'file_pdf' => $item->file_pdf ? asset($item->file_pdf) : null,
                                            ];
                                        @endphp
                                        <tr>
                                            <td class="px-6 py-4 truncate">
                                                <div class="text-sm font-medium text-gray-900 truncate" title="{{ $item->nama }}">{{ $item->nama }}</div>
                                            </td>
                                            <td class="px-6 py-4 truncate">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 truncate max-w-full">
                                                    {{ $item->kategori->nama ?? 'Tanpa Kategori' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                @if ($item->file_pdf)
                                                    <a href="{{ asset($item->file_pdf) }}" target="_blank" class="text-[#166534] hover:underline">Lihat PDF</a>
                                                @else
                                                    <span class="text-gray-400">-</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button type="button" class="text-indigo-600 hover:text-indigo-900 mr-2" data-layanan='@json($layananJs)' onclick="openEditLayanan(this)">Edit</button>
                                                <form action="{{ route('admin.layanan.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin mau hapus layanan ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-400 italic">Belum ada layanan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h3 class="font-semibold text-lg mb-4 border-b pb-2 flex items-center">
                                <i data-lucide="phone" class="w-5 h-5 mr-2 text-gray-600"></i> Kontak Layanan
                            </h3>
                            <form action="{{ route('admin.layanan.kontak.update') }}" method="POST" class="space-y-4">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp</label>
                                    <input type="text" name="no_wa" value="{{ old('no_wa', $kontak->no_wa ?? '') }}" placeholder="Contoh: 6281234567890" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="email" name="email" value="{{ old('email', $kontak->email ?? '') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                                </div>
                                @if ($errors->any())
                                    <ul class="text-red-600 text-xs list-disc pl-4">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <button type="submit" class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg text-sm shadow-sm transition">Simpan Kontak</button>
                            </form>
                        </div>

                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h3 class="font-semibold text-lg mb-4 border-b pb-2 flex items-center">
                                <i data-lucide="clock" class="w-5 h-5 mr-2 text-gray-600"></i> Jam Operasional
                            </h3>

                            <form action="{{ route('admin.layanan.jam.store') }}" method="POST" class="flex gap-2 mb-4">
                                @csrf
                                <input type="text" name="hari" placeholder="Contoh: Senin - Kamis" class="flex-1 border border-gray-300 rounded-lg px-3 py-2 text-sm">
                                <input type="text" name="jam" placeholder="Contoh: 08:00 - 15:00" class="flex-1 border border-gray-300 rounded-lg px-3 py-2 text-sm">
                                <button type="submit" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg text-sm whitespace-nowrap">Tambah</button>
                            </form>

                            <div class="divide-y divide-gray-100">
                                @forelse ($jamOperasional as $item)
                                    <div class="flex items-center justify-between py-2 text-sm">
                                        <span class="text-gray-700 truncate mr-2">{{ $item->hari }}</span>
                                        <span class="text-gray-500 truncate mr-2">{{ $item->jam }}</span>
                                        <form action="{{ route('admin.layanan.jam.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus baris ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                @empty
                                    <p class="text-sm text-gray-400 py-2">Belum ada jam operasional.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- WADAH SELURUH MODAL OVERLAY (DILETAKKAN DI LUAR PAGE-CONTENT TERSEMBUNYI) -->
    <!-- ========================================================================= -->

    <!-- Modal 1: Tambah Potensi -->
    <div id="addModal" class="modal-backdrop fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300">
        <div class="modal-box bg-white rounded-xl shadow-xl w-full max-w-lg mx-4 overflow-hidden transform scale-95 transition-transform duration-300">
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Tambah Potensi Desa</h2>
                <button type="button" onclick="closeModal('addModal')" class="text-gray-400 hover:text-gray-600 transition">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            <form action="{{ route('admin.potensi.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Potensi</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-green-500 outline-none" placeholder="Cth: Pertanian Organik" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                        <select name="kategori" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-green-500 outline-none" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Pertanian" {{ old('kategori') == 'Pertanian' ? 'selected' : '' }}>Pertanian</option>
                            <option value="Perkebunan" {{ old('kategori') == 'Perkebunan' ? 'selected' : '' }}>Perkebunan</option>
                            <option value="Peternakan" {{ old('kategori') == 'Peternakan' ? 'selected' : '' }}>Peternakan</option>
                            <option value="Pariwisata" {{ old('kategori') == 'Pariwisata' ? 'selected' : '' }}>Pariwisata</option>
                            <option value="UMKM" {{ old('kategori') == 'UMKM' ? 'selected' : '' }}>UMKM</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="deskripsi" rows="3" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-green-500 outline-none" placeholder="Jelaskan potensi desa ini...">{{ old('deskripsi') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Upload Gambar</label>
                        <input type="file" name="gambar" accept="image/*" class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-green-50 file:text-green-700 hover:file:bg-green-100 border border-gray-300 rounded-md p-1 cursor-pointer">
                    </div>
                </div>
                <div class="mt-8 flex justify-end space-x-3">
                    <button type="button" onclick="closeModal('addModal')" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg text-sm hover:bg-gray-50 transition">Batal</button>
                    <button type="submit" class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg text-sm shadow-sm transition">Simpan Potensi</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modals Edit Potensi Loop -->
    @foreach ($potensi as $item)
        <div id="editModal{{ $item->id }}" class="modal-backdrop fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300">
            <div class="modal-box bg-white rounded-xl shadow-xl w-full max-w-lg mx-4 overflow-hidden transform scale-95 transition-transform duration-300 max-h-[90vh] overflow-y-auto">
                <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100">
                    <h2 class="text-lg font-semibold text-gray-900">Edit Potensi Desa</h2>
                    <button type="button" onclick="closeModal('editModal{{ $item->id }}')" class="text-gray-400 hover:text-gray-600 transition">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>
                <form action="{{ route('admin.potensi.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Potensi</label>
                            <input type="text" name="nama" value="{{ old('nama', $item->nama) }}" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                            <select name="kategori" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach (['Pertanian', 'Perkebunan', 'Peternakan', 'Pariwisata', 'UMKM'] as $kat)
                                    <option value="{{ $kat }}" {{ old('kategori', $item->kategori) == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                            <textarea name="deskripsi" rows="3" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none">{{ old('deskripsi', $item->deskripsi) }}</textarea>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
                            @if ($item->gambar)
                                <img src="{{ asset($item->gambar) }}" class="w-24 h-24 object-cover rounded-md border mb-3">
                            @else
                                <p class="text-xs text-gray-500 italic mb-3">Belum ada gambar.</p>
                            @endif
                            <label class="block text-xs font-medium text-gray-700 mb-1">Ganti Gambar (Opsional)</label>
                            <input type="file" name="gambar" accept="image/*" class="w-full text-xs text-gray-600 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded bg-white cursor-pointer">
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" onclick="closeModal('editModal{{ $item->id }}')" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg text-sm hover:bg-gray-50 transition">Batal</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm shadow-sm transition">Update Potensi</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <!-- Modal Tambah Perangkat -->
    <div id="addPerangkatModal" class="modal-backdrop fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300">
        <div class="modal-box bg-white rounded-xl shadow-xl w-full max-w-lg mx-4 overflow-hidden transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col">
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100 shrink-0">
                <h2 class="text-lg font-semibold text-gray-900">Tambah Perangkat Desa</h2>
                <button type="button" onclick="closeModal('addPerangkatModal')" class="text-gray-400 hover:text-gray-600 transition">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            <div class="overflow-y-auto flex-1 p-6">
                @if ($jabatan->isEmpty())
                    <div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg text-sm mb-4">
                        <i data-lucide="alert-triangle" class="w-4 h-4 inline mr-1"></i> Tambahkan <b>Jabatan</b> terlebih dahulu sebelum menambah Perangkat.
                    </div>
                @else
                    <form action="{{ route('admin.perangkat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-[#166534] outline-none" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                                <select name="jabatan_id" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-[#166534] outline-none" required>
                                    <option value="">-- Pilih Jabatan --</option>
                                    @foreach ($jabatan as $jab)
                                        <option value="{{ $jab->id }}" {{ old('jabatan_id') == $jab->id ? 'selected' : '' }}>{{ $jab->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">No. WhatsApp</label>
                                <input type="text" name="no_wa" value="{{ old('no_wa') }}" placeholder="Cth: 6281234567890" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-[#166534] outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">
                                    1. Untuk kepala desa bisa diisikan dengan kata sambutan<br />
                                    2. Untuk perangkat desa lainnya bisa diisikan dengan detail jabatan contoh: kaur administrasi
                                </label>
                                <textarea name="kata_sambutan" rows="3" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-[#166534] outline-none" placeholder="Opsional...">{{ old('kata_sambutan') }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Upload Foto</label>
                                <input type="file" name="foto" accept="image/*" class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-green-50 file:text-[#166534] hover:file:bg-green-100 border border-gray-300 rounded-md p-1 cursor-pointer">
                            </div>
                        </div>
                        <div class="mt-8 flex justify-end space-x-3">
                            <button type="button" onclick="closeModal('addPerangkatModal')" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg text-sm hover:bg-gray-50 transition">Batal</button>
                            <button type="submit" class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg text-sm shadow-sm transition">Simpan Perangkat</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <!-- Modals Edit Perangkat Loop -->
    @foreach ($perangkat as $item)
        <div id="editPerangkatModal{{ $item->id }}" class="modal-backdrop fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300">
            <div class="modal-box bg-white rounded-xl shadow-xl w-full max-w-lg mx-4 overflow-hidden transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col">
                <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100 shrink-0">
                    <h2 class="text-lg font-semibold text-gray-900">Edit Perangkat Desa</h2>
                    <button type="button" onclick="closeModal('editPerangkatModal{{ $item->id }}')" class="text-gray-400 hover:text-gray-600 transition">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>
                <div class="overflow-y-auto flex-1 p-6">
                    <form action="{{ route('admin.perangkat.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" name="nama" value="{{ old('nama', $item->nama) }}" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                                <select name="jabatan_id" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none" required>
                                    @foreach ($jabatan as $jab)
                                        <option value="{{ $jab->id }}" {{ old('jabatan_id', $item->jabatan_id) == $jab->id ? 'selected' : '' }}>
                                            {{ $jab->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">No. WhatsApp</label>
                                <input type="text" name="no_wa" value="{{ old('no_wa', $item->no_wa) }}" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sambutan / Detail</label>
                                <textarea name="kata_sambutan" rows="3" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none">{{ old('kata_sambutan', $item->kata_sambutan) }}</textarea>
                            </div>
                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Foto Saat Ini</label>
                                @if ($item->foto)
                                    <img src="{{ asset($item->foto) }}" class="w-20 h-20 object-cover rounded-md border mb-3">
                                @else
                                    <p class="text-xs text-gray-500 italic mb-3">Belum ada foto.</p>
                                @endif
                                <label class="block text-xs font-medium text-gray-700 mb-1">Ganti Foto (Opsional)</label>
                                <input type="file" name="foto" accept="image/*" class="w-full text-xs text-gray-600 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded bg-white cursor-pointer">
                            </div>
                        </div>
                        <div class="mt-6 flex justify-end space-x-3">
                            <button type="button" onclick="closeModal('editPerangkatModal{{ $item->id }}')" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg text-sm hover:bg-gray-50 transition">Batal</button>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm shadow-sm transition">Update Perangkat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Tambah BUMDes -->
    <div id="tambahUnitUsahaModal" class="modal-backdrop fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300">
        <div class="modal-box bg-white rounded-xl shadow-xl w-full max-w-lg mx-4 overflow-hidden transform scale-95 transition-transform duration-300 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100 sticky top-0 bg-white z-10">
                <h2 class="text-lg font-semibold text-gray-900">Tambah BUMDes</h2>
                <button type="button" onclick="closeModal('tambahUnitUsahaModal')" class="text-gray-400 hover:text-gray-600 transition">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            <form action="{{ route('admin.bumdes.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-green-500 outline-none" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                        <select name="kategori" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-green-500 outline-none" required>
                            <option value="Unit Usaha" {{ old('kategori') == 'Unit Usaha' ? 'selected' : '' }}>Unit Usaha</option>
                            <option value="Mitra Lokal" {{ old('kategori') == 'Mitra Lokal' ? 'selected' : '' }}>Mitra Lokal</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="deskripsi" rows="4" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-green-500 outline-none">{{ old('deskripsi') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                        <input type="file" name="gambar" class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-green-50 file:text-green-700 hover:file:bg-green-100 border border-gray-300 rounded-md p-1 cursor-pointer">
                    </div>
                </div>
                <div class="mt-8 flex justify-end space-x-3">
                    <button type="button" onclick="closeModal('tambahUnitUsahaModal')" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg text-sm hover:bg-gray-50 transition">Batal</button>
                    <button type="submit" class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg text-sm shadow-sm transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modals Edit BUMDes Loop -->
    @foreach ($bumdes as $item)
        <div id="editBumdesModal{{ $item->id }}" class="modal-backdrop fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm flex items-center justify-center opacity-0 transition-opacity duration-300">
            <div class="modal-box bg-white rounded-xl shadow-xl w-full max-w-lg mx-4 overflow-hidden transform scale-95 transition-transform duration-300 max-h-[90vh] overflow-y-auto">
                <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100 sticky top-0 bg-white z-10">
                    <h2 class="text-lg font-semibold text-gray-900">Edit BUMDes</h2>
                    <button type="button" onclick="closeModal('editBumdesModal{{ $item->id }}')" class="text-gray-400 hover:text-gray-600 transition">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>
                <form action="{{ route('admin.bumdes.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                            <input type="text" name="nama" value="{{ old('nama', $item->nama) }}" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                            <select name="kategori" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                                <option value="Unit Usaha" {{ old('kategori', $item->kategori) == 'Unit Usaha' ? 'selected' : '' }}>Unit Usaha</option>
                                <option value="Mitra Lokal" {{ old('kategori', $item->kategori) == 'Mitra Lokal' ? 'selected' : '' }}>Mitra Lokal</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                            <textarea name="deskripsi" rows="4" class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none">{{ old('deskripsi', $item->deskripsi) }}</textarea>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
                            @if ($item->gambar)
                                <img src="{{ asset($item->gambar) }}" class="w-24 h-24 object-cover rounded-md border mb-3 shadow-sm">
                            @else
                                <p class="text-xs text-gray-500 italic mb-3">Belum ada gambar</p>
                            @endif
                            <label class="block text-xs font-medium text-gray-700 mb-1">Ganti Gambar (Opsional)</label>
                            <input type="file" name="gambar" class="w-full text-xs text-gray-600 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded bg-white cursor-pointer">
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" onclick="closeModal('editBumdesModal{{ $item->id }}')" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg text-sm hover:bg-gray-50 transition">Batal</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm shadow-sm transition">Update</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <!-- Modal Tambah Berita -->
    <div id="modalCreateBerita" class="modal-backdrop fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4 opacity-0 transition-opacity duration-300">
        <div class="modal-box bg-white rounded-lg shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto transform scale-95 transition-transform duration-300">
            <div class="flex justify-between items-center px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-900">Tambah Berita</h2>
                <button type="button" onclick="closeModal('modalCreateBerita')" class="text-gray-400 hover:text-gray-600">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-4 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul Berita</label>
                    <input type="text" name="judul" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                        <select name="kategori_berita_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                            <option value="">-- Tanpa Kategori --</option>
                            @foreach ($kategoriBerita as $kat)
                                <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Penulis</label>
                    <input type="text" name="penulis" value="Tim Redaksi Desa" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Sinopsis</label>
                    <textarea name="sinopsis" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                    <input type="file" name="gambar" class="w-full text-sm">
                </div>
                <hr>
                <p class="text-xs text-gray-500">Pilih salah satu: tulis isi berita sendiri, ATAU isi link berita dari sumber lain.</p>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Isi Berita</label>
                    <textarea name="isi" rows="5" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Link Berita Eksternal</label>
                    <input type="url" name="link_eksternal" placeholder="https://..." class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                </div>
                @if ($errors->any())
                    <ul class="text-red-600 text-xs list-disc pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="flex justify-end gap-2 pt-2 border-t">
                    <button type="button" onclick="closeModal('modalCreateBerita')" class="px-4 py-2 rounded-lg text-sm text-gray-600 hover:bg-gray-100">Batal</button>
                    <button type="submit" class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg text-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Berita -->
    <div id="modalEditBerita" class="modal-backdrop fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4 opacity-0 transition-opacity duration-300">
        <div class="modal-box bg-white rounded-lg shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto transform scale-95 transition-transform duration-300">
            <div class="flex justify-between items-center px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-900">Edit Berita</h2>
                <button type="button" onclick="closeModal('modalEditBerita')" class="text-gray-400 hover:text-gray-600">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            <form id="formEditBerita" action="" method="POST" enctype="multipart/form-data" class="px-6 py-4 space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul Berita</label>
                    <input type="text" name="judul" id="edit_judul" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                        <select name="kategori_berita_id" id="edit_kategori" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                            <option value="">-- Tanpa Kategori --</option>
                            @foreach ($kategoriBerita as $kat)
                                <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                        <input type="date" name="tanggal" id="edit_tanggal" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Penulis</label>
                    <input type="text" name="penulis" id="edit_penulis" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Sinopsis</label>
                    <textarea name="sinopsis" id="edit_sinopsis" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Saat Ini</label>
                    <img id="edit_gambar_preview" src="" class="w-24 rounded-lg mb-2 hidden">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ganti Gambar (opsional)</label>
                    <input type="file" name="gambar" class="w-full text-sm">
                </div>
                <hr>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Isi Berita</label>
                    <textarea name="isi" id="edit_isi" rows="5" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Link Berita Eksternal</label>
                    <input type="url" name="link_eksternal" id="edit_link" placeholder="https://..." class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                </div>
                @if ($errors->any())
                    <ul class="text-red-600 text-xs list-disc pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="flex justify-end gap-2 pt-2 border-t">
                    <button type="button" onclick="closeModal('modalEditBerita')" class="px-4 py-2 rounded-lg text-sm text-gray-600 hover:bg-gray-100">Batal</button>
                    <button type="submit" class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg text-sm">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Tambah Layanan -->
    <div id="modalCreateLayanan" class="modal-backdrop fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4 opacity-0 transition-opacity duration-300">
        <div class="modal-box bg-white rounded-lg shadow-lg w-full max-w-xl max-h-[90vh] overflow-y-auto transform scale-95 transition-transform duration-300">
            <div class="flex justify-between items-center px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-900">Tambah Layanan</h2>
                <button type="button" onclick="closeModal('modalCreateLayanan')" class="text-gray-400 hover:text-gray-600">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-4 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Layanan</label>
                    <input type="text" name="nama" placeholder="Contoh: Pembuatan Surat Keterangan Usaha" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="kategori_layanan_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                        <option value="">-- Tanpa Kategori --</option>
                        @foreach ($kategori as $kat)
                            <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Langkah-langkah (1 langkah per baris)</label>
                    <textarea name="langkah" rows="6" placeholder="Datang ke kantor desa&#10;Isi formulir permohonan&#10;Tunggu proses verifikasi" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">File PDF Formulir (opsional)</label>
                    <input type="file" name="file_pdf" accept="application/pdf" class="w-full text-sm">
                </div>
                @if ($errors->any())
                    <ul class="text-red-600 text-xs list-disc pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="flex justify-end gap-2 pt-2 border-t">
                    <button type="button" onclick="closeModal('modalCreateLayanan')" class="px-4 py-2 rounded-lg text-sm text-gray-600 hover:bg-gray-100">Batal</button>
                    <button type="submit" class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg text-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Layanan -->
    <div id="modalEditLayanan" class="modal-backdrop fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4 opacity-0 transition-opacity duration-300">
        <div class="modal-box bg-white rounded-lg shadow-lg w-full max-w-xl max-h-[90vh] overflow-y-auto transform scale-95 transition-transform duration-300">
            <div class="flex justify-between items-center px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-900">Edit Layanan</h2>
                <button type="button" onclick="closeModal('modalEditLayanan')" class="text-gray-400 hover:text-gray-600">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            <form id="formEditLayanan" action="" method="POST" enctype="multipart/form-data" class="px-6 py-4 space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Layanan</label>
                    <input type="text" name="nama" id="edit_layanan_nama" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="kategori_layanan_id" id="edit_layanan_kategori" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                        <option value="">-- Tanpa Kategori --</option>
                        @foreach ($kategori as $kat)
                            <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Langkah-langkah (1 langkah per baris)</label>
                    <textarea name="langkah" id="edit_layanan_langkah" rows="6" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">File PDF Formulir (opsional)</label>
                    <input type="file" name="file_pdf" accept="application/pdf" class="w-full text-sm">
                </div>
                @if ($errors->any())
                    <ul class="text-red-600 text-xs list-disc pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="flex justify-end gap-2 pt-2 border-t">
                    <button type="button" onclick="closeModal('modalEditLayanan')" class="px-4 py-2 rounded-lg text-sm text-gray-600 hover:bg-gray-100">Batal</button>
                    <button type="submit" class="bg-[#166534] hover:bg-[#14532d] text-white px-4 py-2 rounded-lg text-sm">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        // Inisialisasi Lucide Icons & Auto-load Halaman Terakhir
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();

            // AMBIL DATA HALAMAN TERAKHIR DARI LOCALSTORAGE
            const savedPage = localStorage.getItem('activePage') || 'dashboard';

            // Cari elemen menu (link <a>) yang memanggil fungsi switchPage
            const activeMenu = document.querySelector(`a[onclick*="switchPage('${savedPage}'"]`);

            // Panggil fungsi switchPage secara otomatis saat halaman dimuat
            switchPage(savedPage, activeMenu);
        });

        // 1. Fungsionalitas Navigasi Halaman
        function switchPage(pageId, element) {
            localStorage.setItem('activePage', pageId);

            // Sembunyikan semua halaman
            const pages = document.querySelectorAll('.page-content');
            pages.forEach(page => {
                page.classList.add('hidden');
                page.classList.remove('block');
            });

            // Tampilkan halaman aktif
            const activePage = document.getElementById(pageId);
            if (activePage) {
                activePage.classList.remove('hidden');
                activePage.classList.add('block');
            }

            // Reset style navigasi menu
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => {
                item.classList.remove('bg-[#14532d]', 'border-white');
                item.classList.add('border-transparent');
            });

            // Atur style menu yang aktif
            if (element) {
                element.classList.add('bg-[#14532d]', 'border-white');
                element.classList.remove('border-transparent');
            }
        }

        // 2. Fungsionalitas Buka-Tutup Modal
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (!modal) return;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                const box = modal.querySelector('.modal-box');
                if (box) {
                    box.classList.remove('scale-95');
                    box.classList.add('scale-100');
                }
            }, 10);
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (!modal) return;

            modal.classList.add('opacity-0');
            const box = modal.querySelector('.modal-box');
            if (box) {
                box.classList.remove('scale-100');
                box.classList.add('scale-95');
            }

            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        // Tutup modal saat area luar (backdrop) diklik
        document.querySelectorAll('.modal-backdrop').forEach(backdrop => {
            backdrop.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal(this.id);
                }
            });
        });

        // 3. Fungsionalitas Modal Edit Berita
        function openEditBerita(btn) {
            const data = JSON.parse(btn.getAttribute('data-artikel'));
            const form = document.getElementById('formEditBerita');
            
            form.action = `/admin/artikel/${data.id}`;
            document.getElementById('edit_judul').value = data.judul || '';
            document.getElementById('edit_kategori').value = data.kategori_berita_id || '';
            document.getElementById('edit_tanggal').value = data.tanggal || '';
            document.getElementById('edit_penulis').value = data.penulis || '';
            document.getElementById('edit_sinopsis').value = data.sinopsis || '';
            document.getElementById('edit_isi').value = data.isi || '';
            document.getElementById('edit_link').value = data.link_eksternal || '';

            const imgPreview = document.getElementById('edit_gambar_preview');
            if (data.gambar) {
                imgPreview.src = data.gambar;
                imgPreview.classList.remove('hidden');
            } else {
                imgPreview.classList.add('hidden');
            }

            openModal('modalEditBerita');
        }

        // 4. Fungsionalitas Modal Edit Layanan
        function openEditLayanan(btn) {
            const data = JSON.parse(btn.getAttribute('data-layanan'));
            const form = document.getElementById('formEditLayanan');
            
            form.action = `/admin/layanan/${data.id}`;
            document.getElementById('edit_layanan_nama').value = data.nama || '';
            document.getElementById('edit_layanan_kategori').value = data.kategori_layanan_id || '';
            document.getElementById('edit_layanan_langkah').value = data.langkah || '';

            openModal('modalEditLayanan');
        }

        // 5. Toggle Mobile Sidebar
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        }
    </script>
</body>

</html>