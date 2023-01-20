<?php

namespace Database\Seeders;

use App\Models\HabitacionCategoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = HabitacionCategoria::all();
        $categoriaSeeder = new CategoriaHabitacionSeeder();
        $listaCategorias = $categoriaSeeder->categorias;
        foreach ($categorias as $key => $item) {
            $key = array_search($item->id, array_column($listaCategorias, 'id'));
            for ($i = 1; $i <= $listaCategorias[$key]['cantiad']; $i++) { 
                DB::table('habitacion')->insert([
                    'nombre' => $item->nombre,
                    'descripcion' => '',
                    'num_habitacion' => $i,
                    'precio' => $listaCategorias[$key]['precio'],
                    'capacidad_minima' => 1,
                    'capacidad_maxima' => $listaCategorias[$key]['capacidad_maxima'],
                    'estado' => 'Disponible',
                    'habitacion_categoria_id' => $item->id
                ]);
            }
        }
    }
}
