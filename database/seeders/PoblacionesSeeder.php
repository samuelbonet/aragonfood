<?php

namespace Database\Seeders;

use App\Models\Poblacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoblacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Actualiza registros en la tabla 'poblaciones' usando el método upsert
        Poblacion::upsert([
            ['id' => 1, 'poblacion' => 'Zaragoza'],
            ['id' => 2, 'poblacion' => 'Huesca'],
            ['id' => 3, 'poblacion' => 'Teruel'],
        ], ['id']);// Identificador utilizado para determinar si es una inserción o actualización
    }
}
