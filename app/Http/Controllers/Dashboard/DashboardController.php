<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\DashboardPlantillaService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Método para mostrar la vista del dashboard
    public function index(DashboardPlantillaService $plantilla)
    {
        // Establece el título de la página como "Dashboard"
        $plantilla->setTitle('Dashboard');
        return $plantilla->view('dashboard');
    }
    
    // Método para mostrar la vista del calendario
    public function calendario(DashboardPlantillaService $plantilla)
    {
        $plantilla->setTitle('Calendario');
        return $plantilla->view('calendario');
    }

}
