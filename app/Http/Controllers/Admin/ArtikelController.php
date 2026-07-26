<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::with('kategori')->latest('tanggal')->get();
        $kategori = KategoriBerita::orderBy('nama')->get();

        return view('admin.artikel.index', compact('artikel', 'kategori'));
    }

    public function create()
    {
        $kategori = KategoriBerita::orderBy('nama')->get();
        return view('admin.artikel.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'sinopsis' => 'required|string',
            'tanggal' => 'required|date',
            'penulis' => 'required|string|max:255',
            'kategori_berita_id' => 'nullable|exists:kategori_berita,id',
            'link_eksternal' => 'nullable|url',
            'isi' => 'required_without:link_eksternal|nullable|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $validated['isi'] = $validated['isi'] ?? '';

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        Artikel::create($validated);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Artikel $artikel)
    {
        $kategori = KategoriBerita::orderBy('nama')->get();
        return view('admin.artikel.edit', compact('artikel', 'kategori'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'sinopsis' => 'required|string',
            'tanggal' => 'required|date',
            'penulis' => 'required|string|max:255',
            'kategori_berita_id' => 'nullable|exists:kategori_berita,id',
            'link_eksternal' => 'nullable|url',
            'isi' => 'required_without:link_eksternal|nullable|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $validated['isi'] = $validated['isi'] ?? '';

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update($validated);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }

    public function storeKategori(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        KategoriBerita::create($validated);

        return redirect()->route('admin.artikel.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroyKategori(KategoriBerita $kategori)
    {
        $kategori->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Kategori berhasil dihapus.');
    }
}