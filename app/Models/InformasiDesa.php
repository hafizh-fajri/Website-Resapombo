<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformasiDesa extends Model
{
    protected $table = 'informasi_desas';

    protected $fillable = ['jumlah_penduduk', 'luas_wilayah', 'jumlah_dusun', 'jumlah_rt', 'jumlah_rw'];
}