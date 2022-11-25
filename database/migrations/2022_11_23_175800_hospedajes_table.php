<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HospedajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospedajes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_checkin');
            $table->dateTime('fecha_checkout');
            $table->integer('niños');
            $table->integer('adultos');
            $table->decimal('precio', 11, 2);
            $table->decimal('precio_promocion', 11, 2)->nullable();
            $table->enum('estado', ['Ocupado', 'Desocupado']);
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->foreignId('habitacion_id')->constrained('habitaciones');
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
        Schema::dropIfExists('hospedajes');
    }
}
