<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CafeteriaDetalleReservaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cafeteria_detalle_reserva', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio', 11, 2);
            $table->integer('cantidad');
            $table->foreignId('cafeteria_reserva_id')->constrained('reservas_cafeteria');
            $table->foreignId('cafeteria_producto_id')->constrained('cafeteria_productos');
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
        Schema::dropIfExists('cafeteria_detalle_reserva');
    }
}
