<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class OficinasVentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oficinas_ventas')->insert(['name' => '8000 INTERCO EXPORTACIONES']);
        DB::table('oficinas_ventas')->insert(['name' => '8100 INTERCO LOCAL']);
        DB::table('oficinas_ventas')->insert(['name' => '8200 EXPORT TERCEROS']);
        DB::table('oficinas_ventas')->insert(['name' => '8300 ACTIVOS/SERVICIOS']);
        DB::table('oficinas_ventas')->insert(['name' => 'GNCI GCIA COL INSTIT']);
        DB::table('oficinas_ventas')->insert(['name' => 'GNCR GCIA COL RETAIL']);
        DB::table('oficinas_ventas')->insert(['name' => 'GNEI GCIA EC INSTIT']);
        DB::table('oficinas_ventas')->insert(['name' => 'GNER GCIA EC RETAIL']);
        DB::table('oficinas_ventas')->insert(['name' => 'GNPI GCIA PE INSTIT']);
        DB::table('oficinas_ventas')->insert(['name' => 'GNPR GCIA PE RETAIL']);
    }
}
