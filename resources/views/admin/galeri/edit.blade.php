@extends('layouts.admin')

@section('title', 'Edit Foto Galeri')

@section('content')

<h1>Edit Foto Galeri</h1>

<form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Judul / Keterangan Foto</label><br>
        <input type="text" name="judul" value="{{ old('judul', $galeri->judul) }}">
    </div>

    <div>
        <label>Foto Saat Ini</label><br>
        <img src="{{ asset('storage/' . $galeri->foto) }}" width="150"><br>
    </div>

    <div>
        <label>Ganti Foto (kosongkan jika tidak ingin ganti)</label><br>
        <input type="file" name="foto">
    </div>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">Update</button>
    <a href="{{ route('admin.galeri.index') }}">Batal</a>
</form>

@endsection