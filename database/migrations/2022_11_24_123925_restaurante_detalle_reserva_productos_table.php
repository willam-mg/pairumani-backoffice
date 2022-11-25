<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RestauranteDetalleReservaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('restaurante_detalle_reserva_productos', function (Blueprint $table) {
        Schema::create('rest_det_resv_productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurante_detalle_reserva_id')->constrained('reservas_restaurante');
            $table->foreignId('restaurante_producto_opciones_id')->constrained('restaurante_producto_opciones')->nullable();
            $table->foreignId('restaurante_producto_tamano_id')->constrained('restaurante_producto_tamano')->nullable();
            $table->decimal('precio_tamanho', 11, 2);
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
        // Schema::dropIfExists('restaurante_detalle_reserva_productos');
        Schema::dropIfExists('rest_det_resv_productos');
    }
}
