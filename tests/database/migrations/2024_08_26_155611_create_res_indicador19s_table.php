<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResIndicador19sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_indicador19s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('universidad_id');
            $table->unsignedBigInteger('evaluacion_id');
            $table->unsignedBigInteger('criterio_id');
            $table->unsignedBigInteger('indicador_id');
            $table->integer('n')->nullable();
            $table->integer('neg_a1_2')->nullable();
            $table->integer('neg_a1')->nullable();
            $table->integer('neg_a2_2')->nullable();
            $table->integer('neg_a2')->nullable();
            $table->integer('neg_a3_2')->nullable();
            $table->integer('neg_a3')->nullable();
            $table->integer('neg_a4_2')->nullable();
            $table->integer('neg_a4')->nullable();
            $table->integer('neg_a5_2')->nullable();
            $table->integer('neg_a5')->nullable();
            $table->integer('neg_a6_2')->nullable();
            $table->integer('neg_a6')->nullable();
            $table->decimal('tdg2', 8, 3)->nullable();
            $table->decimal('tdg2_porcentaje', 8, 3)->nullable();
            $table->string('valoracion_19', 50)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            $table->foreign('criterio_id', 'res_indicador19s_criterio_id_foreign')->references('id')->on('criterios');
            $table->foreign('evaluacion_id', 'res_indicador19s_evaluacion_id_foreign')->references('id')->on('evaluacions')->onDelete('cascade');
            $table->foreign('indicador_id', 'res_indicador19s_indicador_id_foreign')->references('id')->on('indicadors');
            $table->foreign('universidad_id', 'res_indicador19s_universidad_id_foreign')->references('id')->on('universidads');
            $table->foreign('user_id', 'res_indicador19s_user_id_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('res_indicador19s');
    }
}
