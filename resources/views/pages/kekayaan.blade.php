<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kekayaan Desa Resapombo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#fafafa] text-gray-800 antialiased">

    <!-- Komponen Navbar Laravel -->
    <x-navbar></x-navbar>

    <!-- Hero Section -->
    <header class="relative w-full h-[400px] md:h-[500px]">
        <div class="absolute inset-0 w-full h-full">
            <img src="https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                alt="Pemandangan Desa" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black/40"></div>
        </div>

        <div class="relative z-10 h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-center">
            <div class="max-w-2xl">
                <span
                    class="inline-block py-1.5 px-4 rounded-full border border-white/50 bg-white/10 backdrop-blur-sm text-xs font-semibold text-white tracking-wider mb-4">
                    WEBSITE DESA RESAPOMBO
                </span>
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 leading-tight">
                    Kekayaan Desa Resapombo
                </h1>
                <p class="text-sm md:text-base text-gray-200 line-clamp-3">
                    Dapatkan informasi terbaru seputar pembangunan, kegiatan warga, dan pengumuman resmi dari Pemerintah
                    Desa Resapombo.
                </p>
            </div>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-16">

        <!-- Filter dan Pencarian Berbasis Form -->
        <form id="filter-form" action="{{ url()->current() }}" method="GET"
            class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">

            <!-- Input tersembunyi untuk menyimpan kategori aktif -->
            <input type="hidden" name="kategori" id="kategori-input" value="{{ $kategori ?? 'Semua' }}">

            <!-- Tombol Filter -->
            <div class="flex flex-wrap gap-2" id="filter-container">
                @php
                    $categories = ['Semua', 'Pertanian', 'Peternakan', 'Perkebunan', 'Pariwisata','UMKM'];
                    $currentKategori = $kategori ?? 'Semua';
                @endphp

                @foreach($categories as $cat)
                    <button type="button" onclick="setKategori('{{ $cat }}')"
                        class="px-5 py-2 rounded-full text-sm font-medium transition-colors 
                            {{ $currentKategori == $cat ? 'bg-green-700 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        {{ $cat }}
                    </button>
                @endforeach
            </div>

            <!-- Input Pencarian -->
            <div class="relative w-full md:w-80">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}"
                    class="block w-full pl-10 pr-3 py-2.5 border-transparent bg-gray-100 rounded-full text-sm placeholder-gray-500 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 transition-all outline-none"
                    placeholder="Cari Berita dan Artikel...">
            </div>
            <!-- Tekan enter pada input search akan mensubmit form secara otomatis -->
        </form>

        <!-- Daftar Artikel/Berita -->
        <div class="space-y-6">
            @forelse($potensi as $item)
                <!-- Card Artikel -->
                <article
                    class="bg-white rounded-[24px] p-5 md:p-6 flex flex-col md:flex-row gap-6 md:gap-8 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300 items-center md:items-stretch">

                    <!-- Thumbnail Container: Fix lebar dan tinggi agar seragam -->
                    <div class="w-full md:w-[340px] h-[220px] shrink-0">
                        {{-- Ganti 'gambar' sesuai nama field foto di database Anda --}}
                        <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : 'https://images.unsplash.com/photo-1592982537447-7440770cbfc9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}"
                            alt="{{ $item->judul }}" class="w-full h-full object-cover rounded-2xl">
                    </div>

                    <!-- Konten Teks: Disejajarkan ke tengah secara vertikal -->
                    <div class="flex-1 py-2 flex flex-col justify-center min-w-0">

                        <!-- Badge Kategori: Dibuat lebih rounded memanjang (pill) sesuai UI -->
                        <div class="mb-4">
                            <span
                                class="inline-block bg-[#e8f5e9] text-[#1b5e20] text-xs font-bold px-4 py-1.5 rounded-full w-max">
                                {{ $item->kategori ?? 'Pertanian' }}
                            </span>
                        </div>

                        <!-- Judul: Dibatasi maksimal 2 baris -->
                        <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 hover:text-green-700 transition-colors cursor-pointer line-clamp-2"
                            title="{{ $item->judul }}">
                            {{ $item->judul }}
                        </h2>

                        <!-- Deskripsi: Dibatasi maksimal 2 atau 3 baris agar tinggi card terjaga -->
                        <p class="text-gray-600 text-sm md:text-base leading-relaxed line-clamp-2 md:line-clamp-3">
                            {{ Str::limit(strip_tags($item->deskripsi), 200) }}
                        </p>
                    </div>
                </article>
            @empty
                <!-- Tampilan Jika Data Kosong -->
                <div class="text-center py-16 bg-white rounded-[24px] border border-gray-100 shadow-sm">
                    <svg class="mx-auto h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="mt-4 text-base font-semibold text-gray-900">Tidak ada data ditemukan</h3>
                    <p class="mt-2 text-sm text-gray-500">Coba gunakan kata kunci pencarian atau kategori yang berbeda.</p>
                </div>
            @endforelse
        </div>
    </main>

    <!-- Komponen Footer Laravel -->
    <x-footer></x-footer>

    <!-- JavaScript untuk Menangani Filter -->
    <script>
        function setKategori(kategori) {
            // Ubah value pada input hidden
            document.getElementById('kategori-input').value = kategori;
            // Submit form
            document.getElementById('filter-form').submit();
        }
    </script>
</body>

</html>