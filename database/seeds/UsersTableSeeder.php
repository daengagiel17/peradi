<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Anggota;
use App\Models\Kecamatan;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Muhammad Agiel Nugraha',
            'email' => 'agielnara17@gmail.com',
            'no_hp' => '6285819910714',
            'photo' => 'img/profile/default.png',
        ]);

        User::create([
            'name' => 'Indra Wahyudi',
            'email' => 'indrawahyudi-@hotmail.com',
            'no_hp' => '6289660600419',
            'photo' => 'img/profile/default.png',
        ]);

        User::create([
            'name' => 'Wahyudi Indra',
            'email' => 'seism.ml@gmail.com',
            'no_hp' => '628966060041',
            'photo' => 'img/profile/default.png',
        ]);

        Kecamatan::create([
            'nama' => 'Blimbing',
        ]);

        Kecamatan::create([
            'nama' => 'Kedungkandang',
        ]);

        Kecamatan::create([
            'nama' => 'Klojen',
        ]);

        Kecamatan::create([
            'nama' => 'Lowokwaru',
        ]);

        Kecamatan::create([
            'nama' => 'Sukun',
        ]);

        // $kecamatans = Kecamatan::all();
        // foreach ($kecamatans as $key => $kecamatan)
        // {
        //     Anggota::create([
        //         'nama' => 'Budi',
        //         'nia' => '12345',
        //         'no_hp' => '0857',
        //         'alamat' => 'Jl. Mangga',
        //         'alamat_kantor' => 'Jl. Manggis',
        //         'kecamatan_id' => $kecamatan->id
        //     ]);
        
        //     Anggota::create([
        //         'nama' => 'Rahmat',
        //         'nia' => '54321',
        //         'no_hp' => '0858',
        //         'alamat' => 'Jl. Bangau',
        //         'alamat_kantor' => 'Jl. Kemiri',
        //         'kecamatan_id' => $kecamatan->id
        //     ]);        
        // }
    }
}
