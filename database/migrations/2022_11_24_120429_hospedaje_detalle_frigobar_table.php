<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HospedajeDetalleFrigobarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospedaje_detalle_frigobar', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->decimal('precio', 11, 2);
            $table->integer('cantidad');
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
        Schema::dropIfExists('hospedaje_detalle_frigobar');
    }
}
