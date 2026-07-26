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

        $query = Artikel::with('kategori')->latest('tanggal');

        if ($kategoriId) {
            $query->where('kategori_berita_id', $kategoriId);
        }

        $artikel = $query->get();
        $kategori = KategoriBerita::orderBy('nama')->get();

        return view('pages.berita', compact('artikel', 'kategori', 'kategoriId'));
    }

    public function show(Artikel $artikel)
    {
        if ($artikel->link_eksternal) {
            return redirect()->away($artikel->link_eksternal);
        }

        return view('pages.berita-detail', compact('artikel'));
    }
}