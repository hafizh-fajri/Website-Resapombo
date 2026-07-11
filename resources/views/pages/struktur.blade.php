@extends('layouts.app')

@section('title', 'Struktur Organisasi')

@section('content')
    <h1>Struktur Organisasi Desa</h1>
    <ul>
        @foreach ($perangkat as $orang)
            <li>{{ $orang['nama'] }} — {{ $orang['jabatan'] }}</li>
        @endforeach
    </ul>
@endsection