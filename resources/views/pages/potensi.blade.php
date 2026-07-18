@extends('layouts.app')

@section('title', 'Potensi Desa')

@section('content')
    <h1>Kekayaan & Potensi Desa Resapombo</h1>

    @forelse ($potensi as $item)
        <div class="card">
            @if ($item->gambar)
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}">
            @endif
            @if ($item->kategori)
                <span class="badge">{{ $item->kategori }}</span>
            @endif
            <h3>{{ $item->nama }}</h3>
            <p>{{ $item->deskripsi }}</p>
        </div>
    @empty
        <p>Belum ada data potensi desa.</p>
    @endforelse
@endsection