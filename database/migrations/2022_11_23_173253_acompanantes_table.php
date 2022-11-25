<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AcompanantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acompanantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->enum('tipo_documento', ['Ci', 'Dni', 'Pasaporte']);
            $table->string('num_documento', 50);
            $table->date('fecha_nacimiento');
            $table->string('ciudad', 50);
            $table->foreignId('cliente_id')->constrained('clientes');
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
        Schema::dropIfExists('acompanantes');
    }
}
