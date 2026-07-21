@extends('layouts.app')

@section('title', 'BUMDes Maju Resapombo')

@section('content')

    {{-- HERO (statis) --}}
    <section class="hero" style="background-image: url('{{ asset('images/bumdes-page/hero.jpg') }}'); background-size: cover; background-position: center; padding: 80px 20px; color: white;">
        <span class="badge">BADAN USAHA MILIK DESA</span>
        <h1>BUMDes Maju Resapombo</h1>
        <p>Mendorong kemandirian ekonomi desa melalui pengelolaan potensi lokal yang berkelanjutan, profesional, dan transparan untuk kesejahteraan seluruh masyarakat.</p>
    </section>

    {{-- MOTOR PENGGERAK EKONOMI DESA (statis teks + dinamis angka) --}}
    <section class="profil-grid">
        <div class="profil-main">
            <h2>Motor Penggerak Ekonomi Desa</h2>
        </div>
        <div class="profil-main" style="flex: 3;">
            <p>Desa Resapombo adalah sebuah desa agraris yang terletak di dataran tinggi yang subur. Dikenal dengan keramahan warganya dan kekayaan alam yang melimpah, desa ini terus berkembang menjadi desa mandiri yang mempertahankan nilai-nilai gotong royong.</p>
            <p>Pemerintah Desa berkomitmen untuk terus meningkatkan pelayanan publik, transparansi informasi, serta mendorong pemberdayaan ekonomi lokal melalui BUMDes dan pengembangan UMKM.</p>

            <div style="display: flex; gap: 40px; margin-top: 20px;">
                <div>
                    <p style="font-size: 1.8em; font-weight: bold; color: #1a6b2f; margin: 0;">{{ $totalUnitUsaha }}</p>
                    <p style="margin: 0;">UNIT USAHA AKTIF</p>
                </div>
                <div>
                    <p style="font-size: 1.8em; font-weight: bold; color: #1a6b2f; margin: 0;">{{ $totalMitra }}+</p>
                    <p style="margin: 0;">MITRA LOKAL</p>
                </div>
            </div>
        </div>
    </section>

    {{-- SEARCH BAR (placeholder, akan diisi teman) --}}
    <section class="search-bar-placeholder">
        {{-- search bar akan ditempatkan di sini --}}
    </section>

    {{-- UNIT USAHA & MITRA --}}
    <section>
        <h2>Unit Usaha dan Mitra Kami</h2>
        <p>Pilar-pilar bisnis yang menopang pertumbuhan desa.</p>

        <div class="perangkat-grid" id="unit-usaha-visible">
            @foreach ($bumdes->take(9) as $item)
                <div class="perangkat-card" style="text-align: left;">
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}">
                    @endif
                    <span class="tag-badge">{{ $item->kategori }}</span>
                    <h4>{{ $item->nama }}</h4>
                    <ul style="list-style: none; padding: 0;">
                        @foreach (explode("\n", $item->deskripsi) as $poin)
                            @if (trim($poin) !== '')
                                <li>✔ {{ trim($poin) }}</li>
                            @endif
                        @endforeach
                    </ul>
                    @if ($kontak && $kontak->no_wa)
                        <a href="https://wa.me/{{ $kontak->no_wa }}" target="_blank" class="btn">📱 Hubungi Pengelola</a>
                    @endif
                </div>
            @endforeach
        </div>

        @if ($bumdes->count() > 9)
            <div class="perangkat-grid" id="unit-usaha-hidden" style="display: none;">
                @foreach ($bumdes->skip(9) as $item)
                    <div class="perangkat-card" style="text-align: left;">
                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}">
                        @endif
                        <span class="tag-badge">{{ $item->kategori }}</span>
                        <h4>{{ $item->nama }}</h4>
                        <ul style="list-style: none; padding: 0;">
                            @foreach (explode("\n", $item->deskripsi) as $poin)
                                @if (trim($poin) !== '')
                                    <li>✔ {{ trim($poin) }}</li>
                                @endif
                            @endforeach
                        </ul>
                        @if ($kontak && $kontak->no_wa)
                            <a href="https://wa.me/{{ $kontak->no_wa }}" target="_blank" class="btn">📱 Hubungi Pengelola</a>
                        @endif
                    </div>
                @endforeach
            </div>

            <p style="text-align: center; margin-top: 20px;">
                <button id="btn-show-all" onclick="document.getElementById('unit-usaha-hidden').style.display='grid'; this.style.display='none';">
                    Lihat Semua Unit Usaha dan Mitra
                </button>
            </p>
        @endif
    </section>

    {{-- KONTAK BUMDES (dinamis) --}}
    <section style="display: flex; gap: 20px; margin-top: 40px;">
        <div class="card" style="background-color: #1a6b2f; color: white; flex: 1;">
            <h3>Peluang Kerjasama</h3>
            <p>Kami terbuka untuk kemitraan strategis dalam pengembangan potensi desa. Diskusikan peluang bersama tim pengurus BUMDes.</p>
            @if ($kontak && $kontak->no_wa)
                <a href="https://wa.me/{{ $kontak->no_wa }}" target="_blank" class="btn">📱 Chat Via WhatsApp</a>
            @else
                <p style="color: #ddd;">Nomor WhatsApp belum tersedia.</p>
            @endif
        </div>

        <div class="card" style="flex: 1;">
            <h3>Profil Perusahaan</h3>
            <p>Unduh dokumen resmi Profil BUMDes Maju untuk informasi lengkap mengenai legalitas, struktur organisasi, dan laporan tahunan.</p>
            @if ($kontak && $kontak->file_profil)
                <a href="{{ asset('storage/' . $kontak->file_profil) }}" target="_blank" class="btn">📄 Lihat PDF</a>
            @else
                <p style="color: #999;">Dokumen belum tersedia.</p>
            @endif
        </div>
    </section>

@endsection