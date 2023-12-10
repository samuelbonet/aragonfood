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

    public $formulario;
    public ?Restaurante $restaurante = null;

    /**
     * Create a new message instance.
     */
    public function __construct($formulario)
    {
        $this->formulario = $formulario;
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
            to: ['samuelbonetweb@gmail.com'],
            subject: 'Formulario de contacto Aragónfood',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.envio-contacto',
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
