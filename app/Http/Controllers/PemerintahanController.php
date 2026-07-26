<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;

class PemerintahanController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::with('perangkat')->orderBy('tingkat')->get();

        return view('pages.pemerintahan', compact('jabatan'));
    }
}