@extends('layouts.admin')

@section('title', 'Edit BUMDes')

@section('content')

<h1>Edit BUMDes</h1>

<form action="{{ route('admin.bumdes.update', $bumdes->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Nama</label><br>
        <input type="text" name="nama" value="{{ old('nama', $bumdes->nama) }}">
    </div>

    <div>
        <label>Kategori</label><br>
        <select name="kategori">
            <option value="Unit Usaha" {{ old('kategori', $bumdes->kategori) == 'Unit Usaha' ? 'selected' : '' }}>Unit Usaha</option>
            <option value="Mitra Lokal" {{ old('kategori', $bumdes->kategori) == 'Mitra Lokal' ? 'selected' : '' }}>Mitra Lokal</option>
        </select>
    </div>

    <div>
        <label>Deskripsi</label><br>
        <textarea name="deskripsi" rows="4">{{ old('deskripsi', $bumdes->deskripsi) }}</textarea>
    </div>

    <div>
        <label>Gambar Saat Ini</label><br>
        @if ($bumdes->gambar)
            <img src="{{ asset('storage/' . $bumdes->gambar) }}" width="100"><br>
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
    <a href="{{ route('admin.bumdes.index') }}">Batal</a>
</form>

@endsection