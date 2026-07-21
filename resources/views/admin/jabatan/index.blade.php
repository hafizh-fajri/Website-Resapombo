@extends('layouts.admin')

@section('title', 'Kelola Jabatan')

@section('content')

<h1>Kelola Jabatan</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('admin.jabatan.create') }}">+ Tambah Jabatan Baru</a>

<table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px; width: 100%;">
    <thead>
        <tr>
            <th>Tingkat</th>
            <th>Nama Jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($jabatan as $item)
            <tr>
                <td>{{ $item->tingkat }}</td>
                <td>{{ $item->nama }}</td>
                <td>
                    <a href="{{ route('admin.jabatan.edit', $item->id) }}">Edit</a>

                    <form action="{{ route('admin.jabatan.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin mau hapus jabatan ini? Semua perangkat dengan jabatan ini juga akan terhapus!')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Belum ada jabatan.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection