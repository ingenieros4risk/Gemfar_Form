<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanofiHacatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanofi_hacats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('dda')->unsigned();
            $table->integer('ethics')->unsigned();
            $table->integer('csr')->unsigned();
            $table->integer('hys')->unsigned();
            $table->integer('env')->unsigned();
            $table->integer('csy')->unsigned();
            $table->integer('category_b')->unsigned();
            $table->integer('category_c_hcp')->unsigned();
            $table->integer('category_c_hco')->unsigned();
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
        Schema::dropIfExists('sanofi_hacats');
    }
}
