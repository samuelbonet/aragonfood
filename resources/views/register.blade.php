<!--Formulario de registro-->
<div class="register-box ">
  <div class="register-logo  text-center">
    <a href="" class="text-center">Aragónfood</a>
  </div>

  <div class="card ">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Regístrate como nuevo usuario</p>

      <form action="{{ route('register.form') }}" method="post">
     
        @csrf
        <div class="form-group mb-3">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Nombre de usuario" name="name" value="{{ old("name")}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @error('name')
              <div class="text-red">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group mb-3">
          <div class="input-group">
            <input type="email" class="form-control" placeholder="Correo electrónico" name="email" value="{{ old("email")}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @error('email')
              <div class="text-red">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="form-group mb-3">
          <div class="input-group">
            <input type="password" class="form-control" placeholder="Contraseña" name= "password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
              <div class="text-red">{{ $message }}</div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirmar contraseña" name= "password_confirmation">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>
       
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-dark btn-block btn-sm">Registrarse</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="login" class="text-center">Ya tengo cuenta</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>