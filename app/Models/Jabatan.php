<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable = ['nama', 'tingkat'];

    public function perangkat()
    {
        return $this->hasMany(Perangkat::class);
    }
}