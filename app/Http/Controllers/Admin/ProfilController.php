<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visi;
use App\Models\Misi;
use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\KepalaDesa;

class ProfilController extends Controller
{
    public function index()
    {
        $visi = Visi::first();
        if (!$visi) {
            $visi = Visi::create(['isi' => '']);
        }

        $misi = Misi::latest()->get();
        $dokumen = Dokumen::latest()->get();
        $kepalaDesa = KepalaDesa::oldest()->get();

        return view('admin.dashboard', compact('visi', 'misi', 'dokumen', 'kepalaDesa'));
    }

    public function storeKepalaDesa(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'masa_jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            
            // Membuat nama file yang unik agar tidak tertimpa jika ada nama file yang sama
            $nama_file = time() . '_' . $file->getClientOriginalName();
            
            // Menentukan lokasi folder tujuan upload di dalam folder public
            $tujuan_upload = public_path('uploads/images');
            
            // Memindahkan file gambar ke folder tujuan
            $file->move($tujuan_upload, $nama_file);
            
            // Menyimpan rute/path file ke dalam array untuk disimpan ke database kolom 'foto'
            $validated['foto'] = 'uploads/images/' . $nama_file;
        }

        KepalaDesa::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Data Kepala Desa berhasil ditambahkan.');
    }

    public function destroyKepalaDesa(KepalaDesa $kepalaDesa)
    {
        $kepalaDesa->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data Kepala Desa berhasil dihapus.');
    }

    public function storeDokumen(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:5120',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            // 2. Buat nama file unik agar tidak tertimpa jika ada file dengan nama sama
            $nama_file = time() . '_' . $file->getClientOriginalName();
            
            // 3. Tentukan folder tujuan (langsung ke folder public/uploads/documents)
            $tujuan_upload = public_path('uploads/documents');
            
            // 4. Pindahkan file ke folder tujuan
            $file->move($tujuan_upload, $nama_file);
            
            // 5. Buat URL/Path yang akan disimpan ke database
            // Disarankan menyimpan path relatifnya saja agar aman jika domain berubah
            $path_url = 'uploads/documents/' . $nama_file;
            
            // 6. Simpan data ke database
            Dokumen::create([
                'nama' => $request->nama,
                'file' => $path_url,
            ]);

            return back()->with('success', 'File PDF berhasil diunggah!');
        }

        return back()->with('error', 'Gagal mengunggah file.');
    }

    public function destroyDokumen(Dokumen $dokumen)
    {
        $dokumen->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Dokumen berhasil dihapus.');
    }

    public function lihatPdf($id)
{
    // Cari data dokumen di database
    $dokumen = \App\Models\Dokumen::findOrFail($id);
    
    // Dapatkan lokasi fisik file di komputer/server Anda
    $path = public_path($dokumen->file);

    // Cek apakah file fisik benar-benar ada di folder
    if (!file_exists($path)) {
        abort(404, 'File PDF tidak ditemukan di server.');
    }

    // Paksa browser untuk menampilkannya
    return response()->file($path);
}

    public function updateVisi(Request $request)
    {
        $validated = $request->validate([
            'isi' => 'required|string',
        ]);

        Visi::first()->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Visi berhasil diperbarui.');
    }

    public function storeMisi(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Misi::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Misi berhasil ditambahkan.');
    }

    public function updateMisi(Request $request, Misi $misi)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $misi->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Misi berhasil diperbarui.');
    }

    public function destroyMisi(Misi $misi)
    {
        $misi->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Misi berhasil dihapus.');
    }
}