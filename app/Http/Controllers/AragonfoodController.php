<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use App\Services\PlantillaService;
use Illuminate\Http\Request;

class AragonfoodController extends Controller
{
    //

    public function index(PlantillaService $plantilla)
    {
        //$plantilla->addCss('css/index.css');
        $plantilla->setTitle('Inicio');
        return $plantilla->view("index");
    }


     // Método para la sección de recetas
    public function recetas(PlantillaService $plantilla)
    {
        $plantilla->setTitle('Recetas');
        return $plantilla->view("recetas");
    }



}
