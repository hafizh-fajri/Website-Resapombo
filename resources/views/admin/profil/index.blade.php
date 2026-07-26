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

<hr>

<h2>Dokumen Publik</h2>

<h3>Tambah Dokumen Baru</h3>
<form action="{{ route('admin.profil.dokumen.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label>Nama Dokumen</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Contoh: Profil Desa Lengkap">
    </div>

    <div>
        <label>File PDF (maks. 5MB)</label><br>
        <input type="file" name="file" accept="application/pdf">
    </div>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">Upload Dokumen</button>
</form>

<h3 style="margin-top: 20px;">Daftar Dokumen</h3>
<table border="1" cellpadding="8" cellspacing="0" style="width: 100%;">
    <thead>
        <tr>
            <th>Nama</th>
            <th>File</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dokumen as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td><a href="{{ asset('storage/' . $item->file) }}" target="_blank">Lihat PDF</a></td>
                <td>
                    <form action="{{ route('admin.profil.dokumen.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin mau hapus dokumen ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Belum ada dokumen.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<hr>

<h2>Riwayat Kepala Desa</h2>

<h3>Tambah Data Kepala Desa</h3>
<form action="{{ route('admin.profil.kepala-desa.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label>Nama</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}">
    </div>

    <div>
        <label>Masa Jabatan</label><br>
        <input type="text" name="masa_jabatan" value="{{ old('masa_jabatan') }}" placeholder="Contoh: 1945 - 1967">
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

    <button type="submit">Tambah Data</button>
</form>

<h3 style="margin-top: 20px;">Daftar Kepala Desa</h3>
<table border="1" cellpadding="8" cellspacing="0" style="width: 100%;">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>Masa Jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($kepalaDesa as $item)
            <tr>
                <td>
                    @if ($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" width="60">
                    @else
                        -
                    @endif
                </td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->masa_jabatan }}</td>
                <td>
                    <form action="{{ route('admin.profil.kepala-desa.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin mau hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Belum ada data kepala desa.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection