<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         // Llama a otros seeders para poblar la base de datos con información
        $this->call([
            AdministradorSeeder::class,
            RestaurantesSeeder::class
        ]);
    }
}
