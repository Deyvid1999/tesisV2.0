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
            $table->id();
            $table->unsignedBigInteger('indicador_id');
            $table->text('elemento')->nullable();
            $table->decimal('porcentaje', 8, 3)->nullable();
            $table->timestamps();
            
            $table->foreign('indicador_id', 'elemento_fundamentals_indicador_id_foreign')->references('id')->on('indicadors')->onDelete('cascade');
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
