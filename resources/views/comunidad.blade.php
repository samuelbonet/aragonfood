

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="timeline">
                @foreach ($data as $dia => $mensajes_dia)
                    <!-- timeline time label -->
                    <div class="time-label">
                        <span class="bg-red">{{ $dia }}</span>
                    </div>
                    <!-- /.timeline-label -->
                    
                    @foreach ($mensajes_dia as $mensaje)
                        <div>
                            <img class="fas" src="https://ui-avatars.com/api/?name={{ $mensaje->usuario->name }}&color=f9f9f9&background=323e62'" width="30" class="rounded-circle ">
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i> {{ $mensaje->created_at->format('H:i')}}</span>
                                <h3 class="timeline-header">{{ $mensaje->usuario->name }}</h3>
                                <div class="timeline-body">
                                    {!! $mensaje->mensaje !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
                

                <!-- Agrega aquí tu recuadro para poner información y subirla -->
                <div>
                    <div class="timeline-item">
                        
                        <h3 class="timeline-header">Añadir una nueva publicación</h3>
                        <div class="timeline-body">
                            <form method="post" action="{{ route('comunidad.enviar')}}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="mensaje" id="mensaje"></textarea>
                                    @error('mensaje')
                                        <div class="text-red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Subir</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Fin del recuadro para poner información -->

                <!-- Agrega más elementos del timeline según sea necesario -->

       
            </div>
        </div>
    </div>
</div>

