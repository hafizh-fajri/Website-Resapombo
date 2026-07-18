<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\InformasiDesa;

class PageController extends Controller
{
    public function home()
    {
        $artikel = Artikel::latest()->take(3)->get();
        $informasi = InformasiDesa::first();

    // Kalau belum ada data sama sekali, buat default dulu biar nggak error di view
        if (!$informasi) {
            $informasi = InformasiDesa::create([
                'jumlah_penduduk' => 0,
                'luas_wilayah' => 0,
                'jumlah_dusun' => 0,
                'jumlah_rt' => 0,
                'jumlah_rw' => 0,
            ]);
        }

        return view('pages.home', compact('artikel', 'informasi'));
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