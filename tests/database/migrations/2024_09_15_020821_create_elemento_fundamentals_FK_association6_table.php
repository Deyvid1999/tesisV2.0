<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementoFundamentalsFKAssociation6Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('elemento_fundamentals', function (Blueprint $table) {
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
        Schema::table('elemento_fundamentals', function(Blueprint $table){
            $table->dropForeign('FK_association6');
        });
    }
}
