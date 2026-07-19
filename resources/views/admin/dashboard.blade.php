@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard Admin</h1>

    <h2>Informasi Umum Desa</h2>
    <p>Data ini akan ditampilkan di halaman Beranda (Home) publik.</p>

    <form action="{{ route('admin.informasi.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Jumlah Penduduk</label><br>
            <input type="number" name="jumlah_penduduk" value="{{ old('jumlah_penduduk', $informasi->jumlah_penduduk) }}">
        </div>

        <div>
            <label>Luas Wilayah (Ha)</label><br>
            <input type="number" step="0.01" name="luas_wilayah" value="{{ old('luas_wilayah', $informasi->luas_wilayah) }}">
        </div>

        <div>
            <label>Jumlah Dusun</label><br>
            <input type="number" name="jumlah_dusun" value="{{ old('jumlah_dusun', $informasi->jumlah_dusun) }}">
        </div>

        <div>
            <label>Jumlah RT</label><br>
            <input type="number" name="jumlah_rt" value="{{ old('jumlah_rt', $informasi->jumlah_rt) }}">
        </div>

        <div>
            <label>Jumlah RW</label><br>
            <input type="number" name="jumlah_rw" value="{{ old('jumlah_rw', $informasi->jumlah_rw) }}">
        </div>

        @if ($errors->any())
            <ul style="color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <button type="submit">Simpan Perubahan</button>
    </form>

    <h2>Fakta Singkat (Halaman Potensi)</h2>

    <form action="{{ route('admin.fakta.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Luas Lahan Baku (Ha)</label><br>
            <input type="number" step="0.01" name="luas_lahan_baku" value="{{ old('luas_lahan_baku', $fakta->luas_lahan_baku) }}">
        </div>

        <div>
            <label>Jumlah Kelompok Tani</label><br>
            <input type="number" name="kelompok_tani" value="{{ old('kelompok_tani', $fakta->kelompok_tani) }}">
        </div>

        <div>
            <label>Produksi Padi/Tahun (Ton)</label><br>
            <input type="number" step="0.01" name="produksi_padi" value="{{ old('produksi_padi', $fakta->produksi_padi) }}">
        </div>

        @if ($errors->any())
            <ul style="color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <button type="submit">Simpan Perubahan</button>
    </form>

@endsection