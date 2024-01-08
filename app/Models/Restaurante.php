<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurante extends Model
{
    use HasFactory; // Permite utilizar las factory para generar datos de prueba
    use SoftDeletes; // Habilita el soft delete
    
    protected $table = "restaurantes"; // Nombre de la tabla en la base de datos
    protected $guarded = []; // Atributos no asignables en masa
    protected $casts = [
        "gluten" => "boolean", // El campo 'gluten' se casteará como booleano
        "vegano" => "boolean" // El campo 'vegano' se casteará como booleano
    ];

    // Un restaurante pertenece a una población
    public function poblacion()
    {
        return $this->belongsTo(Poblacion::class, "id_poblacion"); // Establece la relación belongsTo
    }

    // Un restaurante tiene muchas modificaciones realizadas por usuarios
    public function modificaciones()
    {
        return $this->belongsToMany(User::class, 'restaurantes_modificaciones', 'id_restaurante', 'id_usuario')->withTimestamps();

    }
}
