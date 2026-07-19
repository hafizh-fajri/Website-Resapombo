@extends('layouts.app')

@section('title', 'Kekayaan Desa')

@section('content')

    {{-- HERO (statis) --}}
    <section class="hero" style="background-image: url('{{ asset('images/potensi-page/hero.jpg') }}'); background-size: cover; background-position: center; padding: 80px 20px; color: white;">
        <span class="badge">WEBSITE DESA RESAPOMBO</span>
        <h1>Kekayaan Desa Resapombo</h1>
        <p>Menjelajahi keunggulan sumber daya alam, pertanian, dan kearifan lokal yang menjadi pilar pertumbuhan dan kesejahteraan masyarakat Desa Resapombo.</p>
    </section>

    {{-- FILTER TAG + SEARCH BAR --}}
    <section class="filter-bar" style="display: flex; justify-content: space-between; align-items: center; margin: 30px 0; flex-wrap: wrap; gap: 10px;">

        <div class="filter-tags" style="display: flex; gap: 10px; flex-wrap: wrap;">
            <a href="{{ route('kekayaan') }}" class="tag-filter {{ !$kategori ? 'active' : '' }}">Semua</a>
            <a href="{{ route('kekayaan', ['kategori' => 'Pertanian']) }}" class="tag-filter {{ $kategori == 'Pertanian' ? 'active' : '' }}">Pertanian</a>
            <a href="{{ route('kekayaan', ['kategori' => 'Perkebunan']) }}" class="tag-filter {{ $kategori == 'Perkebunan' ? 'active' : '' }}">Perkebunan</a>
            <a href="{{ route('kekayaan', ['kategori' => 'Peternakan']) }}" class="tag-filter {{ $kategori == 'Peternakan' ? 'active' : '' }}">Peternakan</a>
            <a href="{{ route('kekayaan', ['kategori' => 'Pariwisata']) }}" class="tag-filter {{ $kategori == 'Pariwisata' ? 'active' : '' }}">Pariwisata</a>
            <a href="{{ route('kekayaan', ['kategori' => 'UMKM']) }}" class="tag-filter {{ $kategori == 'UMKM' ? 'active' : '' }}">UMKM</a>
        </div>

        <div class="search-bar">
            {{-- placeholder search bar, akan diisi terpisah --}}
        </div>

    </section>

    {{-- LIST POTENSI (gambar kiri, judul, tag, deskripsi) --}}
    <section class="potensi-list">
        @forelse ($potensi as $item)
            <div class="potensi-card">
                <div class="potensi-image">
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}">
                    @endif
                </div>
                <div class="potensi-content">
                    @if ($item->kategori)
                        <span class="tag-badge">{{ $item->kategori }}</span>
                    @endif
                    <h3>{{ $item->nama }}</h3>
                    <p>{{ $item->deskripsi }}</p>
                </div>
            </div>
        @empty
            <p>Belum ada data untuk kategori ini.</p>
        @endforelse
    </section>

@endsection