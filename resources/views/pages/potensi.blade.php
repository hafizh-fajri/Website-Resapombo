@extends('layouts.app')

@section('title', 'Potensi Desa')

@section('content')
    <h1>Potensi Desa</h1>
    @foreach ($potensi as $item)
        <div class="card">
            <img src="{{ asset('images/potensi/' . $item['gambar']) }}" alt="{{ $item['nama'] }}">
            <h3>{{ $item['nama'] }}</h3>
            <p>{{ $item['deskripsi'] }}</p>
        </div>
    @endforeach
@endsection