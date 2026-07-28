<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\KategoriLayanan;
use App\Models\KontakLayanan;
use App\Models\JamOperasional;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $kategori = KategoriLayanan::orderBy('nama')->get();
        $layanan = Layanan::with('kategori')->latest()->get();

        $kontak = KontakLayanan::first();
        if (!$kontak) {
            $kontak = KontakLayanan::create(['no_wa' => '', 'email' => '']);
        }

        $jamOperasional = JamOperasional::orderBy('id')->get();

        return view('admin.dashboard', compact('kategori', 'layanan', 'kontak', 'jamOperasional'));
    }

    // ==== KATEGORI ====
    public function storeKategori(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        KategoriLayanan::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroyKategori(KategoriLayanan $kategori)
    {
        $kategori->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Kategori berhasil dihapus.');
    }

    // ==== LAYANAN ====
    public function createLayanan()
    {
        $kategori = KategoriLayanan::orderBy('nama')->get();
        return view('admin.dashboard', compact('kategori'));
    }

    public function storeLayanan(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'kategori_layanan_id' => 'nullable|exists:kategori_layanans,id',
        'langkah' => 'nullable|string',
    ]);

    if ($request->hasFile('file_pdf')) {
        $file = $request->file('file_pdf');
        
        // Membuat nama file yang unik agar tidak tertimpa jika ada file bernama sama
        $fileName = time() . '_' . $file->getClientOriginalName();
        
        // Memindahkan file langsung ke folder public/uploads/documents
        $file->move(public_path('uploads/documents'), $fileName);
        
        // Menyimpan path relatif ke dalam database agar mudah dipanggil di Blade
        $validated['file_pdf'] = 'uploads/documents/' . $fileName;
    }

    Layanan::create($validated);

    return redirect()->route('admin.dashboard')->with('success', 'Layanan berhasil ditambahkan.');
}

    

    public function updateLayanan(Request $request, Layanan $layanan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_layanan_id' => 'nullable|exists:kategori_layanans,id',
            'langkah' => 'nullable|string',
        ]);

        if ($request->hasFile('file_pdf')) {
            $file = $request->file('file_pdf');
            
            // Membuat nama file yang unik agar tidak tertimpa jika ada file bernama sama
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // Memindahkan file langsung ke folder public/uploads/documents
            $file->move(public_path('uploads/documents'), $fileName);
            
            // Menyimpan path relatif ke dalam database agar mudah dipanggil di Blade
            $validated['file_pdf'] = 'uploads/documents/' . $fileName;
        }

        $layanan->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroyLayanan(Layanan $layanan)
    {
        $layanan->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Layanan berhasil dihapus.');
    }

    // ==== KONTAK ====
    public function updateKontak(Request $request)
    {
        $validated = $request->validate([
            'no_wa' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        KontakLayanan::first()->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Kontak berhasil diperbarui.');
    }

    // ==== JAM OPERASIONAL ====
    public function storeJam(Request $request)
    {
        $validated = $request->validate([
            'hari' => 'required|string|max:255',
            'jam' => 'required|string|max:255',
        ]);

        JamOperasional::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Jam operasional berhasil ditambahkan.');
    }

    public function destroyJam(JamOperasional $jam)
    {
        $jam->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Jam operasional berhasil dihapus.');
    }
}