<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


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
            'email' => 'sdi@gmail.com',
            'password' => bcrypt('sdi123'),

        ]);

        $this->call(CabangSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(StatusSeeder::class);


        
    }
}
