<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('checkin');
            $table->dateTime('checkout');
            $table->integer('adultos');
            $table->integer('niños');
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->foreignId('habitacion_id')->constrained('habitaciones');
            $table->enum('estado', ['Reservado', 'Activo']);
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
        Schema::dropIfExists('reservas');
    }
}
