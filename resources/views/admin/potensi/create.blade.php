@extends('layouts.admin')

@section('title', 'Tambah Potensi Desa')

@section('content')

<h1>Tambah Potensi Desa</h1>

<form action="{{ route('admin.potensi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label>Nama</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}">
    </div>

    <div>
        <label>Kategori (contoh: Wisata Alam & Edukasi)</label><br>
        <input type="text" name="kategori" value="{{ old('kategori') }}">
    </div>

    <div>
        <label>Deskripsi</label><br>
        <textarea name="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
    </div>

    <div>
        <label>Gambar</label><br>
        <input type="file" name="gambar">
    </div>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">Simpan</button>
    <a href="{{ route('admin.potensi.index') }}">Batal</a>
</form>

@endsection