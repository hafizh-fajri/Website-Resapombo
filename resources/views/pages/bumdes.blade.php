@extends('layouts.app')

@section('title', 'BUMDes')

@section('content')
    <h1>BUMDes Desa</h1>
    @forelse ($bumdes as $item)
        <div class="card">
            @if ($item->gambar)
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}">
            @endif
            <h3>{{ $item->nama }}</h3>
            <p>{{ $item->deskripsi }}</p>
        </div>
    @empty
        <p>Belum ada data BUMDes.</p>
    @endforelse
@endsection