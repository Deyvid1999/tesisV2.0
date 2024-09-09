<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuenteInformacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuente_informacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('indicador_id');
            $table->text('documento')->nullable();
            $table->timestamps();
            
            $table->foreign('indicador_id', 'fuente_informacions_indicador_id_foreign')->references('id')->on('indicadors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuente_informacions');
    }
}
