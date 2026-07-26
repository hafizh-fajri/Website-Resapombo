<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Potensi;

class PotensiController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->query('kategori');

        $potensi = Potensi::when($kategori, function ($query) use ($kategori) {
                return $query->where('kategori', $kategori);
            })
            ->latest()
            ->get();

        return view('pages.kekayaan', compact('potensi', 'kategori'));
    }
}