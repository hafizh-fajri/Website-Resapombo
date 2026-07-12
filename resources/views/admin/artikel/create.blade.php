@extends('layouts.admin')

@section('title', 'Tambah Artikel')

@section('content')

<h1>Tambah Artikel</h1>

<form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label>Judul Artikel</label><br>
        <input type="text" name="judul" value="{{ old('judul') }}">
    </div>

    <div>
        <label>Tanggal</label><br>
        <input type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}">
    </div>

    <div>
        <label>Isi Artikel</label><br>
        <textarea name="isi" rows="6">{{ old('isi') }}</textarea>
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
    <a href="{{ route('admin.artikel.index') }}">Batal</a>
</form>

@endsection