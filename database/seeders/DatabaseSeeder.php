<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            UserSeeder::class,
            BusinessSeeder::class
        ]);
        //A ordem das seeds importam, então se B depende que A exista antes, coloque A antes
    }
}
