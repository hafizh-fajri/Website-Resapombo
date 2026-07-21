@extends('layouts.admin')

@section('title', 'Edit Perangkat Desa')

@section('content')

<h1>Edit Perangkat Desa</h1>

<form action="{{ route('admin.perangkat.update', $perangkat->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Nama</label><br>
        <input type="text" name="nama" value="{{ old('nama', $perangkat->nama) }}">
    </div>

    <div>
        <label>Jabatan</label><br>
        <select name="jabatan_id">
            @foreach ($jabatan as $item)
                <option value="{{ $item->id }}" {{ old('jabatan_id', $perangkat->jabatan_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>No. WhatsApp</label><br>
        <input type="text" name="no_wa" value="{{ old('no_wa', $perangkat->no_wa) }}">
    </div>

    <div>
        <label>Kata Sambutan (khusus untuk Kepala Desa, opsional)</label><br>
        <textarea name="kata_sambutan" rows="4">{{ old('kata_sambutan', $perangkat->kata_sambutan) }}</textarea>
    </div>

    <div>
        <label>Foto Saat Ini</label><br>
        @if ($perangkat->foto)
            <img src="{{ asset('storage/' . $perangkat->foto) }}" width="100"><br>
        @else
            <p>Belum ada foto</p>
        @endif
    </div>

    <div>
        <label>Ganti Foto (kosongkan jika tidak ingin ganti)</label><br>
        <input type="file" name="foto" accept="image/*">
    </div>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">Update</button>
    <a href="{{ route('admin.perangkat.index') }}">Batal</a>
</form>

@endsection