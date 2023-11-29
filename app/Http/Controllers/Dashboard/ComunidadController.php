<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\EnvioMensajeRequest;
use App\Models\MensajeComunidad;
use App\Models\User;
use App\Services\DashboardPlantillaService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ComunidadController extends Controller{
    
    public function index(DashboardPlantillaService $plantilla)
    {
        $mensajes = MensajeComunidad::with('usuario')->oldest()->get()->groupBy(function($mensaje) {
            return $mensaje->created_at->locale('es')->translatedFormat('j F Y');
        });

        $plantilla->setTitle ('Comunidad') ;
        $plantilla->loadCkEditor();
        $plantilla->addJs('js/pages/comunidad.js');
        $plantilla->setData($mensajes);
        return $plantilla->view('comunidad');
    }


    public function enviar(EnvioMensajeRequest $request)
    {
        $validated = $request->validated();
        $validated['mensaje'] = preg_replace('#' . url('/') . '#', '_BASEURL_', $validated['mensaje']);
        Auth::user()->mensajes()->create($validated);

        return redirect()->route('comunidad');
    }


    public function subirImagen(Request $request)
    {
        $path = $request->file('file')->store('comunidad', 'public');
        
        return url('storage/' . $path);
    }

}
