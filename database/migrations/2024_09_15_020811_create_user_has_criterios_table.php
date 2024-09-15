<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHasCriteriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_has_criterios', function (Blueprint $table) {
            $table->unsignedInteger('cri_id');
            $table->unsignedInteger('id');
            
            $table->primary(['cri_id', 'id']);
            $table->foreign('cri_id', 'FK_Relationship_14_1')->references('id')->on('criterios');
            $table->foreign('id', 'FK_Relationship_14_2')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_has_criterios');
    }
}
