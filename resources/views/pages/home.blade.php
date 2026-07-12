@extends('layouts.app')

@section('title', 'Beranda - Website Desa')

@section('content')
    <h1>Selamat Datang di Desa Contoh</h1>
    <p>Sambutan singkat dari Kepala Desa akan ditampilkan di sini.</p>

    <hr>

    <section>
        <h2>Galeri Foto</h2>

        @forelse ($galeri as $item)
            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" width="150" style="margin: 5px;">
        @empty
            <p>Belum ada foto di galeri.</p>
        @endforelse
    </section>

    <hr>

    <section>
        <h2>Artikel Terbaru</h2>

        @forelse ($artikel as $item)
            <div class="card">
                @if ($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" width="200">
                @endif
                <h3>{{ $item->judul }}</h3>
                <p><small>{{ $item->tanggal ? $item->tanggal->format('d-m-Y') : '' }}</small></p>
                <p>{{ Str::limit($item->isi, 100) }}</p>
            </div>
        @empty
            <p>Belum ada artikel.</p>
        @endforelse
    </section>
@endsection