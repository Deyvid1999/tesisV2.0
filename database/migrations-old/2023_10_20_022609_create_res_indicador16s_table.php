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
        Schema::create('res_indicador16s', function (Blueprint $table) {
            $table->id();
            $table->foreignId("universidad_id")->constrained();
            $table->foreignId("evaluacion_id")->constrained()->cascadeOnDelete();
            $table->foreignId("criterio_id")->constrained();            
            $table->foreignId("indicador_id")->constrained(); 
            $table->integer('tphd')->nullable();
            $table->integer('tp')->nullable();            
            $table->decimal('tpafd', 8, 3)->nullable();
            $table->decimal('tpafd_porcentaje', 8, 3)->nullable();
            $table->string('valoracion_16', 50)->nullable();
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
        Schema::dropIfExists('res_indicador16s');
    }
};
