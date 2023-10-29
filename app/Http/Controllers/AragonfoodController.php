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
        return $plantilla->view("index");
    }

    

    public function blog(PlantillaService $plantilla)
    {
      
        return $plantilla->view("blog");
    }


    public function contacto(PlantillaService $plantilla)
    {
      
        return $plantilla->view("contacto");
    }

 
}
