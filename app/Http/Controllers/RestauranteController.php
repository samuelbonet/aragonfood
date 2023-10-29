<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarRestauranteRequest;
use App\Models\Restaurante;
use App\Services\PlantillaService;
use Illuminate\Http\Request;

class RestauranteController extends Controller{
    
    public function index(Restaurante $restaurante, PlantillaService $plantilla)
    {
        $plantilla->setData($restaurante);
        $plantilla->setTitle('Editar restaurante');
        return $plantilla->view("restaurante");
    }


    public function guardar(Restaurante $restaurante, GuardarRestauranteRequest $request)
    {
        $restaurante->update($request->validated());
        return redirect()->route("restaurantes");
    }
}