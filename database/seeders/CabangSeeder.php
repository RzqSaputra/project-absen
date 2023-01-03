<?php

namespace Database\Seeders;

use App\Models\Cabang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
=======

>>>>>>> 9403d601fce832cd25edddb39f8368af4a4e084a

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
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
=======
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
>>>>>>> 9403d601fce832cd25edddb39f8368af4a4e084a
    }
}
