<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\InformasiDesa;
use App\Models\Visi;
use App\Models\Misi;
use App\Models\Dokumen;
use App\Models\KepalaDesa;

class PageController extends Controller
{
    public function home()
    {
        $artikel = Artikel::latest('tanggal')->take(3)->get();
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
        $informasi = InformasiDesa::first();
        $visi = Visi::first();
        $misi = Misi::latest()->get();
        $dokumen = Dokumen::latest()->get();
        $kepalaDesa = KepalaDesa::oldest()->get();
        return view('pages.profildesa');
    }

    public function struktur()
    {
        $perangkat = json_decode(
            file_get_contents(resource_path('data/perangkat.json')),
            true
        );

        return view('pages.struktur', compact('perangkat'));
    }

    public function pemerintahan()
    {
        return view('pages.pemerintahan');
    }

       public function layanan()
    {
        $layanan = json_decode(
            file_get_contents(resource_path('data/layanan.json')),
            true
        );

        return view('pages.profil', compact('informasi', 'visi', 'misi', 'dokumen', 'kepalaDesa'));
    }

    public function bumdes()
    {
        

        return view('pages.bumdes');
    }

    public function potensi()
    {
        return view('pages.potensi');
    }

    public function berita()
    {
        return view('pages.berita');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function adminlogin()
    {
        return view('pages.admin.login');
    }

    public function admindashboard()
    {
        return view('pages.admin.dashboard');
    }

    public function kekayaan()
    {
        return view('pages.kekayaan');
    }
}