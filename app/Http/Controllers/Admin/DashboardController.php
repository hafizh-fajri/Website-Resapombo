<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformasiDesa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $informasi = InformasiDesa::first();

        if (!$informasi) {
            $informasi = InformasiDesa::create([
                'jumlah_penduduk' => 0,
                'luas_wilayah' => 0,
                'jumlah_dusun' => 0,
                'jumlah_rt' => 0,
                'jumlah_rw' => 0,
            ]);
        }

        return view('admin.dashboard', compact('informasi'));
    }

    public function updateInformasi(Request $request)
    {
        $validated = $request->validate([
            'jumlah_penduduk' => 'required|integer|min:0',
            'luas_wilayah' => 'required|numeric|min:0',
            'jumlah_dusun' => 'required|integer|min:0',
            'jumlah_rt' => 'required|integer|min:0',
            'jumlah_rw' => 'required|integer|min:0',
        ]);

        $informasi = InformasiDesa::first();
        $informasi->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Informasi desa berhasil diperbarui.');
    }
}