<?php

use App\Http\Controllers\AragonfoodController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\Dashboard\ComunidadController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PerfilController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\RestaurantesController;
use App\Http\Middleware\AccesoAdmin;
use App\Http\Middleware\AccesoLogin;
use App\Http\Middleware\AccesoUsuario;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Ruta por defecto que lleva a la página principal
Route::get('/' , [AragonfoodController::class,'index']);

// Ruta para mostrar todos los restaurantes
Route::get('restaurantes' , [RestaurantesController::class,'index'])->name("restaurantes");

// Agrupación de rutas relacionadas con la gestión de restaurantes
Route::prefix('restaurantes')->middleware(AccesoAdmin::class)->group(function() {
    Route::get('nuevo' , [RestaurantesController::class,'nuevo'])->name("restaurante.nuevo");
    Route::post('nuevo' , [RestaurantesController::class,'nuevoPost'])->name("restaurante.nuevo-post");
    
    // Rutas específicas para un restaurante en particular
    Route::prefix('{restaurante}')->whereNumber('restaurante')->group(function() {
        Route::get('/' , [RestauranteController::class,'index'])->name("restaurante");
        Route::post('guardar' , [RestauranteController::class,'guardar'])->name("restaurante.guardar");
        Route::post('eliminar' , [RestauranteController::class,'eliminar']);
    });
});

// Rutas relacionadas con el formulario de contacto
Route::get('contacto' , [ContactoController::class,'index'])->name("contacto");
Route::post('contacto/enviar' , [ContactoController::class,'enviar']);
Route::get('contacto/exito' , [ContactoController::class,'exito'])->name("contacto.exito");

// Otras rutas relacionadas con la aplicación
Route::get('recetas' , [AragonfoodController::class,'recetas'])->name("recetas");

// Rutas de autenticación (login, logout, registro)
Route::get('login' , [LoginController::class,'index'])->middleware(AccesoLogin::class)->name('login');
Route::post('login' , [LoginController::class,'login'])->name('login.login');
Route::get('logout' , [LoginController::class,'logout'])->name('logout');
Route::get('register' , [RegisterController::class, 'index'])->name('register');
Route::post('register' , [RegisterController::class, 'register'])->name('register.form');

// Rutas del dashboard y perfil de usuario
Route::middleware(AccesoUsuario::class)->group(function() {
    Route::get('dashboard' , [DashboardController::class,'index'])->name("dashboard");

    Route::prefix('perfil')->group(function() {
        Route::get('/' , [PerfilController::class,'index'])->name("perfil"); 
        Route::get('reset-password' , [PerfilController::class,'resetPassword'])->name("perfil.reset-password");   
        Route::post('reset-password' , [PerfilController::class,'resetPasswordPost'])->name("perfil.reset-password-post");
        Route::get('cambiar-datos' , [PerfilController::class,'cambiarDatos'])->name("perfil.cambiar-datos");   
        Route::post('cambiar-datos' , [PerfilController::class,'cambiarDatosPost'])->name("perfil.cambiar-datos-post");
       
    });

      // Otras rutas dentro del dashboard
    Route::get('calendario' , [DashboardController::class,'calendario'])->name("calendario");

    // Rutas de la comunidad
    Route::prefix('comunidad')->group(function() {
        Route::get('/', [ComunidadController::class,'index'])->name("comunidad");
        Route::post('enviar', [ComunidadController::class,'enviar'])->name("comunidad.enviar");
        Route::post('imagen/subir', [ComunidadController::class, 'subirImagen']);
    });

});

// Rutas relacionadas con reseteo de contraseña
Route::get('reset-password',[LoginController::class,'resetPassword'])->name("reset-password");        
Route::post('reset-password',[LoginController::class,'resetPasswordEmail'])->name("reset-password-email");
Route::get('reset-password-exito',[LoginController::class,'resetPasswordExito'])->name("reset-password-exito");

Route::get('reset-password-new/{token}',[LoginController::class,'resetPasswordNew'])->name("reset-password-new")->whereUuid('token');        
Route::post('reset-password-new/{token}',[LoginController::class,'resetPasswordNewPost'])->name("reset-password-new-post")->whereUuid('token');        
Route::get('reset-password-new-exito',[LoginController::class,'resetPasswordNewExito'])->name("reset-password-new-exito");

// Rutas de autenticación personalizada bajo '/auth'
Route::prefix('auth')->group(function(){
    Route::get('login',function(){
        return 'Hola';
    });
});




