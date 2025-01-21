<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusReportSeeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('status_reports')->insert(['name' => 'Pendiente']);
        DB::table('status_reports')->insert(['name' => 'Finalizado']);
    }
}
