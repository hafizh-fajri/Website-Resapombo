@extends('layouts.admin')

@section('title', 'Tambah Layanan')

@section('content')

<h1>Tambah Layanan</h1>

<form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label>Nama Layanan</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Contoh: Pembuatan Surat Keterangan Usaha">
    </div>

    <div>
        <label>Kategori</label><br>
        <select name="kategori_layanan_id">
            <option value="">-- Tanpa Kategori --</option>
            @foreach ($kategori as $kat)
                <option value="{{ $kat->id }}" {{ old('kategori_layanan_id') == $kat->id ? 'selected' : '' }}>{{ $kat->nama }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Langkah-langkah (1 langkah per baris)</label><br>
        <textarea name="langkah" rows="6" placeholder="Datang ke kantor desa&#10;Isi formulir permohonan&#10;Tunggu proses verifikasi">{{ old('langkah') }}</textarea>
    </div>

    <div>
        <label>File PDF Formulir (opsional)</label><br>
        <input type="file" name="file_pdf" accept="application/pdf">
    </div>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">Simpan</button>
    <a href="{{ route('admin.layanan.index') }}">Batal</a>
</form>

@endsection