<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HabitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones', function(Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->longText('descripcion');
            $table->string('num_habitacion', 50);
            $table->string('foto', 100)->nullable();
            $table->decimal('precio', 11, 2);
            $table->integer('capacidad_minima');
            $table->integer('capacidad_maxima');
            $table->enum('estado', ['Disponible', 'Ocupado', 'Reservado', 'Limpieza']);
            $table->foreignId('habitacion_categoria_id')->constrained('habitacion_categorias');
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
        Schema::dropIfExists('habitaciones');
    }
}
