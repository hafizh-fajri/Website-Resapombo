@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')

<h1>Edit Artikel</h1>

<form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Judul Artikel</label><br>
        <input type="text" name="judul" value="{{ old('judul', $artikel->judul) }}">
    </div>

    <div>
        <label>Tanggal</label><br>
        <input type="date" name="tanggal" value="{{ old('tanggal', $artikel->tanggal ? $artikel->tanggal->format('Y-m-d') : '') }}">
    </div>

    <div>
        <label>Isi Artikel</label><br>
        <textarea name="isi" rows="6">{{ old('isi', $artikel->isi) }}</textarea>
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