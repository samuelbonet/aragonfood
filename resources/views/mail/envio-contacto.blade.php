<!--Mensaje que llega una vez enviado el forumalrio de contacto al email-->
<p>Mensaje de: {{ $formulario['nombre'] }} {{ $formulario['apellido'] }} <br> Correo: {{ $formulario['correo'] }}</p>
@if (!is_null($restaurante))
<p>Relativo a restaurante: {{ $restaurante->titulo }}</p>
@endif
<p>Mensaje: {{ $formulario['mensaje'] }}</p>
