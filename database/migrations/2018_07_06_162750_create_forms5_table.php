<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForms5Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms5', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_info')->unsigned();
            $table->foreign('id_info')->references('id')->on('bases');

            $table->string('Tema1');
            $table->string('Tema2');
            $table->string('Tema3');
            $table->string('Tema4');
            
            $table->string('Focus');
            $table->string('Methodology');
            $table->string('Models');
            $table->string('Solvers');
            $table->string('Keyboard');
            $table->string('Abstract');
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
        Schema::dropIfExists('forms5');
    }
}
