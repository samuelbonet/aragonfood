<!--Restablecer contraseña del usuario-->
<p>Puede restablecer su contraseña pulsando en el siguiente enlace <a
        href="{{ route('reset-password-new', $usuario->reset_password_token) }}">{{ route('reset-password-new', $usuario->reset_password_token) }}</a>
</p>
