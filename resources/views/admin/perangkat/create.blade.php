@extends('layouts.admin')

@section('title', 'Tambah Perangkat Desa')

@section('content')

<h1>Tambah Perangkat Desa</h1>

@if ($jabatan->isEmpty())
    <p style="color: red;">Belum ada Jabatan. Silakan <a href="{{ route('admin.jabatan.create') }}">tambah Jabatan</a> terlebih dahulu.</p>
@else

<form action="{{ route('admin.perangkat.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label>Nama</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}">
    </div>

    <div>
        <label>Jabatan</label><br>
        <select name="jabatan_id">
            <option value="">-- Pilih Jabatan --</option>
            @foreach ($jabatan as $item)
                <option value="{{ $item->id }}" {{ old('jabatan_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>No. WhatsApp</label><br>
        <input type="text" name="no_wa" value="{{ old('no_wa') }}" placeholder="Contoh: 6281234567890">
    </div>

    <div>
        <label>Kata Sambutan (khusus untuk Kepala Desa, opsional)</label><br>
        <textarea name="kata_sambutan" rows="4">{{ old('kata_sambutan') }}</textarea>
    </div>

    <div>
        <label>Foto</label><br>
        <input type="file" name="foto" accept="image/*">
    </div>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">Simpan</button>
    <a href="{{ route('admin.perangkat.index') }}">Batal</a>
</form>

@endif

@endsection