<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Potensi;

class PotensiController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->query('kategori');
        $search = $request->query('search');

        $query = Potensi::query();

        // 1. Filter Berdasarkan Kategori (Jika ada dan bukan 'Semua')
        if ($kategori && $kategori !== 'Semua') {
            $query->where('kategori', $kategori);
        }

        // 2. Filter Pencarian per Kata
        if ($search) {
            // Memecah kata berdasarkan spasi
            $words = explode(' ', $search);
            
            $query->where(function ($q) use ($words) {
                foreach ($words as $word) {
                    // Setiap kata harus cocok di judul ATAU deskripsi
                    $q->where(function ($subQ) use ($word) {
                        $subQ->where('nama', 'like', '%' . $word . '%')
                             ->orWhere('deskripsi', 'like', '%' . $word . '%');
                    });
                }
            });
        }

        $potensi = $query->latest()->get();

        return view('pages.kekayaan', compact('potensi', 'kategori', 'search'));
    }
}