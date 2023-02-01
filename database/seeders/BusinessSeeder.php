<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::factory(100)->create();
        /* Query Builder
            Pode utilizar essa query builder, ou executar um SQL ou importar um banco caso ele já exista
            DB::table('businesses')->insert([]);
        */
    }
}
