@extends('layouts.app')

@section('title', 'Layanan Administrasi')

@section('content')
    <h1>Layanan Administrasi Desa</h1>
    @foreach ($layanan as $item)
        <div class="card">
            <h3>{{ $item['nama'] }}</h3>
            <p><strong>Syarat:</strong></p>
            <ul>
                @foreach ($item['syarat'] as $syarat)
                    <li>{{ $syarat }}</li>
                @endforeach
            </ul>
            <p><strong>Prosedur:</strong> {{ $item['prosedur'] }}</p>
            <p><strong>Biaya:</strong> {{ $item['biaya'] }}</p>
        </div>
    @endforeach
@endsection