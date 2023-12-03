<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\DashboardPlantillaService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(DashboardPlantillaService $plantilla)
    {
        $plantilla->setTitle('Dashboard');
        return $plantilla->view('dashboard');
    }
    public function calendario(DashboardPlantillaService $plantilla)
    {
        $plantilla->setTitle('Calendario');
        return $plantilla->view('calendario');
    }

}
