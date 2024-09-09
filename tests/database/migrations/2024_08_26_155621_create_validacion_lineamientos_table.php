<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidacionLineamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validacion_lineamientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('indicador_id');
            $table->text('lineamiento')->nullable();
            $table->timestamps();
            
            $table->foreign('indicador_id', 'validacion_lineamientos_indicador_id_foreign')->references('id')->on('indicadors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('validacion_lineamientos');
    }
}
