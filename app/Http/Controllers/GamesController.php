<?php

namespace App\Http\Controllers;

use App\Services\PlantillaService;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    //

    public function index(PlantillaService $plantilla)
    {
        return $plantilla->view("index");
    }

    public function create(PlantillaService $plantilla)
    {
        $plantilla->setTitle('Crear');
        return $plantilla->view("create");
    }

    public function mostrar(PlantillaService $plantilla, $name_game, $categoria = null)
    {
        $plantilla->addJs('js/mostrar.js');
        $plantilla->setData([
            "nameVideogame"=>$name_game,
            "categoryGame"=>$categoria
        ]);
        return $plantilla->view("mostrar");
    }
}
