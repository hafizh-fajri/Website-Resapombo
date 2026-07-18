<?php

namespace App\Http\Controllers;

use App\Models\Bumdes;

class BumdesController extends Controller
{
    public function index()
    {
        $bumdes = Bumdes::latest()->get();

        return view('pages.bumdes', compact('bumdes'));
    }
}