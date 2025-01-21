<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestRiskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_risk_statuses')->insert(['name' => 'Para Homologación']);
        DB::table('request_risk_statuses')->insert(['name' => 'Debida Diligencia Ampliada']);
    }
}
