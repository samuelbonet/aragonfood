<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnvioPasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    public User $usuario; // Usuario al que se enviará el correo

    /**
     * Create a new message instance.
     */
    public function __construct(User $usuario)
    {
        $this->usuario = $usuario; // Se asigna el usuario al atributo $usuario
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            to: [$this->usuario->email], // Dirección de correo del usuario
            subject: 'Restablecer contraseña de Aragónfood', // Asunto del correo
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.envio-reset-password', // Vista para el contenido del correo
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
