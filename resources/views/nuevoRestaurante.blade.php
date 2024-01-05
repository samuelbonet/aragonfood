<!--Creación de un restaurante-->
<div class="row justify-content-center">
    <div class="col-4">
        <h3 class="text-center mb-3">Nuevo restaurante</h3>
        <form action="{{ route('restaurante.nuevo') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label>Título</label>
                <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}">
                @error('titulo')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label>Descripción</label>
                <textarea class="form-control" name="descripcion" style="height: 100px">{{ old('descripcion') }}</textarea>
                @error('titulo')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label>Dirección</label>
                <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}">
                @error('direccion')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label>Población</label>
                <select class="form-control" name="id_poblacion">
                    @foreach ($data->poblaciones as $poblacion)
                        <option value="{{ $poblacion->id }}" @if($poblacion->id == old('id_poblacion')) selected @endif>{{ $poblacion->poblacion }}</option>
                    @endforeach
                </select>
                @error('id_poblacion')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label>Teléfono</label>
                <input type="text" class="form-control" name="telefono" value="{{ old('telefono') }}">
                @error('telefono')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label>Horario</label>
                <textarea class="form-control" name="horario" style="height: 200px">{{ old('horario') }}
                    <span>Introducir horario </span><br>
                        <span>Introducir horario  </span><br>
                        <span>Introducir horario  </span><br>
                        <span>Introducir horario  </span><br>
                        <span>Introducir horario  </span><br>
                        <span>Introducir horario  </span><br>
                        <span>Introducir horario  </span><br>
                </textarea>
                @error('horario')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3">
                        <label>Gluten</label>
                        <select class="form-control" name="gluten">
                            <option value="0" @if(old('gluten')) selected @endif>No</option>
                            <option value="1" @if(old('gluten')) selected @endif>Sí</option>
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
                            <option value="0" @if(old('vegano')) selected @endif>No</option>
                            <option value="1" @if(old('vegano')) selected @endif>Sí</option>
                        </select>
                        @error('vegano')
                            <div class="text-red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label>Web</label>
                <input type="text" class="form-control" name="web" value="{{ old('web') }}">
                @error('web')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label>Instagram</label>
                <input type="text" class="form-control" name="instagram" value="{{ old('instagram') }}">
                @error('instagram')
                    <div class="text-red">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>Imagen</label>
                <input type="file" class="form-control" name="file">
                @error('file')
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
