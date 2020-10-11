<?php

namespace App\Imports;

use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AnggotaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Anggota([
            'nama' => $row['nama'],
            'nia' => $row['nia'],
            'no_hp' => $row['no_hp'],
            'alamat_kantor' => $row['alamat_kantor'],
        ]);
    }
}
