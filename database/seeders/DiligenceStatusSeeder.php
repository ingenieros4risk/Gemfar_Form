<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiligenceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diligence_statuses')->insert([
            'name' => 'Pendiente'
        ]);

        DB::table('diligence_statuses')->insert([
            'name' => 'Asignada'
        ]);

        DB::table('diligence_statuses')->insert([
            'name' => 'En trámite'
        ]);

        DB::table('diligence_statuses')->insert([
            'name' => 'Rechazada'
        ]);

        DB::table('diligence_statuses')->insert([
            'name' => 'Reasignada'
        ]);

        DB::table('diligence_statuses')->insert([
            'name' => 'Seguimiento'
        ]);

        DB::table('diligence_statuses')->insert([
            'name' => 'Finalizada'
        ]);

        DB::table('diligence_statuses')->insert([
            'name' => 'Interrumpida'
        ]);
    }
}
