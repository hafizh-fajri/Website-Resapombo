@extends('layouts.app')

@section('title', 'Pemerintahan Desa')

@section('content')

    {{-- HERO (statis) --}}
    <section class="hero" style="background-image: url('{{ asset('images/profil/sejarah.jpg') }}'); background-size: cover; background-position: center; padding: 80px 20px; color: white;">
        <span class="badge">PERANGKAT DESA RESAPOMBO</span>
        <h1>Pemerintahan Desa</h1>
        <p>Transparansi, integritas, dan dedikasi dalam melayani masyarakat Desa Resapombo.</p>
    </section>

    @php
        $kepalaDesa = $jabatan->first();
        $jabatanLain = $jabatan->skip(1);
    @endphp

    {{-- KEPALA DESA (jabatan dengan tingkat paling tinggi, ditampilkan spesial) --}}
    @if ($kepalaDesa && $kepalaDesa->perangkat->isNotEmpty())
        @foreach ($kepalaDesa->perangkat as $orang)
            <section class="card kepala-desa-hero">
                <div class="kepala-desa-hero-foto">
                    @if ($orang->foto)
                        <img src="{{ asset('storage/' . $orang->foto) }}" alt="{{ $orang->nama }}">
                    @endif
                </div>
                <div class="kepala-desa-hero-info">
                    <span class="tag-badge">{{ $kepalaDesa->nama }} RESAPOMBO</span>
                    <h2>{{ $orang->nama }}</h2>
                    @if ($orang->no_wa)
                        <p>📱 {{ $orang->no_wa }}</p>
                    @endif
                    @if ($orang->kata_sambutan)
                        <blockquote style="border-left: 3px solid #1a6b2f; padding-left: 15px; margin: 15px 0; font-style: italic; color: #555;">
                            "{{ $orang->kata_sambutan }}"
                        </blockquote>
                    @endif
                </div>
            </section>
        @endforeach
    @endif

    {{-- JABATAN LAINNYA, DIKELOMPOKKAN PER JABATAN --}}
    @foreach ($jabatanLain as $jab)
        @if ($jab->perangkat->isNotEmpty())
            <section>
                <h2>{{ $jab->nama }}</h2>

                <div class="perangkat-grid">
                    @foreach ($jab->perangkat as $orang)
                        <div class="perangkat-card">
                            @if ($orang->foto)
                                <img src="{{ asset('storage/' . $orang->foto) }}" alt="{{ $orang->nama }}">
                            @endif
                            <h4>{{ $orang->nama }}</h4>
                            <p class="perangkat-jabatan">{{ $jab->nama }}</p>
                            @if ($orang->no_wa)
                                <p>📱 {{ $orang->no_wa }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    @endforeach

@endsection