@extends('layouts.admin')

@section('title', 'Kelola Artikel')

@section('content')

<h1>Kelola Artikel</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('admin.artikel.create') }}">+ Tambah Artikel Baru</a>

<table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px; width: 100%;">
    <thead>
        <tr>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Isi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($artikel as $item)
            <tr>
                <td>
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" width="80">
                    @else
                        -
                    @endif
                </td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->tanggal ? $item->tanggal->format('d-m-Y') : '-' }}</td>
                <td>{{ Str::limit($item->isi, 50) }}</td>
                <td>
                    <a href="{{ route('admin.artikel.edit', $item->id) }}">Edit</a>

                    <form action="{{ route('admin.artikel.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin mau hapus artikel ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Belum ada artikel.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection