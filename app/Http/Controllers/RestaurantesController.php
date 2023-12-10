<?php

namespace App\Http\Controllers;

use App\Models\Poblacion;
use App\Models\Restaurante;
use App\Services\PlantillaService;
use Illuminate\Http\Request;

class RestaurantesController extends Controller
{

    public function index(PlantillaService $plantilla, Request $request)
    {
        $query = Restaurante::with("poblacion");
        if (!is_null($request->poblacion) && $request->poblacion != "0") {
            $query->where('id_poblacion', $request->poblacion);
        }
        if ($request->gluten == "1") {
            $query->where('gluten', true);
        }
        if ($request->vegano == "1") {
            $query->where('vegano', true);
        }
        $restaurantes = $query->get();

        $poblaciones = Poblacion::all();

        $plantilla->setData((object) [
            'restaurantes' => $restaurantes,
            'poblaciones' => $poblaciones,
            'poblacion' => $request->poblacion,
            'gluten' => $request->gluten === "1",
            'vegano' => $request->vegano === "1"
        ]);
        $plantilla->setTitle('Restaurantes');
        return $plantilla->view("restaurantes");
    }


    public function restaurantes(Request $request)
    {
        $busqueda = $request->busqueda;
        $categorias = Restaurante::where('poblacion', 'LIKE', '%' . $busqueda . '%');
        $data = [
            'categorias' => $categorias,
            'busqueda' => $busqueda,
        ];


        return view('restaurantes', $data);
    }
}