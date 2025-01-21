<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanofiRequestRiskOldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanofi_request_risk_olds', function (Blueprint $table) {
            $table->id();
            $table->string('user_email')->nullable();
            $table->string('provider_name')->nullable();
            $table->string('provider_email')->nullable();
            $table->string('provider_phone')->nullable();
            $table->string('attachament')->nullable();
            $table->string('purchase_order')->nullable();
            $table->string('number_order')->nullable();
            $table->string('migo')->nullable();
            $table->string('gr')->nullable();
            $table->LongText('observation')->nullable();
            $table->string('user_solicitante')->nullable();
            $table->string('paises')->nullable();
            $table->string('country_homologation')->nullable();
            $table->string('status_id')->nullable();
            $table->string('sanofi_provider')->nullable();
            $table->string('request_type')->nullable();
            $table->dateTimeTz('date_solicitud');
            $table->dateTimeTz('date_finalizacion')->nullable();
            $table->string('hacat')->nullable();
            $table->string('due_diligence')->nullable();
            $table->string('area_solicitante')->nullable();
            $table->string('nombre_comprador')->nullable();
            $table->string('condicion_pago')->nullable();
            $table->string('nacionality')->nullable();
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
        Schema::dropIfExists('sanofi_request_risk_olds');
    }
}
