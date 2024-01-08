<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AccesoLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next): RedirectResponse
    {
        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            // Si está autenticado, redireccionar a la ruta 'dashboard'
            return redirect()->route('dashboard');
        }

        // Si no está autenticado, permitir que la solicitud continúe hacia el siguiente middleware o controlador
        return $next($request);
    }
}
