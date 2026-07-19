@extends('layouts.app')

@section('title', 'Profil Desa')

@section('content')

    {{-- HERO (statis) --}}
    <section class="hero" style="background-image: url('{{ asset('images/profil/hero.jpg') }}'); background-size: cover; background-position: center; padding: 80px 20px; color: white;">
        <span class="badge">WEBSITE DESA RESAPOMBO</span>
        <h1>Profil Desa</h1>
        <p>Mengenal lebih dekat sejarah, visi misi, dan letak geografis Desa Resapombo sebagai fondasi pembangunan yang berkelanjutan.</p>
    </section>

    {{-- SEJARAH + INFORMASI UMUM --}}
    <section class="profil-grid">
        <div class="profil-main">
            <h2>Sejarah Desa</h2>
            <img src="{{ asset('images/profil/sejarah.jpg') }}" alt="Sejarah Desa" style="width: 100%; border-radius: 8px; margin-bottom: 15px;">
            <p>Desa Resapombo adalah sebuah desa agraris yang terletak di dataran tinggi yang subur. Dikenal dengan keramahan warganya dan kekayaan alam yang melimpah, desa ini terus berkembang menjadi desa mandiri yang mempertahankan nilai-nilai gotong royong.</p>
            <p>Pemerintah Desa berkomitmen untuk terus meningkatkan pelayanan publik, transparansi informasi, serta mendorong pemberdayaan ekonomi lokal melalui BUMDes dan pengembangan UMKM.</p>
        </div>

        <div class="profil-side card">
            <h3>Informasi Umum</h3>
            <div class="info-grid">
                <div class="info-item">
                    <p class="info-number">{{ number_format($informasi->jumlah_penduduk) }}</p>
                    <p class="info-label">PENDUDUK</p>
                </div>
                <div class="info-item">
                    <p class="info-number">{{ $informasi->luas_wilayah }} Ha</p>
                    <p class="info-label">LUAS WILAYAH</p>
                </div>
                <div class="info-item">
                    <p class="info-number">{{ $informasi->jumlah_dusun }}</p>
                    <p class="info-label">DUSUN</p>
                </div>
                <div class="info-item">
                    <p class="info-number">{{ $informasi->jumlah_rt }} / {{ $informasi->jumlah_rw }}</p>
                    <p class="info-label">RT/RW</p>
                </div>
            </div>
        </div>
    </section>

    {{-- VISI & MISI (dinamis) --}}
    <section class="profil-grid">
        <div class="profil-main">
            <h2>Visi & Misi</h2>

            <div class="card" style="background-color: #1a6b2f; color: white; margin-bottom: 15px;">
                <h3>Visi</h3>
                <p>{{ $visi->isi ?? 'Visi belum diisi.' }}</p>
            </div>

            <div class="card">
                <h3>Misi</h3>
                <ul>
                    @forelse ($misi as $item)
                        <li>
                            <strong>{{ $item->judul }}</strong>
                            <p>{{ $item->deskripsi }}</p>
                        </li>
                    @empty
                        <li>Belum ada misi.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <div class="profil-side">
            <div class="card" style="margin-bottom: 15px;">
                <h3>Peta Wilayah</h3>
                <img src="{{ asset('images/profil/peta.jpg') }}" alt="Peta Wilayah Desa" style="width: 100%; border-radius: 8px;">
            </div>

            <div class="card">
                <h3>Dokumen Publik</h3>
                <p style="color: #999;">Belum ada dokumen (akan dibuat dinamis di tahap berikutnya)</p>
            </div>
        </div>
    </section>

    {{-- KEPALA DESA SEBELUMNYA (sementara statis, dinamis di Tahap 4) --}}
    <section>
        <h2>Kepala Desa Sebelumnya</h2>
        <p style="color: #999;">(Akan dibuat dinamis dengan scroll horizontal di tahap berikutnya)</p>
    </section>

@endsection