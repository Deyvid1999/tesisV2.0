<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResIndicador22sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_indicador22s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('universidad_id');
            $table->unsignedBigInteger('evaluacion_id');
            $table->unsignedBigInteger('criterio_id');
            $table->unsignedBigInteger('indicador_id');
            $table->integer('n')->nullable();
            $table->integer('nept_1')->nullable();
            $table->integer('tec_1')->nullable();
            $table->integer('nept_2')->nullable();
            $table->integer('tec_2')->nullable();
            $table->integer('nept_3')->nullable();
            $table->integer('tec_3')->nullable();
            $table->integer('nept_4')->nullable();
            $table->integer('tec_4')->nullable();
            $table->integer('nept_5')->nullable();
            $table->integer('tec_5')->nullable();
            $table->integer('nept_6')->nullable();
            $table->integer('tec_6')->nullable();
            $table->decimal('ttp', 8, 3)->nullable();
            $table->decimal('ttp_porcentaje', 8, 3)->nullable();
            $table->string('valoracion_22', 50)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            $table->foreign('criterio_id', 'res_indicador22s_criterio_id_foreign')->references('id')->on('criterios');
            $table->foreign('evaluacion_id', 'res_indicador22s_evaluacion_id_foreign')->references('id')->on('evaluacions')->onDelete('cascade');
            $table->foreign('indicador_id', 'res_indicador22s_indicador_id_foreign')->references('id')->on('indicadors');
            $table->foreign('universidad_id', 'res_indicador22s_universidad_id_foreign')->references('id')->on('universidads');
            $table->foreign('user_id', 'res_indicador22s_user_id_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('res_indicador22s');
    }
}
