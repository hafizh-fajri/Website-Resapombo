@extends('layouts.app')

@section('title', 'Berita & Artikel')

@section('content')

    {{-- HERO (statis) --}}
    <section class="hero">
        <span class="badge">WEBSITE DESA RESAPOMBO</span>
        <h1>Berita & Artikel</h1>
        <p>Dapatkan informasi terbaru seputar pembangunan, kegiatan warga, dan pengumuman resmi dari Pemerintah Desa Resapombo.</p>
    </section>

    {{-- FILTER TAG + SEARCH --}}
    <section class="filter-bar" style="display: flex; justify-content: space-between; align-items: center; margin: 30px 0; flex-wrap: wrap; gap: 10px;">
        <div class="filter-tags" style="display: flex; gap: 10px; flex-wrap: wrap;">
            <a href="{{ route('berita') }}" class="tag-filter {{ !$kategoriId ? 'active' : '' }}">Semua</a>
            @foreach ($kategori as $kat)
                <a href="{{ route('berita', ['kategori' => $kat->id]) }}" class="tag-filter {{ $kategoriId == $kat->id ? 'active' : '' }}">{{ $kat->nama }}</a>
            @endforeach
        </div>

        <div class="search-bar">
            {{-- placeholder search bar, akan diisi terpisah --}}
        </div>
    </section>

    {{-- LIST BERITA --}}
    @if (!$kategoriId)
        {{-- Tampilan "Semua": berita terbaru besar di atas, sisanya grid kecil --}}
        @php
            $utama = $artikel->first();
            $sisanya = $artikel->skip(1);
        @endphp

        @if ($utama)
            <div class="berita-utama card">
                <div class="berita-utama-gambar">
                    @if ($utama->gambar)
                        <img src="{{ asset('storage/' . $utama->gambar) }}" alt="{{ $utama->judul }}">
                    @endif
                    @if ($utama->kategori)
                        <span class="tag-badge-overlay">{{ $utama->kategori->nama }}</span>
                    @endif
                </div>
                <div class="berita-utama-konten">
                    <p class="berita-meta">📅 {{ $utama->tanggal->format('d F Y') }} • Oleh: {{ $utama->penulis }}</p>
                    <h2>{{ $utama->judul }}</h2>
                    <p>{{ $utama->sinopsis }}</p>
                    <a href="{{ $utama->link_eksternal ?: route('berita.show', $utama->id) }}" {{ $utama->link_eksternal ? 'target=_blank' : '' }} class="btn">Baca Selengkapnya →</a>
                </div>
            </div>
        @endif

        <div class="berita-grid-kecil">
            @foreach ($sisanya as $item)
                @include('partials.berita-card', ['item' => $item])
            @endforeach
        </div>
    @else
        {{-- Tampilan kategori terfilter: cuma grid kecil, tanpa berita utama besar --}}
        <div class="berita-grid-kecil">
            @forelse ($artikel as $item)
                @include('partials.berita-card', ['item' => $item])
            @empty
                <p>Belum ada berita untuk kategori ini.</p>
            @endforelse
        </div>
    @endif

@endsection