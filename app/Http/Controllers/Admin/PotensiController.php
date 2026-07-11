<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Potensi;
use Illuminate\Http\Request;

class PotensiController extends Controller
{
    public function index()
    {
        $potensi = Potensi::latest()->get();
        return view('admin.potensi.index', compact('potensi'));
    }

    public function create()
    {
        return view('admin.potensi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('potensi', 'public');
            $validated['gambar'] = $path;
        }

        Potensi::create($validated);

        return redirect()->route('admin.potensi.index')->with('success', 'Data potensi berhasil ditambahkan.');
    }

    public function edit(Potensi $potensi)
    {
        return view('admin.potensi.edit', compact('potensi'));
    }

    public function update(Request $request, Potensi $potensi)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('potensi', 'public');
            $validated['gambar'] = $path;
        }

        $potensi->update($validated);

        return redirect()->route('admin.potensi.index')->with('success', 'Data potensi berhasil diperbarui.');
    }

    public function destroy(Potensi $potensi)
    {
        $potensi->delete();

        return redirect()->route('admin.potensi.index')->with('success', 'Data potensi berhasil dihapus.');
    }
}