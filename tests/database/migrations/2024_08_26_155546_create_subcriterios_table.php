<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcriteriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcriterios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('criterio_id');
            $table->string('subcriterio', 250)->nullable();
            $table->decimal('porcentaje', 8, 3)->nullable();
            $table->timestamps();
            
            $table->foreign('criterio_id', 'subcriterios_criterio_id_foreign')->references('id')->on('criterios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcriterios');
    }
}
