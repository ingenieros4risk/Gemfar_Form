<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanofiRequestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanofi_request_statuses')->insert(['name' => 'En Proceso','class' =>'badge-warning']);
	    DB::table('sanofi_request_statuses')->insert(['name' => 'Cancelado','class' =>'badge-danger']);
	    DB::table('sanofi_request_statuses')->insert(['name' => 'Seguimiento','class' =>'badge-secondary']);
	    DB::table('sanofi_request_statuses')->insert(['name' => 'Diligenciado','class' =>'badge-success']);
	    DB::table('sanofi_request_statuses')->insert(['name' => 'Homologado','class' =>'badge-primary']);
    
    }
}
