<div class="berita-card card">
    <div class="berita-card-gambar">
        @if ($item->gambar)
            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
        @endif
        @if ($item->kategori)
            <span class="tag-badge-overlay">{{ $item->kategori->nama }}</span>
        @endif
    </div>
    <p class="berita-meta">📅 {{ $item->tanggal->format('d F Y') }}</p>
    <h4>{{ $item->judul }}</h4>
    <p>{{ Str::limit($item->sinopsis, 80) }}</p>
    <p style="display: flex; justify-content: space-between; align-items: center;">
        <small>{{ $item->penulis }}</small>
        <a href="{{ $item->link_eksternal ?: route('berita.show', $item->id) }}" {{ $item->link_eksternal ? 'target=_blank' : '' }}>Baca Selengkapnya →</a>
    </p>
</div>