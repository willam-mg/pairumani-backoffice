<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReservasPromocionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas_promocion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('promocion_id')->constrained('promociones');
            $table->foreignId('habitacion_id')->constrained('habitaciones');
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->dateTime('checkin');
            $table->dateTime('checkout');
            $table->integer('adultos');
            $table->integer('niños');
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
        Schema::dropIfExists('reservas_promocion');
    }
}
