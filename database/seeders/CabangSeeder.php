<?php

namespace Database\Seeders;

use App\Models\Cabang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cabang =[
        [
            'nama_cabang' => 'Pontianak',
            'alamat' => 'Jl. M. Sohor', 
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],
        [
            'nama_cabang' => 'Kubu Raya',
            'alamat' => 'Jl. Adisucipto', 
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],
        [
            'nama_cabang' => 'Tanggerang',
            'alamat' => 'Jl. Budi Utomo', 
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],
    ];

    Cabang::insert($cabang);
    }
}
