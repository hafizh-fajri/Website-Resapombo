@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')

<h1>Edit Berita</h1>

<form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Judul Berita</label><br>
        <input type="text" name="judul" value="{{ old('judul', $artikel->judul) }}">
    </div>

    <div>
        <label>Kategori</label><br>
        <select name="kategori_berita_id">
            <option value="">-- Tanpa Kategori --</option>
            @foreach ($kategori as $kat)
                <option value="{{ $kat->id }}" {{ old('kategori_berita_id', $artikel->kategori_berita_id) == $kat->id ? 'selected' : '' }}>{{ $kat->nama }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Tanggal</label><br>
        <input type="date" name="tanggal" value="{{ old('tanggal', $artikel->tanggal ? $artikel->tanggal->format('Y-m-d') : '') }}">
    </div>

    <div>
        <label>Penulis</label><br>
        <input type="text" name="penulis" value="{{ old('penulis', $artikel->penulis) }}">
    </div>

    <div>
        <label>Sinopsis (ringkasan singkat)</label><br>
        <textarea name="sinopsis" rows="3">{{ old('sinopsis', $artikel->sinopsis) }}</textarea>
    </div>

    <div>
        <label>Gambar Saat Ini</label><br>
        @if ($artikel->gambar)
            <img src="{{ asset('storage/' . $artikel->gambar) }}" width="100"><br>
        @else
            <p>Belum ada gambar</p>
        @endif
    </div>

    <div>
        <label>Ganti Gambar (kosongkan jika tidak ingin ganti)</label><br>
        <input type="file" name="gambar">
    </div>

    <hr>

    <div>
        <label>Isi Berita (kosongkan jika menggunakan Link Eksternal)</label><br>
        <textarea name="isi" rows="8">{{ old('isi', $artikel->isi) }}</textarea>
    </div>

    <div>
        <label>Link Berita Eksternal</label><br>
        <input type="url" name="link_eksternal" value="{{ old('link_eksternal', $artikel->link_eksternal) }}" placeholder="https://...">
    </div>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">Update</button>
    <a href="{{ route('admin.artikel.index') }}">Batal</a>
</form>

@endsection