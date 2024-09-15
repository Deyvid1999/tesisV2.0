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
            $table->increments('id');
            $table->unsignedInteger('sub_id');
            $table->unsignedInteger('subcriterio_id');
            $table->string('indicador', 254)->nullable();
            $table->text('estandar')->nullable();
            $table->text('periodo')->nullable();
            $table->decimal('porcentaje', 8, 3)->nullable();
            $table->timestamps();

            $table->foreign('sub_id', 'FK_association4')->references('id')->on('subcriterios');
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
