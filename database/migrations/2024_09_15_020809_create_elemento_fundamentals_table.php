<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementoFundamentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elemento_fundamentals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ind_id');
            $table->unsignedInteger('fue_id');
            $table->string('elemento', 254)->nullable();
            $table->decimal('porcentaje', 8, 3)->nullable();
            $table->timestamps();

            $table->foreign('ind_id', 'FK_association5')->references('id')->on('indicadors');
            $table->foreign('fue_id', 'FK_association6')->references('id')->on('fuente_informacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elemento_fundamentals');
    }
}
