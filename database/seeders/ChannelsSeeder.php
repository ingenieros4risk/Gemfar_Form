<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('channels')->insert(['name' => 'GE Retail']);
        DB::table('channels')->insert(['name' => 'LI Institucional']);
        DB::table('channels')->insert(['name' => 'TF Intercompany']);
        DB::table('channels')->insert(['name' => 'TR Maquila']);
        DB::table('channels')->insert(['name' => 'OU Otras Ventas']);
        DB::table('channels')->insert(['name' => 'EX Exportaciones']);
    }
}
