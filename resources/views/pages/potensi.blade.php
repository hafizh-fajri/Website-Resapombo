@extends('layouts.app')

@section('title', 'Potensi Desa')

@section('content')
    <h1>Potensi Desa</h1>
    @forelse ($potensi as $item)
        <div class="card">
            @if ($item->gambar)
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}">
            @endif
            <h3>{{ $item->nama }}</h3>
            <p>{{ $item->deskripsi }}</p>
        </div>
    @empty
        <p>Belum ada data potensi desa.</p>
    @endforelse
@endsection