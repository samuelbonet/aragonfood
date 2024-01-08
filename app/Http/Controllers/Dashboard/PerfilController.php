<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CambiarDatosRequest;
use App\Services\DashboardPlantillaService;
use Illuminate\Http\Request;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{

    // Método para mostrar la vista del perfil del usuario
    public function index(DashboardPlantillaService $plantilla)
    {

        $plantilla->setTitle('Mi perfil');
        return $plantilla->view('perfil');
    }

    // Método para mostrar la vista de cambio de contraseña
    public function resetPassword(DashboardPlantillaService $plantilla)
    {
        $plantilla->setTitle('Cambiar contraseña');
        return $plantilla->view('resetPasswordNewPerfil');
    }

    // Método para procesar el cambio de contraseña
    public function resetPasswordPost(ResetPasswordRequest $request)
    {
        $usuario = Auth::user();
        $usuario->update([
            'password' => Hash::make($request->validated('password')),
            'reset_password_token' => null
        ]);
        // Redirige de nuevo a la página del perfil después de cambiar la contraseña
        return redirect()->route('perfil');
    }

     // Método para mostrar la vista de cambio de datos
    public function cambiarDatos(DashboardPlantillaService $plantilla)
    {
        $usuario = Auth::user();

        $plantilla->setTitle('Cambiar datos personales');
        $plantilla->setData($usuario);
        return $plantilla->view('resetDatosPerfil');
    }

    // Método para procesar el cambio de datos personales
    public function cambiarDatosPost(CambiarDatosRequest $request)
    {
        $usuario = Auth::user();
        $usuario->update($request->validated());
        return redirect()->route('perfil');
    }

}
