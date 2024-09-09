<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResIndicador29sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_indicador29s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('universidad_id');
            $table->unsignedBigInteger('evaluacion_id');
            $table->unsignedBigInteger('criterio_id');
            $table->unsignedBigInteger('indicador_id');
            $table->integer('tpv')->nullable();
            $table->integer('toa')->nullable();
            $table->decimal('ipv', 8, 3)->nullable();
            $table->decimal('ipv_porcentaje', 8, 3)->nullable();
            $table->string('valoracion_29', 50)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            $table->foreign('criterio_id', 'res_indicador29s_criterio_id_foreign')->references('id')->on('criterios');
            $table->foreign('evaluacion_id', 'res_indicador29s_evaluacion_id_foreign')->references('id')->on('evaluacions')->onDelete('cascade');
            $table->foreign('indicador_id', 'res_indicador29s_indicador_id_foreign')->references('id')->on('indicadors');
            $table->foreign('universidad_id', 'res_indicador29s_universidad_id_foreign')->references('id')->on('universidads');
            $table->foreign('user_id', 'res_indicador29s_user_id_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('res_indicador29s');
    }
}
