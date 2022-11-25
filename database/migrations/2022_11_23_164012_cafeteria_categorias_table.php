<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CafeteriaCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cafeteria_categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->longText('descripcion');
            $table->string('foto', 100);
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
        Schema::dropIfExists('cafeteria_categorias');
    }
}
