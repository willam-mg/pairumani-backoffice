<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RestauranteDetalleReservaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurante_detalle_reserva', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurante_reserva_id')->constrained('reservas_restaurante');
            $table->foreignId('restaurante_producto_id')->constrained('restaurante_productos');
            $table->decimal('precio', 11, 2);
            $table->integer('cantidad');
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
        Schema::dropIfExists('restaurante_detalle_reserva');
    }
}
