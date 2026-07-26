@extends('layouts.admin')

@section('title', 'Kelola BUMDes')

@section('content')

<h1>Kelola BUMDes</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('admin.bumdes.create') }}">+ Tambah BUMDes Baru</a>

<table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px; width: 100%;">
    <thead>
        <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($bumdes as $item)
            <tr>
                <td>
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" width="80">
                    @else
                        -
                    @endif
                </td>
                <td>{{ $item->nama }}</td>
                <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                <td>
                    <a href="{{ route('admin.bumdes.edit', $item->id) }}">Edit</a>

                    <form action="{{ route('admin.bumdes.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin mau hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Belum ada data BUMDes.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<hr>

<h2>Kontak BUMDes</h2>

<form action="{{ route('admin.bumdes.kontak.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Nomor WhatsApp BUMDes</label><br>
        <input type="text" name="no_wa" value="{{ old('no_wa', $kontak->no_wa) }}" placeholder="Contoh: 6281234567890">
    </div>

    <div>
        <label>File Profil BUMDes (PDF)</label><br>
        @if ($kontak->file_profil)
            <p><a href="{{ asset('storage/' . $kontak->file_profil) }}" target="_blank">Lihat file saat ini</a></p>
        @endif
        <input type="file" name="file_profil" accept="application/pdf">
    </div>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">Simpan Kontak BUMDes</button>
</form>

@endsection