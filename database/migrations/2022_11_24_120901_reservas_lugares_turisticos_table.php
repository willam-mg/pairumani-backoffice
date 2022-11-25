<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReservasLugaresTuristicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas_lugares_turisticos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->enum('estado', ['Reservado', 'Activo']);
            $table->decimal('precio', 11, 2)->nullable();
            $table->foreignId('cliente_id')->constrained('clientes')->nullable();
            $table->foreignId('lugar_turistico_id')->constrained('lugares_turisticos');
            $table->foreignId('hospedaje_id')->constrained('hospedajes')->nullable();
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
        Schema::dropIfExists('reservas_lugares_turisticos');
    }
}
