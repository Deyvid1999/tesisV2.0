<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_creacion')->nullable();
            $table->date('fecha_inicial')->nullable();
            $table->date('fecha_final')->nullable();
            $table->unsignedInteger('res_id');
            $table->unsignedInteger('uni_id');
            $table->unsignedInteger('user_id');
            $table->integer('informe')->nullable();
            $table->unsignedInteger('administrador');
            $table->integer('facultad')->nullable();
            $table->integer('departamento')->nullable();
            $table->timestamps();

            //$table->foreign('res_id', 'FK_association2')->references('id')->on('resultados');
            $table->foreign('uni_id', 'FK_evaluacionsUniversidadIdForeign')->references('id')->on('universidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluacions');
    }
}
