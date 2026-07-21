<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontakBumdes extends Model
{
    protected $table = 'kontak_bumdes';

    protected $fillable = ['no_wa', 'file_profil'];
}