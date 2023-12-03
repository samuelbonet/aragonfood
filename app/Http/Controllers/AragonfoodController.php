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



    public function blog(PlantillaService $plantilla)
    {
        $plantilla->setTitle('Blog');
        return $plantilla->view("blog");
    }



}
