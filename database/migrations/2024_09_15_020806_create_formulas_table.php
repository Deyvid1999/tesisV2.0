<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('res_id');
            $table->unsignedInteger('ind_id');
            $table->string('formula')->nullable();
            $table->timestamps();
            
            $table->foreign('ind_id', 'FK_association8')->references('id')->on('indicadors');
            //$table->foreign('res_id', 'FK_association9')->references('id')->on('resultados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formulas');
    }
}
