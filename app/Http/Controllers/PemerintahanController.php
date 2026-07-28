<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Perangkat;

class PemerintahanController extends Controller
{
    public function index()
    {
        // 1. Ambil data jabatan dan urutkan berdasarkan tingkat
        $jabatan = Jabatan::orderBy('tingkat', 'asc')->get();

        // 2. Ambil data perangkat dari Model Perangkat, 
        // yang jabatan_id-nya ada di dalam kumpulan ID dari variabel $jabatan di atas
        $perangkat = Perangkat::whereIn('jabatan_id', $jabatan->pluck('id'))
            ->with('jabatan') // Opsional: Eager load data jabatan jika diperlukan di view
            ->get();

        // 3. Kirim kedua variabel ke view
        return view('pages.pemerintahan', compact('jabatan', 'perangkat'));
    }
}