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

Route::get('/' , [AragonfoodController::class,'index']);

Route::get('restaurantes' , [RestaurantesController::class,'index'])->name("restaurantes");

Route::prefix('restaurantes')->middleware(AccesoAdmin::class)->group(function() {
    Route::get('nuevo' , [RestaurantesController::class,'nuevo'])->name("restaurante.nuevo");
    Route::post('nuevo' , [RestaurantesController::class,'nuevoPost'])->name("restaurante.nuevo-post");
    
    Route::prefix('{restaurante}')->whereNumber('restaurante')->group(function() {
        Route::get('/' , [RestauranteController::class,'index'])->name("restaurante");
        Route::post('guardar' , [RestauranteController::class,'guardar'])->name("restaurante.guardar");
        Route::post('eliminar' , [RestauranteController::class,'eliminar']);
    });
});

Route::get('contacto' , [ContactoController::class,'index'])->name("contacto");
Route::post('contacto/enviar' , [ContactoController::class,'enviar']);
Route::get('contacto/exito' , [ContactoController::class,'exito'])->name("contacto.exito");

Route::get('blog' , [AragonfoodController::class,'blog'])->name("blog");

Route::get('login' , [LoginController::class,'index'])->middleware(AccesoLogin::class)->name('login');
Route::post('login' , [LoginController::class,'login'])->name('login.login');
Route::get('logout' , [LoginController::class,'logout'])->name('logout');

Route::get('register' , [RegisterController::class, 'index'])->name('register');
Route::post('register' , [RegisterController::class, 'register'])->name('register.form');

Route::middleware(AccesoUsuario::class)->group(function() {
    Route::get('dashboard' , [DashboardController::class,'index'])->name("dashboard");

    Route::prefix('perfil')->group(function() {
        Route::get('/' , [PerfilController::class,'index'])->name("perfil"); 
        Route::get('reset-password' , [PerfilController::class,'resetPassword'])->name("perfil.reset-password");   
        Route::post('reset-password' , [PerfilController::class,'resetPasswordPost'])->name("perfil.reset-password-post");
        Route::get('cambiar-datos' , [PerfilController::class,'cambiarDatos'])->name("perfil.cambiar-datos");   
        Route::post('cambiar-datos' , [PerfilController::class,'cambiarDatosPost'])->name("perfil.cambiar-datos-post");
       
    });

    Route::get('calendario' , [DashboardController::class,'calendario'])->name("calendario");

    Route::prefix('comunidad')->group(function() {
        Route::get('/', [ComunidadController::class,'index'])->name("comunidad");
        Route::post('enviar', [ComunidadController::class,'enviar'])->name("comunidad.enviar");
        Route::post('imagen/subir', [ComunidadController::class, 'subirImagen']);
    });

});

Route::get('reset-password',[LoginController::class,'resetPassword'])->name("reset-password");        
Route::post('reset-password',[LoginController::class,'resetPasswordEmail'])->name("reset-password-email");
Route::get('reset-password-exito',[LoginController::class,'resetPasswordExito'])->name("reset-password-exito");

Route::get('reset-password-new/{token}',[LoginController::class,'resetPasswordNew'])->name("reset-password-new")->whereUuid('token');        
Route::post('reset-password-new/{token}',[LoginController::class,'resetPasswordNewPost'])->name("reset-password-new-post")->whereUuid('token');        
Route::get('reset-password-new-exito',[LoginController::class,'resetPasswordNewExito'])->name("reset-password-new-exito");

//auth
Route::prefix('auth')->group(function(){
    Route::get('login',function(){
        return 'Hola';
    });
});




