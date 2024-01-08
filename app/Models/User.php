<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios'; // Nombre de la tabla en la base de datos
    protected $guarded = []; // Atributos no asignables en masa
    protected $casts = [
        'administrador' => 'boolean', // El campo 'administrador' se casteará como boolean
    ];

    // Un usuario puede tener varios mensajes de la comunidad
    public function mensajes()
    {
        return $this->hasMany(MensajeComunidad::class, 'id_usuario'); // Establece la relación hasMany
    }
}
