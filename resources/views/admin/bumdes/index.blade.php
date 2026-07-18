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

@endsection