<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HospedajeDetalleAcompanantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospedaje_detalle_acompanantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('num_documento', 50);
            $table->string('nacionalidad', 50);
            $table->string('ciudad', 50);
            $table->foreignId('hospedaje_id')->constrained('hospedajes');
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
        Schema::dropIfExists('hospedaje_detalle_acompanantes');
    }
}
