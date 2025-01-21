<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanofiRequestRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanofi_request_risks', function (Blueprint $table) {
            $table->id();
            $table->string('user_email')->nullable();
            $table->string('provider_name')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('provider_email')->nullable();
            $table->string('provider_phone')->nullable();
            $table->integer('country_cpy')->unsigned()->nullable();
            $table->LongText('nacionality')->nullable();
            $table->LongText('observation')->nullable();
            $table->integer('user_solicitante')->unsigned();
            $table->integer('ethichal_required')->unsigned()->nullable();
            $table->integer('quest_1')->unsigned()->nullable(); //
            $table->integer('quest_2')->unsigned()->nullable(); //
            $table->string('paises')->nullable();
            $table->string('dda')->nullable();
            $table->LongText('request_type')->nullable();
            $table->integer('country_homologation')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('sanofi_provider')->unsigned()->nullable();
            $table->integer('hacat')->unsigned()->nullable();
            $table->LongText('area_solicitante')->nullable();
            $table->LongText('nombre_comprador')->nullable();
            $table->LongText('condicion_pago')->nullable();
            $table->dateTimeTz('date_solicitud');
            $table->dateTimeTz('date_finalizacion')->nullable();
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
        Schema::dropIfExists('sanofi_request_risks');
    }
}
