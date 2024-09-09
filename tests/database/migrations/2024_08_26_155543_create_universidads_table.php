<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universidads', function (Blueprint $table) {
            $table->id();
            $table->string('universidad', 200)->nullable();
            $table->string('codigo_unico', 200)->nullable()->unique('universidads_codigo_unico_unique');
            $table->string('foto', 200)->nullable();
            $table->string('campus', 200)->nullable();
            $table->string('sede', 200)->nullable();
            $table->string('ciudad', 200)->nullable();
            $table->string('facultad', 200)->nullable();
            $table->string('departamento', 200)->nullable();
            $table->date('fecha_evaluacion')->nullable();
            $table->string('evaluadores', 200)->nullable();
            $table->string('contraparte', 200)->nullable();
            $table->string('informe', 250)->nullable();
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
        Schema::dropIfExists('universidads');
    }
}
