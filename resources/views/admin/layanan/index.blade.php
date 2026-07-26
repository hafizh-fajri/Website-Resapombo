@extends('layouts.admin')

@section('title', 'Kelola Layanan')

@section('content')

<h1>Kelola Layanan Desa</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<h2>Kategori Layanan</h2>

<form action="{{ route('admin.layanan.kategori.store') }}" method="POST" style="margin-bottom: 15px;">
    @csrf
    <input type="text" name="nama" placeholder="Nama kategori baru, contoh: Administrasi">
    <button type="submit">Tambah Kategori</button>
    @error('nama')
        <p style="color: red;">{{ $message }}</p>
    @enderror
</form>

<div style="display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 20px;">
    @forelse ($kategori as $kat)
        <div style="border: 1px solid #ccc; border-radius: 15px; padding: 5px 12px; display: flex; align-items: center; gap: 8px;">
            {{ $kat->nama }}
            <form action="{{ route('admin.layanan.kategori.destroy', $kat->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini? Layanan dengan kategori ini akan jadi tanpa kategori.')">
                @csrf
                @method('DELETE')
                <button type="submit" style="border: none; background: none; color: red; cursor: pointer;">x</button>
            </form>
        </div>
    @empty
        <p>Belum ada kategori.</p>
    @endforelse
</div>

<hr>

<h2>Daftar Layanan</h2>

<a href="{{ route('admin.layanan.create') }}">+ Tambah Layanan Baru</a>

<table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px; width: 100%;">
    <thead>
        <tr>
            <th>Nama Layanan</th>
            <th>Kategori</th>
            <th>PDF Formulir</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($layanan as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->kategori->nama ?? '-' }}</td>
                <td>{{ $item->file_pdf ? 'Ada' : '-' }}</td>
                <td>
                    <a href="{{ route('admin.layanan.edit', $item->id) }}">Edit</a>

                    <form action="{{ route('admin.layanan.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin mau hapus layanan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Belum ada layanan.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<hr>

<h2>Kontak Layanan</h2>

<form action="{{ route('admin.layanan.kontak.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Nomor WhatsApp</label><br>
        <input type="text" name="no_wa" value="{{ old('no_wa', $kontak->no_wa) }}" placeholder="Contoh: 6281234567890">
    </div>

    <div>
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email', $kontak->email) }}">
    </div>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">Simpan Kontak</button>
</form>

<hr>

<h2>Jam Operasional</h2>

<form action="{{ route('admin.layanan.jam.store') }}" method="POST" style="margin-bottom: 15px;">
    @csrf
    <input type="text" name="hari" placeholder="Contoh: Senin - Kamis">
    <input type="text" name="jam" placeholder="Contoh: 08:00 - 15:00 atau Tutup">
    <button type="submit">Tambah Baris</button>
</form>

<table border="1" cellpadding="8" cellspacing="0" style="width: 100%;">
    <thead>
        <tr>
            <th>Hari</th>
            <th>Jam</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($jamOperasional as $item)
            <tr>
                <td>{{ $item->hari }}</td>
                <td>{{ $item->jam }}</td>
                <td>
                    <form action="{{ route('admin.layanan.jam.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus baris ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Belum ada jam operasional.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection