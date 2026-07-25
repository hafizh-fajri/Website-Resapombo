<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.landingpage');
    }

    public function profil()
    {
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

        return view('pages.layanan', compact('layanan'));
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