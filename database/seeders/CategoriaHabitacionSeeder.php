<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaHabitacionSeeder extends Seeder
{
    public $categorias = [
        [
            'id' => 1,
            'nombre'=>'Habitación Simple',
            'foto'=> 'simple.jpg',
            'cantidad'=>6,
            'precio' => 100,
            'capacidad_maxima' => 4
        ],
        [
            'id' => 2,
            'nombre'=> 'Habitación Matrimonial Estandar',
            'foto'=> 'matrimonialestandar.jpg',
            'cantidad' => 5,
            'precio' => 100,
            'capacidad_maxima' => 4
        ],
        [
            'id' => 3,
            'nombre'=> 'Habitación Matrimonial Superior',
            'foto'=> 'matrimonialsuperior.jpg',
            'cantidad' => 13,
            'precio' => 100,
            'capacidad_maxima' => 4
        ],
        [
            'id' => 4,
            'nombre'=> 'Habitación Doble Estandar',
            'foto'=> 'doblestandar.jpg',
            'cantidad' => 5,
            'precio' => 100,
            'capacidad_maxima' => 4
        ],
        [
            'id' => 5,
            'nombre'=> 'Habitación Doble Superior',
            'foto'=> 'doblesuperior.jpg',
            'cantidad' => 4,
            'precio' => 100,
            'capacidad_maxima' => 4
        ],
        [
            'id' => 6,
            'nombre'=> 'Habitación Triple Estandar',
            'foto'=> 'triplestandar.jpg',
            'cantidad' =>5,
            'precio' => 100,
            'capacidad_maxima' => 4
        ],
        [
            'id'=> 7,
            'nombre'=> 'Suite Ejecutiva',
            'foto'=> 'suitejecutiva.jpg',
            'cantidad' => 5,
            'precio' => 100,
            'capacidad_maxima' => 4
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->categorias as $key => $item) {
            DB::table('habitacion_categorias')->insert([
                'id' => $item['id'],
                'nombre' => $item['nombre'],
                'descripcion' => '',
                'foto' => $item['foto'],
            ]);
        }
    }
}
