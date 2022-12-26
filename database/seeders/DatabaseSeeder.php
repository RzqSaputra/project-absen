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
        // \App\Models\User::factory(10)->create();

        //seeder user
        User::create([
            'username' => 'Sabang Digital Indonesia',
            'email' => 'sdi@gmail.com',
            'password' => bcrypt('sdi123'),

        ]);

        $this->call(CabangSeeder::class);
        $this->call(JabatanSeeder::class);

        
    }
}
