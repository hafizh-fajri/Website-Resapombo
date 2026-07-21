@extends('layouts.app')

@section('title', 'Layanan Desa')

@section('content')

    {{-- HERO (statis) --}}
    <section class="hero">
        <span class="badge">WEBSITE DESA RESAPOMBO</span>
        <h1>Pelayanan Desa</h1>
        <p>Temukan informasi lengkap seputar administrasi, layanan publik, dan persyaratan yang dibutuhkan di Desa Resapombo.</p>
    </section>

    {{-- SEARCH BAR (placeholder, akan diisi teman) --}}
    <section class="search-bar-placeholder" style="margin: 20px 0;">
        {{-- search bar akan ditempatkan di sini --}}
    </section>

    <div class="layanan-layout" style="display: flex; gap: 30px; align-items: flex-start;">

        {{-- SIDEBAR KATEGORI (klik = scroll ke section) --}}
        <aside style="flex: 0 0 220px;">
            <h3>Kategori Topik</h3>
            <nav style="display: flex; flex-direction: column; gap: 8px;">
                @foreach ($kategori as $kat)
                    @if ($kat->layanan->isNotEmpty())
                        <a href="#kategori-{{ $kat->id }}" class="tag-filter" style="text-align: left;">{{ $kat->nama }}</a>
                    @endif
                @endforeach
            </nav>
        </aside>

        {{-- LIST LAYANAN PER KATEGORI --}}
        <div style="flex: 1;">
            @forelse ($kategori as $kat)
                @if ($kat->layanan->isNotEmpty())
                    <section id="kategori-{{ $kat->id }}" style="margin-bottom: 40px; scroll-margin-top: 90px;">
                        <h2>{{ $kat->nama }}</h2>

                        <div style="display: flex; flex-direction: column; gap: 10px;">
                            @foreach ($kat->layanan as $item)
                                <details class="card">
                                    <summary style="cursor: pointer; font-weight: bold;">{{ $item->nama }}</summary>

                                    <div style="margin-top: 15px;">
                                        @if ($item->langkah)
                                            <h4>Langkah-langkah:</h4>
                                            <ol>
                                                @foreach (explode("\n", $item->langkah) as $langkah)
                                                    @if (trim($langkah) !== '')
                                                        <li>{{ trim($langkah) }}</li>
                                                    @endif
                                                @endforeach
                                            </ol>
                                        @endif

                                        @if ($item->file_pdf)
                                            <p>
                                                <a href="{{ asset('storage/' . $item->file_pdf) }}" target="_blank">Lihat Formulir PDF</a>
                                                |
                                                <a href="{{ asset('storage/' . $item->file_pdf) }}" download>Download Formulir</a>
                                            </p>
                                        @endif
                                    </div>
                                </details>
                            @endforeach
                        </div>
                    </section>
                @endif
            @empty
                <p>Belum ada layanan tersedia.</p>
            @endforelse
        </div>

        {{-- SIDEBAR KONTAK + JAM OPERASIONAL --}}
        <aside style="flex: 0 0 280px;">
            <div class="card">
                <h3>Masih Memiliki Pertanyaan?</h3>
                <p>Jika Anda tidak menemukan jawaban yang dicari, tim pelayanan desa kami siap membantu Anda.</p>

                @if ($kontak && $kontak->no_wa)
                    <a href="https://wa.me/{{ $kontak->no_wa }}" target="_blank" class="btn">📱 Hubungi via WhatsApp</a>
                @endif

                @if ($kontak && $kontak->email)
                    <a href="mailto:{{ $kontak->email }}" class="btn">✉️ Kirim Email</a>
                @endif

                <hr>

                <h4>Jam Operasional</h4>
                @forelse ($jamOperasional as $item)
                    <p style="display: flex; justify-content: space-between;">
                        <span>{{ $item->hari }}</span>
                        <strong>{{ $item->jam }}</strong>
                    </p>
                @empty
                    <p>Belum ada informasi jam operasional.</p>
                @endforelse
            </div>
        </aside>

    </div>

@endsection