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
        // create data here
        $cabang =[
            [
                'nama_cabang' => 'Pontianak',
                'Alamat' => 'Jl. M. Sohor',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_cabang' => 'Tanggerang',
                'Alamat' => 'Jl. Budi Utomo',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_cabang' => 'Kubu Raya',
                'Alamat' => 'Jl. Adisucipto',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
           
        ];

        // this array $consultation will be insert to table 'consultation'
        Cabang::insert($cabang);
    }
}
