<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_indicador25s', function (Blueprint $table) {
            $table->id();
            $table->foreignId("universidad_id")->constrained();
            $table->foreignId("evaluacion_id")->constrained()->cascadeOnDelete();
            $table->foreignId("criterio_id")->constrained();            
            $table->foreignId("indicador_id")->constrained(); 
            $table->integer('tp')->nullable();
            $table->integer('tpyrf')->nullable();
            $table->integer('tpyci')->nullable();
            $table->integer('tpycn')->nullable();
            $table->decimal('ip', 8, 3)->nullable();
            $table->decimal('ip_porcentaje', 8, 3)->nullable();
            $table->string('valoracion_25', 50)->nullable();
            $table->foreignId("user_id")->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('res_indicador25s');
    }
};
