<?php

namespace App\Http\Controllers;

use App\Models\Potensi;

class PotensiController extends Controller
{
    public function index()
    {
        $potensi = Potensi::latest()->get();

        return view('pages.potensi1', compact('potensi'));
    }
}