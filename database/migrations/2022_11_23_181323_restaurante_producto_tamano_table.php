<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RestauranteProductoTamanoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurante_producto_tamano', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->decimal('precio', 11, 2);
            $table->foreignId('restaurante_producto_id')->constrained('restaurante_productos');
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
        Schema::dropIfExists('restaurante_producto_tamano');
    }
}
