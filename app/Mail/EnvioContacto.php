<?php

namespace App\Mail;

use App\Models\Restaurante;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnvioContacto extends Mailable
{
    use Queueable, SerializesModels;

    public $formulario; // Contiene los datos del formulario de contacto
    public ?Restaurante $restaurante = null; // Puede contener información sobre el restaurante

    /**
     * Create a new message instance.
     */
    public function __construct($formulario)
    {
        $this->formulario = $formulario;

        // Si el formulario tiene un ID restaurante, se busca y se asigna a la propiedad $restaurante
        if (!is_null($formulario['id_restaurante'])) {
            $this->restaurante = Restaurante::find($formulario['id_restaurante']);
        }
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            to: ['samuelbonetweb@gmail.com'], // Dirección de correo de destino
            subject: 'Formulario de contacto Aragónfood', // Asunto del correo
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.envio-contacto', // Vista para el contenido del correo
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return []; 
    }
}
