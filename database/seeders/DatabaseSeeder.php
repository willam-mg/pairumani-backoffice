<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolSeeder::class,
            UserSeeder::class,
            CategoriaHabitacionSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
