<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurante extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "restaurantes";
    protected $guarded = [];
    protected $casts = [
        "gluten" => "boolean",
        "vegano" => "boolean"
    ];


    public function poblacion()
    {
        return $this->belongsTo(Poblacion::class,"id_poblacion");
    }


    public function modificaciones()
    {
        return $this->belongsToMany(User::class, 'restaurantes_modificaciones', 'id_restaurante', 'id_usuario')->withTimestamps();
    }
}
