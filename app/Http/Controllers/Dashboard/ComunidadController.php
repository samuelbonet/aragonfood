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

class ComunidadController extends Controller
{

      // Método para mostrar la vista de la comunidad
    public function index(DashboardPlantillaService $plantilla)
    {
         // Obtener los mensajes de la comunidad y agruparlos por fecha
        $mensajes = MensajeComunidad::with('usuario')->oldest()->get()->groupBy(function ($mensaje) {
            return $mensaje->created_at->locale('es')->translatedFormat('l j F Y ');
        });

        $plantilla->setTitle('Comunidad');
        $plantilla->loadCkEditor();
        $plantilla->addJs('js/pages/comunidad.js');
        $plantilla->setData($mensajes);
        return $plantilla->view('comunidad');
    }


    // Método para enviar un mensaje a la comunidad
    public function enviar(EnvioMensajeRequest $request)
    {
        $validated = $request->validated();
        $validated['mensaje'] = preg_replace('#' . url('/') . '#', '_BASEURL_', $validated['mensaje']);
        Auth::user()->mensajes()->create($validated);

        return redirect()->route('comunidad');
    }

    // Método para subir una imagen a la comunidad
    public function subirImagen(Request $request)
    {
        $path = $request->file('file')->store('comunidad', 'public');

        return url('storage/' . $path);
    }

}
