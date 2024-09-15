<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHasIndicadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_has_indicadors', function (Blueprint $table) {
            $table->unsignedInteger('ind_id');
            $table->unsignedInteger('id');
            
            $table->primary(['ind_id', 'id']);
            $table->foreign('ind_id', 'FK_Relationship_15')->references('id')->on('indicadors');
            $table->foreign('id', 'FK_Relationship_15_2')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_has_indicadors');
    }
}
