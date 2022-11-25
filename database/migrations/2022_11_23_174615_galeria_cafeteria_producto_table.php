<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GaleriaCafeteriaProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeria_cafeteria_producto', function (Blueprint $table) {
            $table->id();
            $table->string('foto', 100)->nullable();
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
        Schema::dropIfExists('galeria_cafeteria_producto');
    }
}
