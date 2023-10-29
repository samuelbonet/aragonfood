<?php

namespace Database\Seeders;

use App\Models\Restaurante;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministradorSeeder extends Seeder
{
   
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'password' => Hash::make('admin'),
            'email' => 'admin',
            'administrador' => 1
        ]);
    }
}
