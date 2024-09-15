<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('for_id');
            $table->unsignedInteger('eva_id');
            $table->unsignedInteger('fue_id');
            $table->unsignedInteger('evaluacion_id');
            $table->unsignedInteger('elemento_fundamental_id');
            $table->decimal('porcentaje', 8, 0)->nullable();
            $table->string('valoracion', 254)->nullable();
            $table->string('observacion', 254)->nullable();
            $table->integer('estatus')->nullable();
            $table->integer('formula')->nullable();
            $table->timestamps();

            //$table->foreign('fue_id', 'FK_Relationship14')->references('id')->on('fuente_informacions');
            //$table->foreign('eva_id', 'FK_association_2')->references('id')->on('evaluacions');
            //$table->foreign('for_id', 'FK_association_9')->references('id')->on('formulas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultados');
    }
}
