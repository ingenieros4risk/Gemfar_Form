<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_plans')->insert(['name' => 'BÁSICO']);//1
        DB::table('client_plans')->insert(['name' => 'COMBO DDA']);//2
        DB::table('client_plans')->insert(['name' => 'COMBO ESPECIAL']);//3
        DB::table('client_plans')->insert(['name' => 'CONSULTORÍA']);//4
        DB::table('client_plans')->insert(['name' => 'DDA']);//5
        DB::table('client_plans')->insert(['name' => 'DIAMOND']);//6
        DB::table('client_plans')->insert(['name' => 'GOLD']);//7
        DB::table('client_plans')->insert(['name' => 'ILIMITADO']);//8
		DB::table('client_plans')->insert(['name' => 'LISTAS UNICAS 5']);//9
		DB::table('client_plans')->insert(['name' => 'ONE DEMAND']);//10
		DB::table('client_plans')->insert(['name' => 'PLAN ESPECIAL']);//11
		DB::table('client_plans')->insert(['name' => 'PLATINO']);//12
		DB::table('client_plans')->insert(['name' => 'PLUS']);//13
		DB::table('client_plans')->insert(['name' => 'POR CONSUMO']);//14
		DB::table('client_plans')->insert(['name' => 'SILVER']);//15
		DB::table('client_plans')->insert(['name' => 'OTRO']);//16
        DB::table('client_plans')->insert(['name' => 'NO INDICA']);//17
    }
}
