<div class="card card-secondary w-75 mx-auto">
    <!-- cabecera del formulario-->
    <div class="card-header bg-dark">
        <h3 class="card-title ">Formulario de contacto</h3>
    </div>

    <!-- formulario -->
    <form action= "{{ url('contacto/enviar') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputNombre">Nombre *</label>
                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                    id="exampleInputNombre" placeholder="Introduzca un nombre" value="{{ old('nombre') }}">
                @error('nombre')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputApellido">Apellido *</label>
                <input type="text" name="apellido" class="form-control" id="exampleInputApellido"
                    placeholder="Introduzca un apellido" value="{{ old('apellido') }}">
                @error('apellido')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputCorreo">Correo Electrónico *</label>
                <input type="text" name="correo" class="form-control" id="exampleInputCorreo"
                    placeholder="Introduzca una dirección de correo válida" value="{{ old('correo') }}">
                @error('correo')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Mensaje *</label>
                <textarea name="mensaje" class="form-control" rows="3" placeholder="Introduzca su mensaje">{{ old('mensaje') }}</textarea>
                @error('mensaje')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>
            <span>* Campos obligatorios</span>
        </div>


        <!-- footer del formulario -->
        <div class="card-footer">
            <button type="submit" class="btn-lg btn-secondary bg-dark">Enviar</button>
        </div>
    </form>
    <!-- final del formulario -->
</div>
