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
        $restaurante->update($request->safe()->except('file'));
        $restaurante->modificaciones()->attach(Auth::id());
        DB::commit();
        
        if (!is_null($request->file('file'))) {
            $nombre_fichero = 'restaurante' . $restaurante->id . '.jpg';
        
            // Verificar y eliminar la imagen anterior si existe
            $ruta_imagen_anterior = 'restaurante' . $restaurante->id . '.jpg';
            if (file_exists($ruta_imagen_anterior)) {
                unlink($ruta_imagen_anterior); // Eliminar la imagen anterior
            }
        
            // Guardar la nueva imagen
            $request->file('file')->storeAs('', $nombre_fichero, 'restaurantes');
        }
        
        
        return redirect()->route("restaurantes");
    }


    public function eliminar(Restaurante $restaurante)
    {
        $restaurante->delete();
    }
}