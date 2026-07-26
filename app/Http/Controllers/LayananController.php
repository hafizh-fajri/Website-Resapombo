<?php

namespace App\Http\Controllers;

use App\Models\KategoriLayanan;
use App\Models\KontakLayanan;
use App\Models\JamOperasional;

class LayananController extends Controller
{
    public function index()
    {
        $kategori = KategoriLayanan::with('layanan')->orderBy('nama')->get();
        $kontak = KontakLayanan::first();
        $jamOperasional = JamOperasional::orderBy('id')->get();

        return view('pages.layanan', compact('kategori', 'kontak', 'jamOperasional'));
    }
}