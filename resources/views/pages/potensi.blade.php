@extends('layouts.app')

@section('title', 'Potensi Desa')

@section('content')

    {{-- HERO (statis) --}}
    <section class="hero" style="background-image: url('{{ asset('images/potensi-page/hero.jpg') }}'); background-size: cover; background-position: center; padding: 80px 20px; color: white; text-align: center;">
        <span>KEKAYAAN ALAM & BUDAYA RESAPOMBO</span>
        <h1>Potensi Desa</h1>
        <p>Menjelajahi keunggulan sumber daya alam, pertanian, dan kearifan lokal yang menjadi pilar pertumbuhan dan kesejahteraan masyarakat Desa Resapombo.</p>
    </section>

    {{-- KEKAYAAN DESA (statis, foto sama seperti di Home, klik ke halaman Kekayaan) --}}
    <section>
        <h2>Kekayaan Desa Resapombo</h2>
        <p>Menjelajahi beragam sektor yang menjadi pilar ekonomi dan kesejahteraan masyarakat desa kami.</p>

        <div class="kekayaan-grid">
            <a href="{{ route('kekayaan') }}" class="item-besar">
                <img src="{{ asset('images/potensi-page/pertanian.jpg') }}" alt="Pertanian">
                <span class="label">Pertanian</span>
            </a>
            <a href="{{ route('kekayaan') }}" class="item-lebar">
                <img src="{{ asset('images/potensi-page/perkebunan.jpg') }}" alt="Perkebunan">
                <span class="label">Perkebunan</span>
            </a>
            <a href="{{ route('kekayaan') }}" class="item-kecil">
                <img src="{{ asset('images/potensi-page/pariwisata.jpg') }}" alt="Pariwisata">
                <span class="label">Pariwisata</span>
            </a>
            <a href="{{ route('kekayaan') }}" class="item-kecil">
                <img src="{{ asset('images/potensi-page/peternakan.jpg') }}" alt="Peternakan">
                <span class="label">Peternakan</span>
            </a>
        </div>

        {{-- Item UMKM Lokal (lebar penuh, mengikuti desain) --}}
        <a href="{{ route('kekayaan') }}" style="display: block; position: relative; margin-top: 10px; border-radius: 8px; overflow: hidden;">
            <img src="{{ asset('images/potensi-page/umkm.jpg') }}" alt="UMKM Lokal" style="width: 100%; height: 250px; object-fit: cover;">
            <span class="label" style="position: absolute; bottom: 10px; left: 10px; color: white; font-weight: bold;">UMKM Lokal</span>
        </a>

        <p style="text-align: center; margin-top: 20px;">
            <a href="{{ route('kekayaan') }}">Lihat Seluruh Potensi Desa →</a>
        </p>
    </section>

    {{-- TENTANG DESA - Pertanian Berkelanjutan (statis) --}}
    <section style="display: flex; gap: 30px; margin-top: 40px;">
        <div style="flex: 2;">
            <h2>Pertanian Berkelanjutan Resapombo</h2>
            <p>Sektor pertanian merupakan pilar utama perekonomian Desa Resapombo. Dengan luas lahan sawah produktif mencapai lebih dari 150 hektar, masyarakat desa kami berkomitmen untuk mengembangkan sistem pertanian organik yang ramah lingkungan dan berkelanjutan.</p>

            <div style="display: flex; gap: 10px; margin: 20px 0;">
                <img src="{{ asset('images/potensi-page/tentang-1.jpg') }}" alt="Pertanian" style="width: 50%; border-radius: 8px;">
                <img src="{{ asset('images/potensi-page/tentang-2.jpg') }}" alt="Petani" style="width: 50%; border-radius: 8px;">
            </div>

            <h3>Komoditas Unggulan</h3>
            <p>Kami fokus pada pengembangan komoditas bernilai ekonomi tinggi yang sesuai dengan kondisi agroklimat desa kami. Padi varietas unggul baru (VUB) dan sayuran organik menjadi primadona yang terus kami kembangkan melalui kelompok tani terpadu.</p>

            <ul>
                <li>✔ Padi Organik: Dipupuk menggunakan kompos lokal, bebas pestisida kimia, dan memiliki nilai jual yang kompetitif di pasar regional.</li>
                <li>✔ Sayuran Dataran Tinggi: Kubis, wortel, dan kentang yang ditanam dengan sistem rotasi tanam untuk menjaga kesuburan tanah.</li>
                <li>✔ Palawija: Jagung hibrida dan kedelai sebagai tanaman sela penyangga ketahanan pangan.</li>
            </ul>
        </div>

        {{-- FAKTA SINGKAT (dinamis) + KONTAK BUMDES --}}
        <div style="flex: 1;">
            <div class="card">
                <h3>Fakta Singkat</h3>
                <p>Luas Lahan Baku: <strong>{{ $fakta->luas_lahan_baku }} Ha</strong></p>
                <p>Kelompok Tani: <strong>{{ $fakta->kelompok_tani }} Kelompok</strong></p>
                <p>Produksi Padi/Thn: <strong>± {{ $fakta->produksi_padi }} Ton</strong></p>
            </div>

            <div class="card" style="margin-top: 15px;">
                <h4>Tertarik Kemitraan?</h4>
                <p>Pemerintah Desa terbuka untuk kerjasama investasi dan kemitraan pemasaran hasil bumi.</p>
                <a href="mailto:bumdes@resapombo.desa.id" class="btn">📧 Hubungi BUMDes</a>
            </div>
        </div>
    </section>

@endsection