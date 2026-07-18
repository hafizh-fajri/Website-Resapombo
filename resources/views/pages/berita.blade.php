@extends('layouts.app')

@section('title', 'Berita & Artikel')

@section('content')
    <h1>Berita & Artikel Desa</h1>

    <div class="berita-grid">
        @forelse ($artikel as $item)
            <div class="card">
                @if ($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
                @endif
                <p><small>{{ $item->tanggal ? $item->tanggal->format('d-m-Y') : '' }}</small></p>
                <h3>{{ $item->judul }}</h3>
                <p>{{ Str::limit($item->isi, 100) }}</p>
            </div>
        @empty
            <p>Belum ada berita.</p>
        @endforelse
    </div>

    <div class="pagination-wrapper">
        {{ $artikel->links() }}
    </div>
@endsection