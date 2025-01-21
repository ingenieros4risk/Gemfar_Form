<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficialOwnershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficial_ownerships', function (Blueprint $table) {
            $table->id();
            $table->integer('forms_id')->unsigned()->nullable();
            $table->integer('type_bf');
            $table->LongText('adicional_text')->nullable();//Si no hay BF
            $table->LongText('no_coincidence_file')->nullable();//Si no hay BF
            $table->integer('amount_thirds')->nullable(); // Si hay más de 10
            $table->LongText('coincidence_file')->nullable(); // Si hay más de 10
            $table->LongText('document_beneficial_ownership')->nullable();
            $table->LongText('bf_document')->nullable();
            $table->LongText('full_name')->nullable();
            $table->string('participation_control')->nullable();
            $table->tinyInteger('is_pep')->nullable(); 
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
        Schema::dropIfExists('beneficial_ownerships');
    }
}
