@extends('layouts.admin')

@section('title', 'Kelola Pemerintahan Desa')

@section('content')

<h1>Kelola Pemerintahan Desa</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<h2>Jabatan</h2>

<h3>Tambah Jabatan Baru</h3>
<form action="{{ route('admin.jabatan.store') }}" method="POST">
    @csrf
    <input type="text" name="nama" placeholder="Nama jabatan, contoh: Kepala Dusun">
    <input type="number" name="tingkat" placeholder="Tingkat (1 = tertinggi)" min="1" style="width: 200px;">
    <button type="submit">Tambah Jabatan</button>

    @if ($errors->any() && old('tingkat') !== null)
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</form>

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

<hr>

<h2>Perangkat Desa</h2>

@if ($jabatan->isEmpty())
    <p style="color: red;">Tambahkan Jabatan terlebih dahulu sebelum menambah Perangkat.</p>
@else

<h3>Tambah Perangkat Baru</h3>
<form action="{{ route('admin.perangkat.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label>Nama</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}">
    </div>

    <div>
        <label>Jabatan</label><br>
        <select name="jabatan_id">
            <option value="">-- Pilih Jabatan --</option>
            @foreach ($jabatan as $jab)
                <option value="{{ $jab->id }}" {{ old('jabatan_id') == $jab->id ? 'selected' : '' }}>{{ $jab->nama }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>No. WhatsApp</label><br>
        <input type="text" name="no_wa" value="{{ old('no_wa') }}" placeholder="Contoh: 6281234567890">
    </div>

    <div>
        <label>Kata Sambutan (khusus Kepala Desa, opsional)</label><br>
        <textarea name="kata_sambutan" rows="3">{{ old('kata_sambutan') }}</textarea>
    </div>

    <div>
        <label>Foto</label><br>
        <input type="file" name="foto" accept="image/*">
    </div>

    @if ($errors->any() && old('jabatan_id') !== null)
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">Tambah Perangkat</button>
</form>

@endif

<h3 style="margin-top: 20px;">Daftar Perangkat</h3>
<table border="1" cellpadding="8" cellspacing="0" style="width: 100%;">
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