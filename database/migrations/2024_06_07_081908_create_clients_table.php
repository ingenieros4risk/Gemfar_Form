<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('id');
            $table->integer('client_id')->unsigned();
            $table->integer('id_client_type');
            $table->integer('id_status');
            $table->string('third_party_name');
            $table->string('area_solicitante');
            $table->integer('id_sales_organization');
            $table->integer('id_channel');
            $table->integer('id_sector');
            $table->integer('id_type_sale');
            $table->integer('id_group_client');
            $table->integer('id_oficina_ventas');
            $table->string('grupo_vendedores');
            $table->integer('vol_men_esti_comp');
            $table->string('update_attachment_sales');
            $table->string('name_comercial');
            $table->integer('id_sociedad_solicitante');
            $table->integer('id_tipo_solicitud');
            $table->integer('id_country');
            $table->string('email');
            $table->string('number_client');
            $table->string('password')->nullable();
            $table->integer('id_user');
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
        Schema::dropIfExists('clients');
    }
}
