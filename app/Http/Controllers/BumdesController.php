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

        // Ambil data hasil query
        $bumdes = $query->get();
        $kontak = KontakBumdes::first();

        // Data tambahan untuk hero section (Sesuaikan dengan logic Anda)
        $totalUnitUsaha = Bumdes::count();
        $totalMitra = 50; // Contoh angka statis atau bisa pakai count() dari model Mitra

        return view('pages.bumdes', compact('bumdes', 'totalUnitUsaha', 'totalMitra', 'kontak'));
    }
}

    
