<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RestauranteProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurante_productos', function(Blueprint $table){
            $table->id();
            $table->string('nombre', 50);
            $table->longText('descripcion');
            $table->decimal('precio', 11, 2);
            $table->string('foto', 100)->nullable();
            $table->foreignId('restaurante_categoria_id')->constrained('restaurante_categorias');
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
        Schema::dropIfExists('restaurante_productos');
    }
}
