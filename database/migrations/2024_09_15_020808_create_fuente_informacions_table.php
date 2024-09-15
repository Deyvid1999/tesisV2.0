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
        Schema::table('fuente_informacions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('arc_id');
            $table->unsignedInteger('res_id');
            $table->unsignedInteger('ele_id');
            $table->text('documento')->nullable();
            $table->timestamps();
            
            $table->foreign('res_id', 'FK_Relationship_14')->references('id')->on('resultados');
            $table->foreign('arc_id', 'FK_association7')->references('id')->on('archivos');
            //$table->foreign('ele_id', 'FK_association_6')->references('id')->on('elemento_fundamentals');
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
