<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MensajeFormulario extends Model
{
    
    use HasFactory;

    protected $table = "mensajes_formulario";
    protected $guarded = [];
}
