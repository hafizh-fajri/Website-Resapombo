<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bumdes;
use App\Models\KontakBumdes;
use Illuminate\Http\Request;

class BumdesController extends Controller
{
    public function index()
    {
        $bumdes = Bumdes::latest()->get();

        $kontak = KontakBumdes::first();
        if (!$kontak) {
            $kontak = KontakBumdes::create(['no_wa' => '', 'file_profil' => null]);
        }

        return view('admin.bumdes.index', compact('bumdes', 'kontak'));
    }

    public function create()
    {
        return view('admin.bumdes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:Unit Usaha,Mitra Lokal',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('bumdes', 'public');
        }

        Bumdes::create($validated);

        return redirect()->route('admin.bumdes.index')->with('success', 'Data BUMDes berhasil ditambahkan.');
    }

    public function edit(Bumdes $bumde)
    {
        return view('admin.bumdes.edit', ['bumdes' => $bumde]);
    }

    public function update(Request $request, Bumdes $bumde)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:Unit Usaha,Mitra Lokal',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('bumdes', 'public');
        }

        $bumde->update($validated);

        return redirect()->route('admin.bumdes.index')->with('success', 'Data BUMDes berhasil diperbarui.');
    }

    public function destroy(Bumdes $bumde)
    {
        $bumde->delete();

        return redirect()->route('admin.bumdes.index')->with('success', 'Data BUMDes berhasil dihapus.');
    }

    public function updateKontak(Request $request)
    {
        $validated = $request->validate([
            'no_wa' => 'nullable|string|max:20',
            'file_profil' => 'nullable|mimes:pdf|max:5120',
        ]);

        if ($request->hasFile('file_profil')) {
            $validated['file_profil'] = $request->file('file_profil')->store('bumdes-profil', 'public');
        }

        KontakBumdes::first()->update($validated);

        return redirect()->route('admin.bumdes.index')->with('success', 'Kontak BUMDes berhasil diperbarui.');
    }
}