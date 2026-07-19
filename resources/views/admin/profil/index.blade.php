@extends('layouts.admin')

@section('title', 'Kelola Profil Desa')

@section('content')

<h1>Kelola Profil Desa</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<h2>Visi</h2>
<form action="{{ route('admin.profil.visi.update') }}" method="POST">
    @csrf
    @method('PUT')

    <textarea name="isi" rows="3" style="width: 100%;">{{ old('isi', $visi->isi) }}</textarea>

    @error('isi')
        <p style="color: red;">{{ $message }}</p>
    @enderror

    <button type="submit">Simpan Visi</button>
</form>

<hr>

<h2>Misi</h2>

<h3>Tambah Misi Baru</h3>
<form action="{{ route('admin.profil.misi.store') }}" method="POST">
    @csrf

    <div>
        <label>Judul Misi</label><br>
        <input type="text" name="judul" value="{{ old('judul') }}">
    </div>

    <div>
        <label>Deskripsi</label><br>
        <textarea name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
    </div>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">Tambah Misi</button>
</form>

<h3 style="margin-top: 20px;">Daftar Misi</h3>
<table border="1" cellpadding="8" cellspacing="0" style="width: 100%;">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($misi as $item)
            <tr>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                    <form action="{{ route('admin.profil.misi.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin mau hapus misi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Belum ada misi.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection