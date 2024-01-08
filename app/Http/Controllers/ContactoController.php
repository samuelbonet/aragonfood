<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnvioContactoRequest;
use App\Mail\EnvioContacto;
use App\Models\MensajeFormulario;
use App\Models\Restaurante;
use App\Services\PlantillaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    // Método para mostrar el formulario de contacto
    public function index(PlantillaService $plantilla)
    {
        $plantilla->setTitle('Contacto');
        $plantilla->setData((object) [
            'restaurantes' => Restaurante::all(),
        ]);
        return $plantilla->view("contacto/contacto");
    }

    // Método para enviar el formulario de contacto
    public function enviar(EnvioContactoRequest $request)
    {
        Mail::send(new EnvioContacto($request->validated()));
        MensajeFormulario::create($request->validated());
        return redirect()->route('contacto.exito');
    }

    // Método para mostrar la página de éxito posterior al enviar el formulario de contacto
    public function exito(PlantillaService $plantilla)
    {
        return $plantilla->view("contacto/contacto-exito");
    }
}
