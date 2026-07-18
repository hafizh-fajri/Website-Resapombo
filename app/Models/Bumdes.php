<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bumdes extends Model
{
    protected $table = 'bumdes'; // eksplisit, karena auto-pluralize bisa aneh untuk kata ini

    protected $fillable = ['nama', 'deskripsi', 'gambar'];
}