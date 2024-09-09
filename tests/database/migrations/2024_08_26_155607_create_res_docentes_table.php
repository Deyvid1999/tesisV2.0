<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_docentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('universidad_id');
            $table->unsignedBigInteger('evaluacion_id');
            $table->unsignedBigInteger('criterio_id');
            $table->unsignedBigInteger('indicador_id');
            $table->unsignedBigInteger('elemento_fundamental_id');
            $table->decimal('porcentaje', 8, 3)->nullable();
            $table->string('valoracion', 50)->nullable();
            $table->text('observacion')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            $table->foreign('criterio_id', 'res_docentes_criterio_id_foreign')->references('id')->on('criterios');
            $table->foreign('elemento_fundamental_id', 'res_docentes_elemento_fundamental_id_foreign')->references('id')->on('elemento_fundamentals');
            $table->foreign('evaluacion_id', 'res_docentes_evaluacion_id_foreign')->references('id')->on('evaluacions')->onDelete('cascade');
            $table->foreign('indicador_id', 'res_docentes_indicador_id_foreign')->references('id')->on('indicadors');
            $table->foreign('universidad_id', 'res_docentes_universidad_id_foreign')->references('id')->on('universidads');
            $table->foreign('user_id', 'res_docentes_user_id_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('res_docentes');
    }
}
