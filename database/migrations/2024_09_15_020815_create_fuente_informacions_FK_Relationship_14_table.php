<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuenteInformacionsFKRelationship14Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fuente_informacions', function (Blueprint $table) {
            $table->foreign('res_id', 'FK_Relationship_14')->references('id')->on('resultados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fuente_informacions', function(Blueprint $table){
            $table->dropForeign('FK_Relationship_14');
        });
    }
}
