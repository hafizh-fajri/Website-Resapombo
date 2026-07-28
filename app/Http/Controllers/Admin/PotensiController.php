<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Potensi;
use App\Models\FaktaSingkat;    
use Illuminate\Http\Request;

class PotensiController extends Controller
{
    public function index()
    {
        $potensi = Potensi::latest()->get();
        return view('admin.dashboard', compact('potensi'));
    }

    public function create()
    {
        return view('admin.dashboard');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            
            // Membuat nama file yang unik agar tidak tertimpa jika ada nama file yang sama
            $nama_file = time() . '_' . $file->getClientOriginalName();
            
            // Menentukan lokasi folder tujuan upload di dalam folder public
            $tujuan_upload = public_path('uploads/images');
            
            // Memindahkan file gambar ke folder tujuan
            $file->move($tujuan_upload, $nama_file);
            
            // Menyimpan rute/path file ke dalam array untuk disimpan ke database kolom 'foto'
            $validated['gambar'] = 'uploads/images/' . $nama_file;
        }

        Potensi::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Data potensi berhasil ditambahkan.');
    }

    public function edit(Potensi $potensi)
    {
        return view('admin.dashboard', compact('potensi'));
    }

    public function update(Request $request, Potensi $potensi)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            
            // Membuat nama file yang unik agar tidak tertimpa jika ada nama file yang sama
            $nama_file = time() . '_' . $file->getClientOriginalName();
            
            // Menentukan lokasi folder tujuan upload di dalam folder public
            $tujuan_upload = public_path('uploads/images');
            
            // Memindahkan file gambar ke folder tujuan
            $file->move($tujuan_upload, $nama_file);
            
            // Menyimpan rute/path file ke dalam array untuk disimpan ke database kolom 'foto'
            $validated['gambar'] = 'uploads/images/' . $nama_file;
        }

        $potensi->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Data potensi berhasil diperbarui.');
    }

    public function fsupdate(Request $request)
    {
        // Validasi input
        $request->validate([
            'luas_lahan_baku' => 'required|numeric|min:0',
            'kelompok_tani'   => 'required|integer|min:0',
            'produksi_padi'   => 'required|numeric|min:0',
        ]);

        // Karena hanya ada 1 data fakta singkat untuk desa, kita update data pertama
        // Jika belum ada data sama sekali di database, buat id 1
        $fakta = FaktaSingkat::first();

        if (!$fakta) {
            $fakta = new FaktaSingkat();
        }

        $fakta->luas_lahan_baku = $request->luas_lahan_baku;
        $fakta->kelompok_tani = $request->kelompok_tani;
        $fakta->produksi_padi = $request->produksi_padi;
        $fakta->save();

        return redirect()->back()->with('success', 'Fakta Singkat berhasil diperbarui!');
    }

    public function destroy(Potensi $potensi)
    {
        $potensi->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data potensi berhasil dihapus.');
    }
}