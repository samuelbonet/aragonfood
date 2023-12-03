<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordEmailRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\EnvioPasswordReset;
use App\Models\User;
use App\Services\PlantillaService;
use Auth;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index(PlantillaService $plantilla)
    {
        $plantilla->setTitle('Iniciar sesión');
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

    public function resetPassword(PlantillaService $plantilla)
    {
        $plantilla->setTitle('Restablecer contraseña');
        return $plantilla->view('resetPassword');
    }

    public function resetPasswordEmail(ResetPasswordEmailRequest $request)
    {
        $usuario = User::firstWhere('email', $request->validated('email'));
        $usuario->update([
            'reset_password_token' => Str::uuid()
        ]);
        Mail::send(new EnvioPasswordReset($usuario));
        return redirect()->route('reset-password-exito');
    }

    public function resetPasswordExito(PlantillaService $plantilla)
    {
        return $plantilla->view('resetPasswordExito');
    }

    public function resetPasswordNew($token, PlantillaService $plantilla)
    {
        $usuario = User::where('reset_password_token', $token)->firstOrFail();
        $plantilla->setData($usuario);
        return $plantilla->view('resetPasswordNew');
    }

    public function resetPasswordNewPost($token, ResetPasswordRequest $request)
    {
        $usuario = User::where('reset_password_token', $token)->first();
        $usuario->update([
            'password' => Hash::make($request->validated('password')),
            'reset_password_token' => null
        ]);
        return redirect()->route('reset-password-new-exito');
    }

    public function resetPasswordNewExito(PlantillaService $plantilla)
    {
        return $plantilla->view('resetPasswordNewExito');
    }
}
