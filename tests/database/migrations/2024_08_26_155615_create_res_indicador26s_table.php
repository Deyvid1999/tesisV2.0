<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResIndicador26sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_indicador26s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('universidad_id');
            $table->unsignedBigInteger('evaluacion_id');
            $table->unsignedBigInteger('criterio_id');
            $table->unsignedBigInteger('indicador_id');
            $table->integer('pia')->nullable();
            $table->integer('ptc')->nullable();
            $table->integer('pmt')->nullable();
            $table->integer('q1')->nullable();
            $table->tinyInteger('q1_ci')->nullable();
            $table->integer('q2')->nullable();
            $table->integer('q2_ci')->nullable();
            $table->integer('q3')->nullable();
            $table->integer('q3_ci')->nullable();
            $table->integer('q4')->nullable();
            $table->integer('q4_ci')->nullable();
            $table->integer('aci')->nullable();
            $table->integer('aci_ci')->nullable();
            $table->integer('br')->nullable();
            $table->integer('br_ci')->nullable();
            $table->integer('la')->nullable();
            $table->integer('la_ci')->nullable();
            $table->decimal('pac', 8, 3)->nullable();
            $table->integer('opi')->nullable();
            $table->integer('opn')->nullable();
            $table->decimal('pa', 8, 3)->nullable();
            $table->integer('li')->nullable();
            $table->integer('cl')->nullable();
            $table->integer('tc')->nullable();
            $table->decimal('lycl', 8, 3)->nullable();
            $table->decimal('ip', 8, 3)->nullable();
            $table->decimal('ip_porcentaje', 8, 3)->nullable();
            $table->string('valoracion_26', 50)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            $table->foreign('criterio_id', 'res_indicador26s_criterio_id_foreign')->references('id')->on('criterios');
            $table->foreign('evaluacion_id', 'res_indicador26s_evaluacion_id_foreign')->references('id')->on('evaluacions')->onDelete('cascade');
            $table->foreign('indicador_id', 'res_indicador26s_indicador_id_foreign')->references('id')->on('indicadors');
            $table->foreign('universidad_id', 'res_indicador26s_universidad_id_foreign')->references('id')->on('universidads');
            $table->foreign('user_id', 'res_indicador26s_user_id_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('res_indicador26s');
    }
}
