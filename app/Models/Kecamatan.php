<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Anggota;

class Kecamatan extends Model
{
    protected $fillable = [
        'nama',
    ];

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }
}
