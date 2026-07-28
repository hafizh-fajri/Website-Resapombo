<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    
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
}
