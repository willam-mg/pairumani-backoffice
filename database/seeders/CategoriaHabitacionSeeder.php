<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaHabitacionSeeder extends Seeder
{
    private $categorias = [
        'Standar',
        'Matrimonial',
        'Matrimonial II',
        'Matrimonial III',
        'Sui I',
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
                'nombre' => $item,
                'descripcion' => '',
                'foto' => '',
            ]);
        }
    }
}
