<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cabang;
use App\Models\Jabatan;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(3)->create();

        //seeder user
        // User::create([
        //     'username' => 'Sabang Digital Indonesia',
        //     'email' => 'sdi@gmail.com',
        //     'password' => bcrypt('sdi123')

        // ]);

        //seeder Cabang
        Cabang::create([
            'namaCabang' => 'Pontianak',
            'alamat' => 'Jl. M.Sohor'
        ]);
        Cabang::create([
            'namaCabang' => 'Jakarta',
            'alamat' => 'Jl. Budi Utomo'
        ]);
        Cabang::create([
            'namaCabang' => 'Tangerang',
            'alamat' => 'Jl. Jahahaha'
        ]);

        //seeder Jabatan
        Jabatan::create([
            'namaJabatan' => 'CEO'
        ]);
        Jabatan::create([
            'namaJabatan' => 'Head Office'
        ]);
        Jabatan::create([
            'namaJabatan' => 'Karyawan Tetap'
        ]);
        Jabatan::create([
            'namaJabatan' => 'Karyawan Magang'
        ]);

        
    }
}
