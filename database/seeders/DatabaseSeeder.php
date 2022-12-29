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
        \App\Models\User::factory(3)->create();

        //seeder user
<<<<<<< HEAD
        // User::create([
        //     'username' => 'Sabang Digital Indonesia',
        //     'email' => 'sdi@gmail.com',
        //     'password' => bcrypt('sdi123')
=======
        User::create([
            'email' => 'sdi@gmail.com',
            'password' => bcrypt('sdi123'),
>>>>>>> bdf6a6d21a73b64905eed56908b8e4e3184dc53a

        // ]);

        $this->call(CabangSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(StatusSeeder::class);


        
    }
}
