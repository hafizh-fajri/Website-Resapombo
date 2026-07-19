@extends('layouts.app')

@section('title', 'Home - Website Desa')

@section('content')

    {{-- HERO (statis) --}}
    <section class="hero">
        <h1>Selamat Datang di Desa Resapombo</h1>
        <p>Mewujudkan desa yang mandiri, sejahtera, dan berbudaya melalui tata kelola pemerintahan yang transparan dan pengembangan potensi lokal yang berkelanjutan.</p>
    </section>

    {{-- INFORMASI UMUM (dinamis, horizontal) --}}
    <section class="stats-row">
        <div class="card">
            <p>{{ number_format($informasi->jumlah_penduduk) }}</p>
            <p>PENDUDUK</p>
        </div>
        <div class="card">
            <p>{{ $informasi->luas_wilayah }} Ha</p>
            <p>LUAS WILAYAH</p>
        </div>
        <div class="card">
            <p>{{ $informasi->jumlah_dusun }}</p>
            <p>DUSUN</p>
        </div>
        <div class="card">
            <p>{{ $informasi->jumlah_rt }} / {{ $informasi->jumlah_rw }}</p>
            <p>RT/RW</p>
        </div>
    </section>

    {{-- SEJARAH & PROFIL SINGKAT (statis) --}}
    <section>
        <h2>Sejarah & Profil Singkat Desa Resapombo</h2>
        <p>Desa Resapombo adalah sebuah desa agraris yang terletak di dataran tinggi yang subur. Dikenal dengan keramahan warganya dan kekayaan alam yang melimpah, desa ini terus berkembang menjadi desa mandiri yang mempertahankan nilai-nilai gotong royong.</p>
        <p>Pemerintah Desa berkomitmen untuk terus meningkatkan pelayanan publik, transparansi informasi, serta mendorong pemberdayaan ekonomi lokal melalui BUMDes dan pengembangan UMKM.</p>

        <ul>
            <li>✔ Pelayanan Prima Terpadu</li>
            <li>✔ Transparansi Anggaran Desa</li>
            <li>✔ Pemberdayaan Masyarakat Lokal</li>
        </ul>

        <a href="{{ route('profil') }}">Baca Profil Lengkap →</a>
    </section>

    {{-- KEKAYAAN DESA (statis, foto hardcode, klik ke halaman Potensi) --}}
    <section>
        <h2>Kekayaan Desa Resapombo</h2>
        <p>Menjelajahi beragam sektor yang menjadi pilar ekonomi dan kesejahteraan masyarakat desa kami.</p>

        <div class="kekayaan-grid">
            <a href="{{ route('kekayaan') }}" class="item-besar">
                <img src="{{ asset('images/kekayaan/pertanian.jpg') }}" alt="Pertanian">
                <span class="label">Pertanian</span>
            </a>
            <a href="{{ route('kekayaan') }}" class="item-lebar">
                <img src="{{ asset('images/kekayaan/perkebunan.jpg') }}" alt="Perkebunan">
                <span class="label">Perkebunan</span>
            </a>
            <a href="{{ route('kekayaan') }}" class="item-kecil">
                <img src="{{ asset('images/kekayaan/pariwisata.jpg') }}" alt="Pariwisata">
                <span class="label">Pariwisata</span>
            </a>
            <a href="{{ route('kekayaan') }}" class="item-kecil">
                <img src="{{ asset('images/kekayaan/umkm.jpg') }}" alt="UMKM">
                <span class="label">UMKM</span>
            </a>
        </div>

        <p style="text-align: center; margin-top: 20px;">
            <a href="{{ route('potensi') }}">Lihat Seluruh Potensi Desa →</a>
        </p>
    </section>

    {{-- BERITA (dinamis, gambar + judul saja, horizontal) --}}
    <section>
        <h2>Berita Terbaru</h2>

        <div class="berita-row">
            @forelse ($artikel as $item)
                <div class="card">
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
                    @endif
                    <h4>{{ $item->judul }}</h4>
                </div>
            @empty
                <p>Belum ada berita.</p>
            @endforelse
        </div>

        <p style="text-align: center; margin-top: 20px;">
            <a href="{{ route('berita') }}">Lihat Semua Berita →</a>
        </p>
    </section>

@endsection