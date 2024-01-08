<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poblacion extends Model
{
    use HasFactory; // Permite utilizar las factory para generar datos de prueba
    
    protected $table = "poblaciones"; // Nombre de la tabla en la base de datos
    protected $guarded = []; 
}
