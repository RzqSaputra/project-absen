<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =[
            [
                'email' => 'sdi@gmail.com',
                'password' => bcrypt('123'),
                'name' => 'Sabang Digital Indonesia',
                'role' => 'Admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // this array $consultation will be insert to table 'consultation'
        User::insert($user);
    }
}
