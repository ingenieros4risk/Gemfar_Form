<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupportAnsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('support_ans')->insert(['name' => 'Alta', 'description' => 'Falla bloqueante del sistema (El sistema no se puede utilizar).', 'minutes'=>30]);
        DB::table('support_ans')->insert(['name' => 'Media', 'description' => 'Falla que afecta parcialmente la operatividad del sistema pero no es bloqueante.', 'minutes'=>240]);
        DB::table('support_ans')->insert(['name' => 'Baja', 'description' => 'No afecta operatividad o desempeño del sistema', 'minutes'=>720]);
    }
}
