<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CafeteriaDetalleReservaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('cafeteria_detalle_reserva_productos', function (Blueprint $table) {
        Schema::create('caf_det_reserv_productos', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio_tamanho', 11, 2);
            $table->foreignId('cafeteria_detalle_reserva_id')->constrained('cafeteria_detalle_reserva');
            $table->foreignId('cafeteria_producto_opciones_id')->nullable()->constrained('cafeteria_producto_opciones');
            $table->foreignId('cafeteria_producto_tamano_id')->nullable()->constrained('cafeteria_producto_tamano');
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
        // Schema::dropIfExists('cafeteria_detalle_reserva_productos');
        Schema::dropIfExists('caf_det_reserv_productos');
    }
}
