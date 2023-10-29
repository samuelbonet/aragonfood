<div class="row justify-content-center">
    <div class="col-4">
        <form action="{{ route('restaurante.guardar', $data->id) }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label>Título</label>
                <input type="text" class="form-control" name="titulo" value="{{ old('titulo') ?? $data->titulo }}">
                @error('titulo')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label>Descripción</label>
                <textarea class="form-control" name="descripcion" style="height: 100px">{{ old('descripcion') ?? $data->descripcion }}</textarea>
                @error('titulo')
                    <div class="text-red">{{ $descripcion }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label>Dirección</label>
                <input type="text" class="form-control" name="direccion" value="{{ old('direccion') ?? $data->direccion }}">
                @error('direccion')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label>Población</label>
                <input type="text" class="form-control" name="poblacion" value="{{ old('poblacion') ?? $data->poblacion }}">
                @error('poblacion')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label>Teléfono</label>
                <input type="text" class="form-control" name="telefono" value="{{ old('telefono') ?? $data->telefono }}">
                @error('telefono')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label>Horario</label>
                <textarea class="form-control" name="horario" style="height: 200px">{{ old('horario') ?? $data->horario }}</textarea>
                @error('horario')
                    <div class="text-red">{{ $descripcion }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3">
                        <label>Gluten</label>
                        <select class="form-control" name="gluten">
                            <option value="0" @if(old('gluten') ?? !$data->gluten) selected @endif>No</option>
                            <option value="1" @if(old('gluten') ?? $data->gluten) selected @endif>Sí</option>
                        </select>
                        @error('gluten')
                            <div class="text-red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mb-3">
                        <label>Vegano</label>
                        <select class="form-control" name="vegano">
                            <option value="0" @if(old('vegano') ?? !$data->vegano) selected @endif>No</option>
                            <option value="1" @if(old('vegano') ?? $data->vegano) selected @endif>Sí</option>
                        </select>
                        @error('vegano')
                            <div class="text-red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label>Web</label>
                <input type="text" class="form-control" name="web" value="{{ old('web') ?? $data->web }}">
                @error('web')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label>Instagram</label>
                <input type="text" class="form-control" name="instagram" value="{{ old('instagram') ?? $data->instagram }}">
                @error('instagram')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>

            <div class="row justify-content-between mb-3">
                <div class="col-4">
                    <a href="{{ route('restaurantes') }}" class="btn btn-dark btn-block btn-sm">Cancelar</a>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block btn-sm">Aceptar</button>
                </div>
            </div>
        </form>
    </div>
</div>
