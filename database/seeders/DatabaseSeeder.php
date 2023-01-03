<<<<<<< HEAD
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CabangSeeder::class,
            JabatanSeeder::class,
        ]);
    }
}
=======
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
    $this->call([
        CabangSeeder::class,
        JabatanSeeder::class,
        StatusSeeder::class,
        UserSeeder::class,
    ]); 
    }
}
>>>>>>> 9403d601fce832cd25edddb39f8368af4a4e084a
