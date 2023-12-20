
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-md-6 d-flex justify-content-center">
                 <div class="login-box">
                     <div class="login-logo">
                         <div>Aragónfood</div>
                     </div>
                     <!-- /.login-logo -->

                     <div class="card">
                         <div class="card-body login-card-body">
                             <p class="login-box-msg">Cambiar contraseña</p>

                             <form action="{{ route('perfil.reset-password-post') }}"
                                 method="POST">
                                 @csrf

                                 <div class="input-group mb-3">
                                     <input type="password" name="password" class="form-control"
                                         placeholder="Nueva contraseña">
                                     <div class="input-group-append">
                                         <div class="input-group-text">
                                             <span class="fas fa-lock"></span>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="input-group mb-3">
                                     <input type="password" name="password_confirmation" class="form-control"
                                         placeholder="Repetir contraseña">
                                     <div class="input-group-append">
                                         <div class="input-group-text">
                                             <span class="fas fa-lock"></span>
                                         </div>
                                     </div>
                                 </div>
                                 @error('password')
                                     <div class="text-red">{{ $message }}</div>
                                 @enderror
                                 <div class="row justify-content-center mt-2">
                                     <div class="col-6">
                                         <input type="submit" class="btn btn-dark btn-block btn-sm"
                                             value="Cambiar contraseña">
                                     </div>
                                     <!-- /.col -->
                                 </div>
                             </form>

                            
                         </div>
                         <!-- /.login-card-body -->
                     </div>
                 </div>
             </div>
         </div>
     </div>
