<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sectors')->insert(['name' => 'ME MEDICAMENTOS']);
        DB::table('sectors')->insert(['name' => 'CE TRANSFERENCIA']);
        DB::table('sectors')->insert(['name' => 'OU OTROS']);

    }
}
