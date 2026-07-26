<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\Perangkat;

class PemerintahanController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::orderBy('tingkat')->get();
        $perangkat = Perangkat::with('jabatan')->latest()->get();

        return view('admin.pemerintahan.index', compact('jabatan', 'perangkat'));
    }
}