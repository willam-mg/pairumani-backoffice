<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HospedajeDetalleTransporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospedaje_detalle_transporte', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio', 11, 2);
            $table->date('fecha');
            $table->foreignId('hospedaje_id')->constrained('hospedajes');
            $table->foreignId('transporte_id')->constrained('transportes');
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
        Schema::dropIfExists('hospedaje_detalle_transporte');
    }
}
