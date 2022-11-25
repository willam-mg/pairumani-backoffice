<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LugaresTuristicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugares_turisticos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->longText('descripcion');
            $table->decimal('precio_recorrido', 11, 2);
            $table->string('lat', 100);
            $table->string('lng', 100);
            $table->enum('tipo', ['Turismo', 'Gastronomia']);
            $table->string('foto', 100)->nullable();
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
        Schema::dropIfExists('lugares_turisticos');
    }
}
