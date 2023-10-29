<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    use HasFactory;
    protected $table = "restaurantes";
    protected $guarded = [];
    protected $casts = [
        "gluten" => "boolean",
        "vegano" => "boolean"
    ];
}
