<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <form method='get' action='{{ route('restaurantes') }}'>
                    <div class="d-flex">
                        <div class="form-group w-25">
                            <label>Población:</label>
                            <select class="form-control" name="poblacion">
                                <option value="0" @if ($data->poblacion == '0') selected @endif>Todas las
                                    poblaciones</option>
                                @foreach ($data->poblaciones as $poblacion)
                                    <option value="{{ $poblacion->id }}"
                                        @if ($data->poblacion == $poblacion->id) selected @endif>{{ $poblacion->poblacion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group w-25">
                            <label>Celíaco:</label>
                            <select class="form-control" name="gluten">
                                <option value="0" @if (!$data->gluten) selected @endif>Todos los
                                    restaurantes</option>
                                <option value="1" @if ($data->gluten) selected @endif>Restaurantes
                                    aptos para celíacos</option>
                            </select>
                        </div>
                        <div class="form-group w-25 ml-3">
                            <label>Vegano:</label>
                            <select class="form-control" name="vegano">
                                <option value="0" @if (!$data->vegano) selected @endif>Todos los
                                    restaurantes</option>
                                <option value="1" @if ($data->vegano) selected @endif>Restaurantes
                                    aptos para veganos</option>
                            </select>
                        </div>
                        <div class="ml-3">
                            <button type="submit" class="btn btn-default" style="margin-top: 32px">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>


                <section class="about section-padding" id="about">
                    <div class="container">
                        @foreach ($data->restaurantes as $restaurante)
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="about-img">
                                        <img alt="" class="img-fluid"
                                            src="{{ asset('img/pagina/restaurantes/restaurante' . $restaurante->id . '.jpg') }}">
                                    </div>
                                </div>
                                <div class="col-md-8 col-12 ps-lg-5 mt-md-5">
                                    <div class="about-text">
                                        <div class="d-flex align-items-center">
                                            <h2 class="m-0">{{ $restaurante->titulo }}</h2>
                                            @if (auth()->check() && auth()->user()->administrador)
                                                <div class="ml-1 flex-grow-1">
                                                    <a href="{{ route('restaurante', $restaurante->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                </div>
                                                @if ($restaurante->modificaciones()->exists())
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                                <img class="fas rounded-circle" src="https://ui-avatars.com/api/?name={{ $restaurante->modificaciones->last()->name }}&color=f9f9f9&background=323e62'" width="30">
                                                                {{ $restaurante->modificaciones->last()->name }}
                                                                <small>{{ $restaurante->modificaciones->last()->pivot->created_at->format('d/m/Y H:i:s') }}</small>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            @foreach ($restaurante->modificaciones as $modificacion)
                                                                <li><a class="dropdown-item">
                                                                    <img class="fas rounded-circle" src="https://ui-avatars.com/api/?name={{ $restaurante->modificaciones->last()->name }}&color=f9f9f9&background=323e62'" width="30">
                                                                    {{ $modificacion->name }}
                                                                    <small>{{ $modificacion->pivot->created_at->format('d/m/Y H:i:s') }}</small>
                                                                </a></li>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                        <p>{{ $restaurante->descripcion }}</p>
                                        <p><i class="fa-solid fa-location-dot" style="color: #000000;"></i>
                                            {{ $restaurante->direccion }} {{ $restaurante->poblacion->poblacion }}</p>
                                        <p><i class="fa-solid fa-phone" style="color: #000000;"></i>
                                            {{ $restaurante->telefono }} </p>
                                        <p>
                                        <div><i class="fa-solid fa-clock" style="color: #000000;"> </i> Horario:</div>
                                        {!! $restaurante->horario !!}
                                        </p>
                                        <p><i class="fa-solid fa-wheat-awn-circle-exclamation"
                                                style="color: #000000;"></i>
                                            El establecimiento @if (!$restaurante->gluten)
                                                no
                                            @endif cuenta con alimentos para personas intolerantes
                                            al gluten*
                                        </p>
                                        <p><i class="fa-solid fa-seedling" style="color: #000000;"></i>
                                            El establecimiento @if (!$restaurante->vegano)
                                                no
                                            @endif cuenta con alimentos para personas veganas*
                                        </p>
                                        <p><i class="fa-solid fa-globe" style="color: #000000;"></i>
                                            @if ($restaurante->web)
                                                {{ $restaurante->web }}
                                            @else
                                                El establecimiento no cuenta con página web
                                            @endif
                                        </p>
                                        <p><i class="fa-brands fa-instagram" style="color: #000000;"></i>
                                            @if ($restaurante->instagram)
                                                {{ $restaurante->instagram }}
                                            @else
                                                El establecimiento no cuenta con la red social de Instagram
                                            @endif

                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
        <p> * Para obtener una información más detallada de platos sin gluten y veganos, consultar con el
            establecimiento</p>
    </div>
</section>
