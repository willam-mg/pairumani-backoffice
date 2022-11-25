<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GaleriaRestauranteProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeria_restaurante_producto', function (Blueprint $table) {
            $table->id();
            $table->string('foto', 100)->nullable();
            $table->foreignId('restaurante_producto_id')->constrained('restaurante_productos')->nullable();
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
        Schema::dropIfExists('galeria_restaurante_producto');
    }
}
