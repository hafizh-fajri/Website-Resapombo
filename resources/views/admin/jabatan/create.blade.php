@extends('layouts.admin')

@section('title', 'Tambah Jabatan')

@section('content')

<h1>Tambah Jabatan</h1>

<form action="{{ route('admin.jabatan.store') }}" method="POST">
    @csrf

    <div>
        <label>Nama Jabatan</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Contoh: Kepala Dusun">
    </div>

    <div>
        <label>Tingkat (angka kecil = lebih tinggi)</label><br>
        <input type="number" name="tingkat" value="{{ old('tingkat') }}" min="1">
    </div>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">Simpan</button>
    <a href="{{ route('admin.jabatan.index') }}">Batal</a>
</form>

@endsection