<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('eva_id');
            $table->string('name', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->timestamp('email_verified_at')->default('current_timestamp()');
            $table->string('password', 200)->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('eva_id', 'FK_association_13')->references('id')->on('evaluacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
