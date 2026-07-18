@extends('layouts.app')

@section('title', 'Beranda - Website Desa')

@section('content')
    <h1>Selamat Datang di Desa Contoh</h1>
    <p>Sambutan singkat dari Kepala Desa akan ditampilkan di sini.</p>

    <section>
        <div class="card">
            <p>{{ number_format($informasi->jumlah_penduduk) }}</p>
            <p>PENDUDUK</p>
        </div>
        <div class="card">
            <p>{{ $informasi->luas_wilayah }} Ha</p>
            <p>LUAS WILAYAH</p>
        </div>
        <div class="card">
            <p>{{ $informasi->jumlah_dusun }}</p>
            <p>DUSUN</p>
        </div>
        <div class="card">
            <p>{{ $informasi->jumlah_rt }} / {{ $informasi->jumlah_rw }}</p>
            <p>RT/RW</p>
        </div>
    </section>

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