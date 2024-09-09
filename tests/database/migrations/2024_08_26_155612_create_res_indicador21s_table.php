<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResIndicador21sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_indicador21s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('universidad_id');
            $table->unsignedBigInteger('evaluacion_id');
            $table->unsignedBigInteger('criterio_id');
            $table->unsignedBigInteger('indicador_id');
            $table->integer('n')->nullable();
            $table->integer('negt_1')->nullable();
            $table->integer('teg_1')->nullable();
            $table->integer('negt_2')->nullable();
            $table->integer('teg_2')->nullable();
            $table->integer('negt_3')->nullable();
            $table->integer('teg_3')->nullable();
            $table->integer('negt_4')->nullable();
            $table->integer('teg_4')->nullable();
            $table->integer('negt_5')->nullable();
            $table->integer('teg_5')->nullable();
            $table->integer('negt_6')->nullable();
            $table->integer('teg_6')->nullable();
            $table->decimal('ttg', 8, 3)->nullable();
            $table->decimal('ttg_porcentaje', 8, 3)->nullable();
            $table->string('valoracion_21', 50)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            $table->foreign('criterio_id', 'res_indicador21s_criterio_id_foreign')->references('id')->on('criterios');
            $table->foreign('evaluacion_id', 'res_indicador21s_evaluacion_id_foreign')->references('id')->on('evaluacions')->onDelete('cascade');
            $table->foreign('indicador_id', 'res_indicador21s_indicador_id_foreign')->references('id')->on('indicadors');
            $table->foreign('universidad_id', 'res_indicador21s_universidad_id_foreign')->references('id')->on('universidads');
            $table->foreign('user_id', 'res_indicador21s_user_id_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('res_indicador21s');
    }
}
