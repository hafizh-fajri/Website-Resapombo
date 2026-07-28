<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformasiDesa;
use App\Models\FaktaSingkat;
use App\Models\Visi;
use App\Models\Misi;
use App\Models\Dokumen;
use App\Models\KepalaDesa;
use App\Models\Potensi;
use App\Models\KontakBumdes;
use App\Models\Perangkat;
use App\Models\Jabatan;
use App\Models\Bumdes;
use App\Models\KategoriBerita;
use App\Models\Artikel;
use App\Models\KategoriLayanan;
use App\Models\Layanan;
use App\Models\KontakLayanan;
use App\Models\JamOperasional;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {

        $hartikels = Artikel::latest('tanggal')->take(3)->get();
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

        $visi = Visi::first();
        if (!$visi) {
            $visi = Visi::create(['isi' => '']);
        }

        $misi = Misi::latest()->get();
        $dokumen = Dokumen::latest()->get();
        $kepalaDesa = KepalaDesa::oldest()->get();
        $potensi = Potensi::latest()->get();
        $potensi = Potensi::all();
        $fakta = FaktaSingkat::first(); // Ambil data fakta singkat
        $KontakBumdes = KontakBumdes::first(); // Ambil data kontak bumdes
        $perangkat = Perangkat::all(); // Ambil data perangkat
        $jabatan = Jabatan::all();
        $bumdes = Bumdes::all();
        $kategoriBerita = KategoriBerita::orderBy('nama')->get();
        $artikel = Artikel::with('kategori')->latest('tanggal')->get();
        $kategori = KategoriLayanan::orderBy('nama')->get();
        $layanan = Layanan::with('kategori')->latest()->get();

        $kontak = KontakLayanan::first();
        if (!$kontak) {
            $kontak = KontakLayanan::create(['no_wa' => '', 'email' => '']);
        }

        $jamOperasional = JamOperasional::orderBy('id')->get();



        return view('pages.admin.dashboard', compact('visi', 'misi', 'dokumen', 'kepalaDesa', 'potensi', 'fakta', 'KontakBumdes', 'perangkat', 'jabatan', 'bumdes', 'kategoriBerita', 'artikel', 'kategori', 'layanan', 'kontak', 'jamOperasional', 'hartikels', 'informasi'));
    }
    public function updateInformasi(Request $request)
    {
        $validated = $request->validate([
            'jumlah_penduduk' => 'required|integer|min:0',
            'luas_wilayah' => 'required|numeric|min:0',
            'jumlah_dusun' => 'required|integer|min:0',
            'jumlah_rt' => 'required|integer|min:0',
            'jumlah_rw' => 'required|integer|min:0',
        ]);

        InformasiDesa::first()->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Informasi desa berhasil diperbarui.');
    }

    public function updateFakta(Request $request)
    {
        $validated = $request->validate([
            'luas_lahan_baku' => 'required|numeric|min:0',
            'kelompok_tani' => 'required|integer|min:0',
            'produksi_padi' => 'required|numeric|min:0',
        ]);

        FaktaSingkat::first()->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Fakta singkat berhasil diperbarui.');
    }
}