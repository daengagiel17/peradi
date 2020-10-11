<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kecamatan;

class Anggota extends Model
{
    protected $fillable = [
        'nama', 'no_hp', 'nia', 'alamat', 'alamat_kantor', 'kecamatan_id', 'photo', 'status', 'email'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
