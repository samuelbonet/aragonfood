<?php

use App\Http\Controllers\AragonfoodController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\RestaurantesController;
use App\Http\Middleware\AccesoAdmin;
use App\Http\Middleware\AccesoLogin;
use App\Http\Middleware\AccesoUsuario;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DasboardController;


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

Route::prefix('restaurantes/{restaurante}')->middleware(AccesoAdmin::class)->group(function() {
    Route::get('/' , [RestauranteController::class,'index'])->name("restaurante")->whereNumber('restaurante');
    Route::post('guardar' , [RestauranteController::class,'guardar'])->name("restaurante.guardar")->whereNumber('restaurante');
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

});

Route::get('perfil' , [DashboardController::class,'perfil'])->name("perfil");    
Route::get('calendario' , [DashboardController::class,'calendario'])->name("calendario");
Route::get('comunidad' , [DashboardController::class,'comunidad'])->name("comunidad");        

//auth
Route::prefix('auth')->group(function(){
    Route::get('login',function(){
        return 'Hola';
    });
});




