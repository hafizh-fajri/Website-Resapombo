@extends('layouts.admin')

@section('title', 'Kelola Perangkat Desa')

@section('content')

<h1>Kelola Perangkat Desa</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('admin.perangkat.create') }}">+ Tambah Perangkat Baru</a>

<table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px; width: 100%;">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>No WA</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($perangkat as $item)
            <tr>
                <td>
                    @if ($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" width="60">
                    @else
                        -
                    @endif
                </td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jabatan->nama ?? '-' }}</td>
                <td>{{ $item->no_wa ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.perangkat.edit', $item->id) }}">Edit</a>

                    <form action="{{ route('admin.perangkat.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin mau hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Belum ada data perangkat desa.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection