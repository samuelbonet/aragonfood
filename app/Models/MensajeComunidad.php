<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MensajeComunidad extends Model
{
    
    use HasFactory;

    protected $table = "mensajes_comunidad";
    protected $guarded = [];

    protected function mensaje(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => str_replace('_BASEURL_', url('/'), $value)
        );
    }


    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
