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
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            
            // Membuat nama file yang unik agar tidak tertimpa jika ada nama file yang sama
            $nama_file = time() . '_' . $file->getClientOriginalName();
            
            // Menentukan lokasi folder tujuan upload di dalam folder public
            $tujuan_upload = public_path('uploads/images');
            
            // Memindahkan file gambar ke folder tujuan
            $file->move($tujuan_upload, $nama_file);
            
            // Menyimpan rute/path file ke dalam array untuk disimpan ke database kolom 'foto'
            $validated['foto'] = 'uploads/images/' . $nama_file;
        }

        Perangkat::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Data perangkat berhasil ditambahkan.');
    }

    public function edit(Perangkat $perangkat)
    {
        $jabatan = Jabatan::orderBy('tingkat')->get();
        return view('admin.dashboard', compact('perangkat', 'jabatan'));
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
            $file = $request->file('foto');
            
            // Membuat nama file yang unik agar tidak tertimpa jika ada nama file yang sama
            $nama_file = time() . '_' . $file->getClientOriginalName();
            
            // Menentukan lokasi folder tujuan upload di dalam folder public
            $tujuan_upload = public_path('uploads/images');
            
            // Memindahkan file gambar ke folder tujuan
            $file->move($tujuan_upload, $nama_file);
            
            // Menyimpan rute/path file ke dalam array untuk disimpan ke database kolom 'foto'
            $validated['foto'] = 'uploads/images/' . $nama_file;
        }

        $perangkat->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Data perangkat berhasil diperbarui.');
    }

    public function destroy(Perangkat $perangkat)
    {
        $perangkat->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data perangkat berhasil dihapus.');
    }
}