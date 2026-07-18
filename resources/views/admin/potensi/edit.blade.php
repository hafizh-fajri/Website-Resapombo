@extends('layouts.admin')

@section('title', 'Edit Potensi Desa')

@section('content')

<h1>Edit Potensi Desa</h1>

<form action="{{ route('admin.potensi.update', $potensi->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Nama</label><br>
        <input type="text" name="nama" value="{{ old('nama', $potensi->nama) }}">
    </div>

    <div>
        <label>Kategori</label><br>
        <input type="text" name="kategori" value="{{ old('kategori', $potensi->kategori) }}">
    </div>

    <div>
        <label>Deskripsi</label><br>
        <textarea name="deskripsi" rows="4">{{ old('deskripsi', $potensi->deskripsi) }}</textarea>
    </div>

    <div>
        <label>Gambar Saat Ini</label><br>
        @if ($potensi->gambar)
            <img src="{{ asset('storage/' . $potensi->gambar) }}" width="100"><br>
        @else
            <p>Belum ada gambar</p>
        @endif
    </div>

    <div>
        <label>Ganti Gambar (kosongkan jika tidak ingin ganti)</label><br>
        <input type="file" name="gambar">
    </div>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">Update</button>
    <a href="{{ route('admin.potensi.index') }}">Batal</a>
</form>

@endsection