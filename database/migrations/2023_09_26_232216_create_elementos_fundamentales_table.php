<?php

use App\Models\ElementoFundamental;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elemento_fundamentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId("indicador_id")->constrained()->cascadeOnDelete();
            $table->text("elemento")->nullable();
            $table->decimal('porcentaje', 8, 3)->nullable();
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
        Schema::dropIfExists('elemento_fundamentals');
    }
};
