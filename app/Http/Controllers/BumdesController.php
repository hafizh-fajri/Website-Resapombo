<?php

namespace App\Http\Controllers;

use App\Models\Bumdes;
use App\Models\KontakBumdes;
use Illuminate\Http\Request;

class BumdesController extends Controller
{

    public function index(Request $request)
    {
        // Menangkap inputan 'search' dari URL
        $search = $request->input('search');

        // Memulai query builder dari Model Bumdes
        $query = Bumdes::query();

        // Jika ada pencarian, tambahkan filter WHERE LIKE
        if ($search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
        }

        // Ambil data hasil query pencarian
        $bumdes = $query->get();
        
        // Ambil kontak bumdes
        $kontak = KontakBumdes::first();

        // Mengambil jumlah data spesifik berdasarkan isi kolom 'kategori'
        // Pastikan penulisan string sesuai dengan value di database
        $totalUnitUsaha = Bumdes::where('kategori', 'Unit Usaha')->count();
        $totalMitra     = Bumdes::where('kategori', 'Mitra Lokal')->count();

        return view('pages.bumdes', compact('bumdes', 'totalUnitUsaha', 'totalMitra', 'kontak'));
    }
}

    
