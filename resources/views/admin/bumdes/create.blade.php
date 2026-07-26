@extends('layouts.admin')

@section('title', 'Tambah BUMDes')

@section('content')

<h1>Tambah BUMDes</h1>

<form action="{{ route('admin.bumdes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label>Nama</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}">
    </div>

    <div>
        <label>Kategori</label><br>
        <select name="kategori">
            <option value="Unit Usaha" {{ old('kategori') == 'Unit Usaha' ? 'selected' : '' }}>Unit Usaha</option>
            <option value="Mitra Lokal" {{ old('kategori') == 'Mitra Lokal' ? 'selected' : '' }}>Mitra Lokal</option>
        </select>
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
    <a href="{{ route('admin.bumdes.index') }}">Batal</a>
</form>

@endsection