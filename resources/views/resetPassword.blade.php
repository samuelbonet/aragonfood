 <div class="resetPassword">
  <div class="container">
        <div class="row ">
            <div class="col-md-6">
                <div class="login-box">
                    <div class="login-logo">
                        <div>Aragónfood</div>
                    </div>
                    @if (session('registrado'))
                    <h4>{{ session('registrado')}}</h4>
                    @endif
                    <div class="card">
                        <div class="card-body login-card-body">
                            <p class="login-box-msg">Restablecer contraseña</p>

                            <form action="{{ route('reset-password-email') }}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" name="email" class="form-control" placeholder="Correo electrónico">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>

                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="row justify-content-center mt-2">
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-dark btn-block" value="Restablecer ">
                                    </div>
                                </div>
                            </form>

                            <p class="mb-1">
                                <a href="{{route('login')}}">Volver al inicio de sesión</a>
                            </p>
                            <p class="mb-0">
                                <a href="{{route('register')}}" class="text-center">Registrarse</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>