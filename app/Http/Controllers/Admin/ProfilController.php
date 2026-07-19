<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visi;
use App\Models\Misi;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $visi = Visi::first();
        if (!$visi) {
            $visi = Visi::create(['isi' => '']);
        }

        $misi = Misi::latest()->get();

        return view('admin.profil.index', compact('visi', 'misi'));
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