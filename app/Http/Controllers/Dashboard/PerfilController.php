<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\DashboardPlantillaService;
use Illuminate\Http\Request;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller{

    public function index(DashboardPlantillaService $plantilla)
    {
        
        $plantilla->setTitle('Mi perfil');
        return $plantilla->view('perfil');
    }

    public function resetPassword( DashboardPlantillaService $plantilla) {
        $plantilla->setTitle('Cambiar contraseña');
        return $plantilla->view('resetPasswordNewPerfil');
    }

    public function resetPasswordPost( ResetPasswordRequest $request){
        $usuario = Auth::user();
        $usuario->update([
            'password' => Hash::make($request->validated('password')),
            'reset_password_token' => null
        ]);
        return redirect()->route('perfil');
    }

}
