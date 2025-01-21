<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanofiRequestUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanofi_request_updates', function (Blueprint $table) {
            $table->id();
            $table->string('solicitante_name')->nullable();
            $table->string('solicitante_email')->nullable();
            $table->LongText('selections')->nullable();
            $table->LongText('update_name')->nullable();
            $table->LongText('update_email')->nullable();
            $table->LongText('update_nit_number')->nullable();
            $table->LongText('update_nit')->nullable();
            $table->LongText('update_phone')->nullable();
            $table->LongText('update_cuenta_bancaria_number')->nullable();
            $table->LongText('update_cuenta_bancaria')->nullable();
            $table->LongText('update_contact')->nullable();
            $table->dateTimeTz('date_fill')->nullable();
            $table->tinyInteger('is_updated')->nullable()->default('0');
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
        Schema::dropIfExists('sanofi_request_updates');
    }
}
