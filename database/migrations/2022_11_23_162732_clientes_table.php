<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 50);
            $table->string('apellidos', 50)->nullable();
            $table->enum('tipo_documento', ['Ci', 'Pasaporte'])->nullable();
            $table->string('num_documento', 50)->nullable();
            $table->string('celular', 50)->nullable();
            $table->string('direccion', 200)->nullable();
            $table->string('ciudad', 50)->nullable();
            $table->string('pais', 50)->nullable();
            $table->string('oficio', 50)->nullable();
            $table->string('empresa', 50)->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('email', 50)->unique();
            $table->string('password', 255)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('motivo_viaje', ['Recreacion', 'Negocios', 'Salud', 'Otro'])->nullable();
            $table->string('foto', 100)->nullable();
            $table->string('api_token', 255)->nullable();
            $table->string('imei_celular', 255)->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
