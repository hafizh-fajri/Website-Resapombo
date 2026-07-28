@extends('layouts.app')

@section('title', $artikel->judul)

@section('content')

    <a href="{{ route('berita') }}">← Kembali ke Berita</a>

    <article style="margin-top: 20px;">
        @if ($artikel->kategori)
            <span class="tag-badge">{{ $artikel->kategori->nama }}</span>
        @endif
        <h1>{{ $artikel->judul }}</h1>
        <p class="berita-meta">📅 {{ $artikel->tanggal->format('d F Y') }} • Oleh: {{ $artikel->penulis }}</p>

        @if ($artikel->gambar)
            <img src="{{ asset($artikel->gambar) }}" alt="{{ $artikel->judul }}" style="width: 100%; border-radius: 8px; margin: 20px 0;">
        @endif

        <div class="berita-isi">
            {!! nl2br(e($artikel->isi)) !!}
        </div>
    </article>

@endsection

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berita - Desa Resapombo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Menggunakan font Inter agar seragam dengan desain UI */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#fafafa] text-gray-800 antialiased">

    <!-- Komponen Navbar (Sesuaikan dengan project Anda) -->
    <x-navbar></x-navbar>

    <!-- Main Content Container: Lebar dibatasi agar nyaman dibaca -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20">
        
        <!-- Bagian 1 & 2: Header Artikel (Judul, Penulis, Tanggal) -->
        <header class="mb-10 text-center md:text-left">
            <!-- 1. Judul Berita -->
            <!-- Jika dinamis, ganti dengan { -->
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                {{ $artikel->judul }}
            </h1>
            
            <!-- Meta Data: Penulis & Tanggal -->
            <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 md:gap-6 text-sm text-gray-500">
                <!-- 2. Penulis -->
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="font-medium text-gray-700">{{ $artikel->penulis }}</span> 
                </div>

                <span class="hidden md:inline text-gray-300">•</span>

                <!-- 3. Tanggal -->
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>{{ $artikel->tanggal->format('d F Y') }}</span>
                </div>
            </div>
        </header>

        <!-- 4. Gambar Utama -->
        <div class="w-full h-[300px] md:h-[500px] mb-12 shadow-sm rounded-[24px] overflow-hidden">
            <!-- Jika dinamis, ganti src dengan { -->
            <img src="{{ asset($artikel->gambar) }}" 
                 alt="Gambar Utama Berita" 
                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-700">
        </div>

        <!-- 5. Isi Konten Berita -->
        <!-- Penggunaan spasi baris (leading) yang longgar dan warna abu-abu gelap agar nyaman dibaca -->
        <article class="prose prose-lg md:prose-xl max-w-none text-gray-700 leading-relaxed space-y-6">
            
            {!! nl2br(e($artikel->isi)) !!}
            
        </article>

        <!-- Tombol Kembali -->
        <div class="mt-16 pt-8 border-t border-gray-200">
            <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 text-[#1b5e20] hover:text-green-800 font-semibold transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Daftar Berita
            </a>
        </div>

    </main>

    <!-- Komponen Footer (Sesuaikan dengan project Anda) -->
    <x-footer></x-footer>

</body>
</html>