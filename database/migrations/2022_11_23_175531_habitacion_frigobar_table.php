<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HabitacionFrigobarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitacion_frigobar', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('precio', 11, 2);
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
        Schema::dropIfExists('habitacion_frigobar');
    }
}
