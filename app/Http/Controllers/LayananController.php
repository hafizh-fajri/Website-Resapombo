<?php

namespace App\Http\Controllers;

use App\Models\KategoriLayanan;
use App\Models\KontakLayanan;
use App\Models\JamOperasional;
use Illuminate\Http\Request; // Pastikan Request di-import

class LayananController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search'); // Menangkap input pencarian

        // Memuat kategori beserta layanan-nya
        $kategori = KategoriLayanan::with(['layanan' => function($query) use ($search) {
            // Jika ada pencarian, filter data layanan berdasarkan nama (pertanyaan) atau langkah (jawaban)
            if ($search) {
                $query->where('nama', 'like', "%{$search}%")
                      ->orWhere('langkah', 'like', "%{$search}%");
            }
        }])->orderBy('nama')->get();

        $kontak = KontakLayanan::first();
        $jamOperasional = JamOperasional::orderBy('id')->get();

        return view('pages.FAQ', compact('kategori', 'kontak', 'jamOperasional', 'search'));
    }
}