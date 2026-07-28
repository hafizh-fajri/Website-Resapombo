<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $kategoriId = $request->query('kategori');
        $search = $request->query('search'); // Menangkap input pencarian

        // Mulai query dengan eager loading
        $query = Artikel::with('kategori')->latest('tanggal');

        // Filter berdasarkan kategori jika ada
        if ($kategoriId) {
            $query->where('kategori_berita_id', $kategoriId);
        }

        // Filter pencarian berdasarkan judul atau isi artikel
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('isi', 'like', "%{$search}%");
            });
        }

        $berita = $query->get();
        $beritaTerbaru = Artikel::with('kategori')->latest('tanggal')->take(3)->get();
        $kategori = KategoriBerita::orderBy('nama')->get();

        return view('pages.berita', compact('berita', 'beritaTerbaru', 'kategori', 'kategoriId', 'search'));
    }

    public function show(Artikel $artikel)
    {
        if ($artikel->link_eksternal) {
            return redirect()->away($artikel->link_eksternal);
        }

        return view('pages.berita-detail', compact('artikel'));
    }
}