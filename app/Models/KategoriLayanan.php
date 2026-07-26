<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriLayanan extends Model
{
    protected $table = 'kategori_layanans';

    protected $fillable = ['nama'];

    public function layanan()
    {
        return $this->hasMany(Layanan::class);
    }
}