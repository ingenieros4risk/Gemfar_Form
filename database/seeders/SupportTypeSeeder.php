<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('support_types')->insert(['name' => 'Técnico']);
        DB::table('support_types')->insert(['name' => 'Funcional']);
        DB::table('support_types')->insert(['name' => 'Tecnológico']);
        DB::table('support_types')->insert(['name' => 'Administrativo']);
        DB::table('support_types')->insert(['name' => 'Otro']);
    }
}
