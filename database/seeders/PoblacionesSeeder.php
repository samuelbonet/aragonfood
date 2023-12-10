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
        Poblacion::upsert([
            ['id' => 1, 'poblacion' => 'Zaragoza'],
            ['id' => 2, 'poblacion' => 'Huesca'],
            ['id' => 3, 'poblacion' => 'Teruel'],
        ], ['id']);
    }
}
