<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Perangkat;

class Jabatan extends Model
{
    protected $fillable = ['nama', 'tingkat'];

    public function perangkat()
    {
        // Sesuaikan 'jabatan_id' jika nama kolom Anda berbeda
        return $this->hasMany(Perangkat::class, 'jabatan_id'); 
    }

    
}