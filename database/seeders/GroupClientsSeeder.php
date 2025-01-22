<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GroupClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_clients')->insert(['name' => '1 Farmacias']);
        DB::table('group_clients')->insert(['name' => '2 Droguerías']);
        DB::table('group_clients')->insert(['name' => '4 Salud Publica']);
        DB::table('group_clients')->insert(['name' => '8 Mayoristas']);
        DB::table('group_clients')->insert(['name' => '9 Supermercados']);
        DB::table('group_clients')->insert(['name' => '12 Varios']);
        DB::table('group_clients')->insert(['name' => '14 Distribuidoras']);
        DB::table('group_clients')->insert(['name' => '21 Privado']);
    }
}
