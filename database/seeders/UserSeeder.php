<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre' => 'administrador',
            'apellido' => '',
            'email' => 'admin@gmail.com',
            'telefono' => '78979998',
            'direccion' => 'Main avenue 789',
            'password' => Hash::make('123456'),
            'api_token' => str::random('60'),
            'imei_celular' => '',
            'rol_id' => 1,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
