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
            $table->foreignId('restaurante_detalle_reserva_id')->constrained('restaurante_detalle_reserva');
            $table->foreignId('restaurante_producto_opciones_id')->nullable()->constrained('restaurante_producto_opciones');
            $table->foreignId('restaurante_producto_tamano_id')->nullable()->constrained('restaurante_producto_tamano');
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
