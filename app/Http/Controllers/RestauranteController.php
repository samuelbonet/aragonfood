<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarRestauranteRequest;
use App\Models\Poblacion;
use App\Models\Restaurante;
use App\Services\PlantillaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RestauranteController extends Controller
{

     // Método para mostrar el formulario de edición de un restaurante
    public function index(Restaurante $restaurante, PlantillaService $plantilla)
    {
        $plantilla->setData((object) [
            'poblaciones' => Poblacion::all(),
            'restaurante' => $restaurante
        ]);
        $plantilla->setTitle('Editar restaurante');
        return $plantilla->view("restaurante");
    }

    // Método para guardar los cambios realizados en un restaurante
    public function guardar(Restaurante $restaurante, GuardarRestauranteRequest $request)
    {
        DB::beginTransaction();
        $restaurante->update($request->safe()->except('file'));
        $restaurante->modificaciones()->attach(Auth::id());
        DB::commit();
        
        if (!is_null($request->file('file'))) {
            $nombre_fichero = 'restaurante' . $restaurante->id . '.jpg';
            $request->file('file')->storeAs('', $nombre_fichero, 'restaurantes');

           
        }
        
        return redirect()->route("restaurantes");
    }

    // Método para eliminar un restaurante
    public function eliminar(Restaurante $restaurante)
    {
        $restaurante->delete();
    }
}