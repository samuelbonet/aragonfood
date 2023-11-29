<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $guarded = [];
    protected $casts = [
        'administrador' => 'boolean',
    ];


    public function mensajes()
    {
        return $this->hasMany(MensajeComunidad::class, 'id_usuario');
    }
}
