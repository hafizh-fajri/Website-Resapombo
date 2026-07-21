@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')

<h1>Tambah Berita</h1>

<form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label>Judul Berita</label><br>
        <input type="text" name="judul" value="{{ old('judul') }}">
    </div>

    <div>
        <label>Kategori</label><br>
        <select name="kategori_berita_id">
            <option value="">-- Tanpa Kategori --</option>
            @foreach ($kategori as $kat)
                <option value="{{ $kat->id }}" {{ old('kategori_berita_id') == $kat->id ? 'selected' : '' }}>{{ $kat->nama }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Tanggal</label><br>
        <input type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}">
    </div>

    <div>
        <label>Penulis</label><br>
        <input type="text" name="penulis" value="{{ old('penulis', 'Tim Redaksi Desa') }}">
    </div>

    <div>
        <label>Sinopsis (ringkasan singkat)</label><br>
        <textarea name="sinopsis" rows="3">{{ old('sinopsis') }}</textarea>
    </div>

    <div>
        <label>Gambar</label><br>
        <input type="file" name="gambar">
    </div>

    <hr>

    <p><strong>Pilih salah satu:</strong> tulis isi berita sendiri, ATAU isi link berita dari sumber lain.</p>

    <div>
        <label>Isi Berita (kosongkan jika menggunakan Link Eksternal di bawah)</label><br>
        <textarea name="isi" rows="8">{{ old('isi') }}</textarea>
    </div>

    <div>
        <label>Link Berita Eksternal (kosongkan jika menulis isi sendiri)</label><br>
        <input type="url" name="link_eksternal" value="{{ old('link_eksternal') }}" placeholder="https://...">
    </div>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">Simpan</button>
    <a href="{{ route('admin.artikel.index') }}">Batal</a>
</form>

@endsection