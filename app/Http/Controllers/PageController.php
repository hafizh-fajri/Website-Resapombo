<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Galeri;

class PageController extends Controller
{
    public function home()
    {
        $artikel = Artikel::latest()->take(3)->get();
        $galeri = Galeri::latest()->take(6)->get();

        return view('pages.home', compact('artikel', 'galeri'));
    }

    public function profil()
    {
        return view('pages.profil');
    }

    public function struktur()
    {
        $perangkat = json_decode(
            file_get_contents(resource_path('data/perangkat.json')),
            true
        );

        return view('pages.struktur', compact('perangkat'));
    }

    public function layanan()
    {
        $layanan = json_decode(
            file_get_contents(resource_path('data/layanan.json')),
            true
        );

        return view('pages.layanan', compact('layanan'));
    }
}