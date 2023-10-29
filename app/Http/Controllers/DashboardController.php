<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\DashboardPlantillaService;
use Illuminate\Http\Request;

class DashboardController extends Controller{
    public function index(DashboardPlantillaService $plantilla)
    {
        $plantilla->setTitle('Dashboard');
        return $plantilla->view('dashboard');
    }
    public function perfil(DashboardPlantillaService $plantilla)
    {
        $plantilla->setTitle('Mi perfil');
        return $plantilla->view('perfil');
    }
    public function calendario(DashboardPlantillaService $plantilla)
    {
        $plantilla->setTitle ('Calendario') ;
        return $plantilla->view('calendario');
    }

}
