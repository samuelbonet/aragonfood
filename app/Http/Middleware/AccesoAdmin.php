<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AccesoAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Obtiene al usuario autenticado
        $user = Auth::user();
         // Verifica si el usuario no está autenticado o no es administrador
        if (is_null($user) || !$user->administrador) {
            return redirect()->route('login');
        }
        // Si es un administrador autenticado, permite el acceso a la solicitud
        return $next($request);
    }
}
