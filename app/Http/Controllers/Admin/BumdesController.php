<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bumdes;
use App\Models\KontakBumdes;
use Illuminate\Http\Request;

class BumdesController extends Controller
{
    

    public function create()
    {
        return view('admin.bumdes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:Unit Usaha,Mitra Lokal',
            'deskripsi' => 'required|string',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            
            // Membuat nama file yang unik agar tidak tertimpa jika ada nama file yang sama
            $nama_file = time() . '_' . $file->getClientOriginalName();
            
            // Menentukan lokasi folder tujuan upload di dalam folder public
            $tujuan_upload = public_path('uploads/images');
            
            // Memindahkan file gambar ke folder tujuan
            $file->move($tujuan_upload, $nama_file);
            
            // Menyimpan rute/path file ke dalam array untuk disimpan ke database kolom 'gambar'
            $validated['gambar'] = 'uploads/images/' . $nama_file;
        }

        Bumdes::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Data BUMDes berhasil ditambahkan.');
    }

    public function edit(Bumdes $bumde)
    {
        return view('admin.dashboard', ['bumdes' => $bumde]);
    }

    public function update(Request $request, Bumdes $bumde)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:Unit Usaha,Mitra Lokal',
            'deskripsi' => 'required|string',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            
            // Membuat nama file yang unik agar tidak tertimpa jika ada nama file yang sama
            $nama_file = time() . '_' . $file->getClientOriginalName();
            
            // Menentukan lokasi folder tujuan upload di dalam folder public
            $tujuan_upload = public_path('uploads/images');
            
            // Memindahkan file gambar ke folder tujuan
            $file->move($tujuan_upload, $nama_file);
            
            // Menyimpan rute/path file ke dalam array untuk disimpan ke database kolom 'foto'
            $validated['gambar'] = 'uploads/images/' . $nama_file;
        }

        $bumde->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Data BUMDes berhasil diperbarui.');
    }

    public function destroy(Bumdes $bumde)
    {
        $bumde->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data BUMDes berhasil dihapus.');
    }

    public function kbupdate(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'kontak_bumdes' => 'required|string|max:255',
            // Ubah menjadi nullable agar pengguna bisa update nomor WA saja tanpa harus upload ulang PDF
            'file' => 'nullable|mimes:pdf|max:5120', 
        ]);

        // 2. Ambil data pertama (asumsi hanya ada 1 baris pengaturan untuk Kontak BUMDes)
        // Jika belum ada data sama sekali, buat objek baru
        $kbumdes = KontakBumdes::first();
        if (!$kbumdes) {
            $kbumdes = new KontakBumdes();
        }

        // 3. Update nomor WA
        $kbumdes->no_wa = $request->kontak_bumdes;

        // 4. Proses jika ada file baru yang diunggah
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            $nama_file = time() . '_' . $file->getClientOriginalName();
            $tujuan_upload = public_path('uploads/documents');
            
            // Cek dan hapus file lama dari folder agar server tidak kepenuhan sampah (Opsional tapi sangat disarankan)
            if ($kbumdes->file_profil && File::exists(public_path($kbumdes->file_profil))) {
                File::delete(public_path($kbumdes->file_profil));
            }
            
            // Pindahkan file baru ke folder tujuan
            $file->move($tujuan_upload, $nama_file);
            
            // Update URL/Path ke database
            $kbumdes->file_profil = 'uploads/documents/' . $nama_file;
        }

        // 5. Simpan semua perubahan ke database
        $kbumdes->save();

        // 6. Perbaiki pesan suksesnya
        return redirect()->back()->with('success', 'Kontak BUMDes berhasil diperbarui!');
    }

    public function updateKontak(Request $request)
    {
        $validated = $request->validate([
            'no_wa' => 'nullable|string|max:20',
            'file_profil' => 'nullable|mimes:pdf|max:5120',
        ]);

        if ($request->hasFile('file_profil')) {
            $validated['file_profil'] = $request->file('file_profil')->store('bumdes-profil', 'public');
        }

        KontakBumdes::first()->update($validated);

        return redirect()->route('admin.bumdes.index')->with('success', 'Kontak BUMDes berhasil diperbarui.');
    }
}