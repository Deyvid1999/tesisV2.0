<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchCondicionInstitucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arch_condicion_institucions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('universidad_id');
            $table->unsignedBigInteger('evaluacion_id');
            $table->unsignedBigInteger('criterio_id');
            $table->unsignedBigInteger('subcriterio_id');
            $table->unsignedBigInteger('indicador_id');
            $table->unsignedBigInteger('fuente_informacion_id');
            $table->string('archivo', 250)->nullable();
            $table->text('observacion')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            $table->foreign('criterio_id', 'arch_condicion_institucions_criterio_id_foreign')->references('id')->on('criterios');
            $table->foreign('evaluacion_id', 'arch_condicion_institucions_evaluacion_id_foreign')->references('id')->on('evaluacions')->onDelete('cascade');
            $table->foreign('fuente_informacion_id', 'arch_condicion_institucions_fuente_informacion_id_foreign')->references('id')->on('fuente_informacions');
            $table->foreign('indicador_id', 'arch_condicion_institucions_indicador_id_foreign')->references('id')->on('indicadors');
            $table->foreign('subcriterio_id', 'arch_condicion_institucions_subcriterio_id_foreign')->references('id')->on('subcriterios');
            $table->foreign('universidad_id', 'arch_condicion_institucions_universidad_id_foreign')->references('id')->on('universidads');
            $table->foreign('user_id', 'arch_condicion_institucions_user_id_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arch_condicion_institucions');
    }
}
