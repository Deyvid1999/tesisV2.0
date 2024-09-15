<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHasUniversidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_has_universidads', function (Blueprint $table) {
            $table->unsignedInteger('uni_id');
            $table->unsignedInteger('id');
            
            $table->primary(['uni_id', 'id']);
            $table->foreign('uni_id', 'FK_Association_12')->references('id')->on('universidads');
            $table->foreign('id', 'FK_Association_12_2')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_has_universidads');
    }
}
