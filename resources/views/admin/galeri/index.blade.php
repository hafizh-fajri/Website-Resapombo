@extends('layouts.admin')

@section('title', 'Kelola Galeri')

@section('content')

<h1>Kelola Galeri Foto</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('admin.galeri.create') }}">+ Tambah Foto Baru</a>

<table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px; width: 100%;">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Judul</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($galeri as $item)
            <tr>
                <td>
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" width="100">
                </td>
                <td>{{ $item->judul }}</td>
                <td>
                    <a href="{{ route('admin.galeri.edit', $item->id) }}">Edit</a>

                    <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin mau hapus foto ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Belum ada foto di galeri.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection