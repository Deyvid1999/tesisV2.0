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
            $table->increments('id');
            $table->unsignedInteger('cri_id');
            $table->string('subcriterio', 254)->nullable();
            $table->decimal('porcentaje', 8, 3)->nullable();
            $table->timestamps();

            $table->foreign('cri_id', 'FK_association_3')->references('id')->on('criterios');
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
