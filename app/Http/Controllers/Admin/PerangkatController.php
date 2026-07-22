<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perangkat;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class PerangkatController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatans,id',
            'no_wa' => 'nullable|string|max:20',
            'kata_sambutan' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('perangkat', 'public');
        }

        Perangkat::create($validated);

        return redirect()->route('admin.pemerintahan.index')->with('success', 'Data perangkat berhasil ditambahkan.');
    }

    public function edit(Perangkat $perangkat)
    {
        $jabatan = Jabatan::orderBy('tingkat')->get();
        return view('admin.perangkat.edit', compact('perangkat', 'jabatan'));
    }

    public function update(Request $request, Perangkat $perangkat)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatans,id',
            'no_wa' => 'nullable|string|max:20',
            'kata_sambutan' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('perangkat', 'public');
        }

        $perangkat->update($validated);

        return redirect()->route('admin.pemerintahan.index')->with('success', 'Data perangkat berhasil diperbarui.');
    }

    public function destroy(Perangkat $perangkat)
    {
        $perangkat->delete();

        return redirect()->route('admin.pemerintahan.index')->with('success', 'Data perangkat berhasil dihapus.');
    }
}