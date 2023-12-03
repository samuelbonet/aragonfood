<div class="login-box">
    <div class="login-logo">
        <div>Aragónfood</div>
    </div>
    <!-- /.login-logo -->
    @if (session('registrado'))
        <h4>{{ session('registrado') }}</h4>
    @endif
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Inicia sesión para acceder</p>

            <form action="{{ route('login.login') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Correo electrónico">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('login')
                    <div class="text-red">{{ $message }}</div>
                @enderror
                <div class="row justify-content-center mt-2">
                    <div class="col-4">
                        <input type="submit" class="btn btn-dark btn-block btn-sm">
                    </div>
                    <!-- /.col -->
                </div>
            </form>



            <p class="mb-1">
                <a href="{{ route('reset-password') }}">He olvidado mi contraseña</a>
            </p>
            <p class="mb-0">
                <a href="register" class="text-center">Registrarse</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>


</body>
