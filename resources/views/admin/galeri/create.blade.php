@extends('layouts.admin')

@section('title', 'Tambah Foto Galeri')

@section('content')

<h1>Tambah Foto Galeri</h1>

<form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label>Judul / Keterangan Foto</label><br>
        <input type="text" name="judul" value="{{ old('judul') }}">
    </div>

    <div>
        <label>Foto</label><br>
        <input type="file" name="foto">
    </div>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">Simpan</button>
    <a href="{{ route('admin.galeri.index') }}">Batal</a>
</form>

@endsection