@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')

<h1>Kelola Berita</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<h2>Kategori Berita</h2>

<form action="{{ route('admin.kategori-berita.store') }}" method="POST" style="margin-bottom: 15px;">
    @csrf
    <input type="text" name="nama" placeholder="Nama kategori baru, contoh: Pembangunan">
    <button type="submit">Tambah Kategori</button>
    @error('nama')
        <p style="color: red;">{{ $message }}</p>
    @enderror
</form>

<div style="display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 20px;">
    @forelse ($kategori as $kat)
        <div style="border: 1px solid #ccc; border-radius: 15px; padding: 5px 12px; display: flex; align-items: center; gap: 8px;">
            {{ $kat->nama }}
            <form action="{{ route('admin.kategori-berita.destroy', $kat->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini? Artikel dengan kategori ini akan jadi tanpa kategori.')">
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

<h2>Daftar Berita</h2>

<a href="{{ route('admin.artikel.create') }}">+ Tambah Berita Baru</a>

<table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px; width: 100%;">
    <thead>
        <tr>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Tanggal</th>
            <th>Penulis</th>
            <th>Tipe</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($artikel as $item)
            <tr>
                <td>
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" width="80">
                    @else
                        -
                    @endif
                </td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->kategori->nama ?? '-' }}</td>
                <td>{{ $item->tanggal ? $item->tanggal->format('d-m-Y') : '-' }}</td>
                <td>{{ $item->penulis }}</td>
                <td>{{ $item->link_eksternal ? 'Link Eksternal' : 'Tulisan Sendiri' }}</td>
                <td>
                    <a href="{{ route('admin.artikel.edit', $item->id) }}">Edit</a>

                    <form action="{{ route('admin.artikel.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin mau hapus berita ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">Belum ada berita.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection