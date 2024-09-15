<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuenteInformacionsFKAssociation6Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fuente_informacions', function (Blueprint $table) {
            $table->foreign('ele_id', 'FK_association_6')->references('id')->on('elemento_fundamentals');
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
            $table->dropForeign('FK_association_6');
        });
    }
}
