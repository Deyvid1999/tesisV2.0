<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('criterio_id');
            $table->unsignedBigInteger('subcriterio_id');
            $table->string('indicador', 250)->nullable();
            $table->text('estandar')->nullable();
            $table->text('periodo')->nullable();
            $table->decimal('porcentaje', 8, 3)->nullable();
            $table->timestamps();
            
            $table->foreign('criterio_id', 'indicadors_criterio_id_foreign')->references('id')->on('criterios');
            $table->foreign('subcriterio_id', 'indicadors_subcriterio_id_foreign')->references('id')->on('subcriterios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicadors');
    }
}
