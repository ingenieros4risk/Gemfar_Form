<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenfarClientFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genfar_client_forms', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->unsigned()->nullable();
            $table->string('multiple_select_country')->nullable();
            $table->integer('country_homologation')->unsigned()->nullable();// País de donde viene
            $table->string('password',30)->nullable();
            $table->string('qc1',30)->nullable();
            $table->string('qc2',30)->nullable();
            $table->string('qc3',30)->nullable();
            $table->string('qc4',30)->nullable();
            $table->string('qc5',30)->nullable();
            $table->string('qc6',30)->nullable();
            $table->string('qc7',30)->nullable();
            $table->string('qc8',30)->nullable();
            $table->string('qc9',30)->nullable();
            $table->string('qc10',30)->nullable();
            $table->string('qc11',30)->nullable();
            $table->string('qc12',30)->nullable();
            $table->string('qc13',30)->nullable();
            $table->string('qc14',30)->nullable();
            $table->string('qc15',30)->nullable();
            $table->string('qc16',30)->nullable();
            $table->string('qc17',30)->nullable();
            $table->string('qc18',30)->nullable();
            $table->string('qc19',30)->nullable();
            $table->string('qc20',30)->nullable();
            $table->string('qc21',30)->nullable();
            $table->string('qc22',30)->nullable();
            $table->string('qc23',30)->nullable();
            $table->string('qc24',30)->nullable();
            $table->string('qc25',30)->nullable();
            $table->string('qc26',30)->nullable();
            $table->string('qc27',30)->nullable();
            $table->string('qc28',30)->nullable();
            $table->string('qc29',30)->nullable();
            $table->string('qc30',30)->nullable();
            $table->string('qc31',30)->nullable();
            $table->string('qc32',30)->nullable();
            $table->string('qc33',30)->nullable();
            $table->string('qc34',30)->nullable();
            $table->string('qc35',30)->nullable();
            $table->string('qc36',30)->nullable();
            $table->string('qc37',30)->nullable();
            $table->string('qc38',30)->nullable();
            $table->string('qc39',30)->nullable();
            $table->string('qc40',30)->nullable();
            $table->string('qc41',30)->nullable();
            $table->string('qc42',30)->nullable();
            $table->string('qc43',30)->nullable();
            $table->string('qc44',30)->nullable();
            $table->string('qc45',30)->nullable();
            $table->string('qc46',30)->nullable();
            $table->string('qc47',30)->nullable();
            $table->string('qc48',30)->nullable();
            $table->string('qc49',30)->nullable();
            $table->string('qc50',30)->nullable();
            $table->string('qc51',30)->nullable();
            $table->string('qc52',30)->nullable();
            $table->string('qc53',30)->nullable();
            $table->string('qc54',30)->nullable();
            $table->string('qc55',30)->nullable();
            $table->string('qc56',30)->nullable();
            $table->string('qc57',30)->nullable();
            $table->string('qc58',30)->nullable();
            $table->string('qc59',30)->nullable();
            $table->string('qc60',30)->nullable();
            $table->string('qc61',30)->nullable();
            $table->string('qc62',30)->nullable();
            $table->string('qc63',30)->nullable();
            $table->string('qc64',30)->nullable();
            $table->string('qc65',30)->nullable();
            $table->string('qc66',30)->nullable();
            $table->string('qc67',30)->nullable();
            $table->string('qc68',30)->nullable();
            $table->string('qc69',30)->nullable();
            $table->string('qc70',30)->nullable();
            $table->string('qc71',30)->nullable();
            $table->string('qc72',30)->nullable();
            $table->string('qc73',30)->nullable();
            $table->string('qc74',30)->nullable();
            $table->string('qc75',30)->nullable();
            $table->string('qc76',30)->nullable();
            $table->string('qc77',30)->nullable();
            $table->string('qc78',30)->nullable();
            $table->string('qc79',30)->nullable();
            $table->string('qc80',30)->nullable();
            $table->string('qc81',30)->nullable();
            $table->string('qc82',30)->nullable();
            $table->string('qc83',30)->nullable();
            $table->string('qc84',30)->nullable();
            $table->string('qc85',30)->nullable();
            $table->string('qc86',30)->nullable();
            $table->string('qc87',30)->nullable();
            $table->string('qc88',30)->nullable();
            $table->string('qc89',30)->nullable();
            $table->string('qc90',30)->nullable();
            $table->string('qc91',30)->nullable();
            $table->string('qc92',30)->nullable();
            $table->string('qc93',30)->nullable();
            $table->string('qc94',30)->nullable();
            $table->string('qc95',30)->nullable();
            $table->string('qc96',30)->nullable();
            $table->string('qc97',30)->nullable();
            $table->string('qc98',30)->nullable();
            $table->string('qc99',30)->nullable();
            $table->string('qc100',30)->nullable();
            $table->string('qc101',30)->nullable();
            $table->string('qc102',30)->nullable();
            $table->string('qc103',30)->nullable();
            $table->string('qc104',30)->nullable();
            $table->string('qc105',30)->nullable();
            $table->string('qc106',30)->nullable();
            $table->string('qc107',30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genfar_client_forms');
    }
}
