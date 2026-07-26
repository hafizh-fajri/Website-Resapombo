<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visi;
use App\Models\Misi;
use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\KepalaDesa;

class ProfilController extends Controller
{
    public function index()
    {
        $visi = Visi::first();
        if (!$visi) {
            $visi = Visi::create(['isi' => '']);
        }

        $misi = Misi::latest()->get();
        $dokumen = Dokumen::latest()->get();
        $kepalaDesa = KepalaDesa::oldest()->get();

        return view('admin.profil.index', compact('visi', 'misi', 'dokumen', 'kepalaDesa'));
    }

    public function storeKepalaDesa(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'masa_jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('kepala-desa', 'public');
        }

        KepalaDesa::create($validated);

        return redirect()->route('admin.profil.index')->with('success', 'Data Kepala Desa berhasil ditambahkan.');
    }

    public function destroyKepalaDesa(KepalaDesa $kepalaDesa)
    {
        $kepalaDesa->delete();

        return redirect()->route('admin.profil.index')->with('success', 'Data Kepala Desa berhasil dihapus.');
    }

    public function storeDokumen(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:5120',
        ]);

        $validated['file'] = $request->file('file')->store('dokumen', 'public');

        Dokumen::create($validated);

        return redirect()->route('admin.profil.index')->with('success', 'Dokumen berhasil ditambahkan.');
    }

    public function destroyDokumen(Dokumen $dokumen)
    {
        $dokumen->delete();

        return redirect()->route('admin.profil.index')->with('success', 'Dokumen berhasil dihapus.');
    }

    public function updateVisi(Request $request)
    {
        $validated = $request->validate([
            'isi' => 'required|string',
        ]);

        Visi::first()->update($validated);

        return redirect()->route('admin.profil.index')->with('success', 'Visi berhasil diperbarui.');
    }

    public function storeMisi(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Misi::create($validated);

        return redirect()->route('admin.profil.index')->with('success', 'Misi berhasil ditambahkan.');
    }

    public function updateMisi(Request $request, Misi $misi)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $misi->update($validated);

        return redirect()->route('admin.profil.index')->with('success', 'Misi berhasil diperbarui.');
    }

    public function destroyMisi(Misi $misi)
    {
        $misi->delete();

        return redirect()->route('admin.profil.index')->with('success', 'Misi berhasil dihapus.');
    }
}