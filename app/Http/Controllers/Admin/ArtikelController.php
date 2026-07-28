<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{

    public function create()
    {
        $kategori = KategoriBerita::orderBy('nama')->get();
        return view('pages.admin.dashboard', compact('kategori'));
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
        ]);

        $validated['isi'] = $validated['isi'] ?? '';

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            
            // Membuat nama file yang unik agar tidak tertimpa jika ada nama file yang sama
            $nama_file = time() . '_' . $file->getClientOriginalName();
            
            // Menentukan lokasi folder tujuan upload di dalam folder public
            $tujuan_upload = public_path('uploads/images');
            
            // Memindahkan file gambar ke folder tujuan
            $file->move($tujuan_upload, $nama_file);
            
            // Menyimpan rute/path file ke dalam array untuk disimpan ke database kolom 'gambar'
            $validated['gambar'] = 'uploads/images/' . $nama_file;
        }

        Artikel::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Artikel $artikel)
    {
        $kategori = KategoriBerita::orderBy('nama')->get();
        return view('pages.admin.artikel.edit', compact('artikel', 'kategori'));
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
        ]);

        $validated['isi'] = $validated['isi'] ?? '';

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            
            // Membuat nama file yang unik agar tidak tertimpa jika ada nama file yang sama
            $nama_file = time() . '_' . $file->getClientOriginalName();
            
            // Menentukan lokasi folder tujuan upload di dalam folder public
            $tujuan_upload = public_path('uploads/images');
            
            // Memindahkan file gambar ke folder tujuan
            $file->move($tujuan_upload, $nama_file);
            
            // Menyimpan rute/path file ke dalam array untuk disimpan ke database kolom 'gambar'
            $validated['gambar'] = 'uploads/images/' . $nama_file;
        }

        $artikel->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Artikel berhasil dihapus.');
    }

    public function storeKategori(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        KategoriBerita::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroyKategori(KategoriBerita $kategori)
    {
        $kategori->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Kategori berhasil dihapus.');
    }
}