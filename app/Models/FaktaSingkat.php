<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaktaSingkat extends Model
{
    protected $table = 'fakta_singkats';

    protected $fillable = ['luas_lahan_baku', 'kelompok_tani', 'produksi_padi'];
}