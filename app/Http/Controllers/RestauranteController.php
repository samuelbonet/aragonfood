<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarRestauranteRequest;
use App\Models\Poblacion;
use App\Models\Restaurante;
use App\Services\PlantillaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RestauranteController extends Controller
{

    public function index(Restaurante $restaurante, PlantillaService $plantilla)
    {
        $plantilla->setData((object) [
            'poblaciones' => Poblacion::all(),
            'restaurante' => $restaurante
        ]);
        $plantilla->setTitle('Editar restaurante');
        return $plantilla->view("restaurante");
    }


    public function guardar(Restaurante $restaurante, GuardarRestauranteRequest $request)
    {
        DB::beginTransaction();
        $restaurante->update($request->validated());
        $restaurante->modificaciones()->attach(Auth::id());
        DB::commit();
        return redirect()->route("restaurantes");
    }
}