<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResCondicionInstitucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_condicion_institucions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('universidad_id');
            $table->unsignedBigInteger('evaluacion_id');
            $table->unsignedBigInteger('criterio_id');
            $table->unsignedBigInteger('subcriterio_id');
            $table->unsignedBigInteger('indicador_id');
            $table->unsignedBigInteger('elemento_fundamental_id');
            $table->decimal('porcentaje', 8, 3)->nullable();
            $table->string('valoracion', 50)->nullable();
            $table->text('observacion')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            $table->foreign('criterio_id', 'res_condicion_institucions_criterio_id_foreign')->references('id')->on('criterios');
            $table->foreign('elemento_fundamental_id', 'res_condicion_institucions_elemento_fundamental_id_foreign')->references('id')->on('elemento_fundamentals');
            $table->foreign('evaluacion_id', 'res_condicion_institucions_evaluacion_id_foreign')->references('id')->on('evaluacions')->onDelete('cascade');
            $table->foreign('indicador_id', 'res_condicion_institucions_indicador_id_foreign')->references('id')->on('indicadors');
            $table->foreign('subcriterio_id', 'res_condicion_institucions_subcriterio_id_foreign')->references('id')->on('subcriterios');
            $table->foreign('universidad_id', 'res_condicion_institucions_universidad_id_foreign')->references('id')->on('universidads');
            $table->foreign('user_id', 'res_condicion_institucions_user_id_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('res_condicion_institucions');
    }
}
