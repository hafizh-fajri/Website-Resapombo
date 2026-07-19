<?php

namespace App\Http\Controllers;

use App\Models\FaktaSingkat;

class PotensiDesaController extends Controller
{
    public function index()
    {
        $fakta = FaktaSingkat::first();

        return view('pages.potensi', compact('fakta'));
    }
}