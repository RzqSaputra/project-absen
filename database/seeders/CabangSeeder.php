<?php

namespace Database\Seeders;
use App\Models\Cabang;

use Illuminate\Database\Seeder;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

    }
}
