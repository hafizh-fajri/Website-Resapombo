<?php

namespace App\Http\Controllers;

use App\Models\Bumdes;
use App\Models\KontakBumdes;

class BumdesController extends Controller
{
    public function index()
    {
        $bumdes = Bumdes::latest()->get();
        $totalUnitUsaha = Bumdes::where('kategori', 'Unit Usaha')->count();
        $totalMitra = Bumdes::where('kategori', 'Mitra Lokal')->count();

        $kontak = KontakBumdes::first();

        return view('pages.bumdes', compact('bumdes', 'totalUnitUsaha', 'totalMitra', 'kontak'));
    }
}