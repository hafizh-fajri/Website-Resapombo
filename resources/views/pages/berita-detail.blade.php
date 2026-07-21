@extends('layouts.app')

@section('title', $artikel->judul)

@section('content')

    <a href="{{ route('berita') }}">← Kembali ke Berita</a>

    <article style="margin-top: 20px;">
        @if ($artikel->kategori)
            <span class="tag-badge">{{ $artikel->kategori->nama }}</span>
        @endif
        <h1>{{ $artikel->judul }}</h1>
        <p class="berita-meta">📅 {{ $artikel->tanggal->format('d F Y') }} • Oleh: {{ $artikel->penulis }}</p>

        @if ($artikel->gambar)
            <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" style="width: 100%; border-radius: 8px; margin: 20px 0;">
        @endif

        <div class="berita-isi">
            {!! nl2br(e($artikel->isi)) !!}
        </div>
    </article>

@endsection