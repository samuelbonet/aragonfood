<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\PlantillaService;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(PlantillaService $plantilla)
    {
        $plantilla->addCss('css/pages/login.css');
        return $plantilla->view("login");
    }


    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'login' => 'Usuario y contraseña no válidos.'
        ]);
    }


    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }
}
