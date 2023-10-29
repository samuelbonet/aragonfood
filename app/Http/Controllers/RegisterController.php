<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\PlantillaService;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller{
    
    public function index(PlantillaService $plantilla)
    {
        $plantilla->addCss('css/pages/registro.css');
        return $plantilla->view('register');
    }
    
    
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        return redirect()->route('login')->with('registrado', 'Usuario registrado correctamente');
    }
}