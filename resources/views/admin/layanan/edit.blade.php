@extends('layouts.admin')

@section('title', 'Edit Layanan')

@section('content')

<h1>Edit Layanan</h1>

<form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Nama Layanan</label><br>
        <input type="text" name="nama" value="{{ old('nama', $layanan->nama) }}">
    </div>

    <div>
        <label>Kategori</label><br>
        <select name="kategori_layanan_id">
            <option value="">-- Tanpa Kategori --</option>
            @foreach ($kategori as $kat)
                <option value="{{ $kat->id }}" {{ old('kategori_layanan_id', $layanan->kategori_layanan_id) == $kat->id ? 'selected' : '' }}>{{ $kat->nama }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Langkah-langkah (1 langkah per baris)</label><br>
        <textarea name="langkah" rows="6">{{ old('langkah', $layanan->langkah) }}</textarea>
    </div>

    <div>
        <label>File PDF Saat Ini</label><br>
        @if ($layanan->file_pdf)
            <a href="{{ asset('storage/' . $layanan->file_pdf) }}" target="_blank">Lihat PDF</a>
        @else
            <p>Belum ada file</p>
        @endif
    </div>

    <div>
        <label>Ganti File PDF (kosongkan jika tidak ingin ganti)</label><br>
        <input type="file" name="file_pdf" accept="application/pdf">
    </div>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">Update</button>
    <a href="{{ route('admin.layanan.index') }}">Batal</a>
</form>

@endsection