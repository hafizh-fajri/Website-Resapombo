@extends('layouts.admin')

@section('title', 'Edit Jabatan')

@section('content')

<h1>Edit Jabatan</h1>

<form action="{{ route('admin.jabatan.update', $jabatan->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Nama Jabatan</label><br>
        <input type="text" name="nama" value="{{ old('nama', $jabatan->nama) }}">
    </div>

    <div>
        <label>Tingkat (angka kecil = lebih tinggi)</label><br>
        <input type="number" name="tingkat" value="{{ old('tingkat', $jabatan->tingkat) }}" min="1">
    </div>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">Update</button>
    <a href="{{ route('admin.pemerintahan.index') }}">Batal</a>
</form>

@endsection