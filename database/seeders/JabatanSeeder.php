<?php

namespace Database\Seeders;
use App\Models\Jabatan;

use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'namaJabatan' => 'CEO'
        ]);
        Jabatan::create([
            'namaJabatan' => 'Head Office'
        ]);
        Jabatan::create([
            'namaJabatan' => 'Pegawai Tetap'
        ]);
        Jabatan::create([
            'namaJabatan' => 'Pegawai Sementara'
        ]);
    }
}
