<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GaleriaLugaresTuristicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeria_lugares_turisticos', function (Blueprint $table) {
            $table->id();
            $table->string('foto', 100)->nullable();
            $table->longText('descripcion')->nullable();
            $table->foreignId('lugar_turistico_id')->nullable()->constrained('lugares_turisticos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galeria_lugares_turisticos');
    }
}
