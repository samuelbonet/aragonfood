<!--Cambiar datos personales del perfil-->
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
                             <p class="login-box-msg">Cambiar datos personales</p>

                             <form action="{{ route('perfil.cambiar-datos-post') }}"
                                 method="POST">
                                 @csrf

                                <div class="form-group mb-3">
                                    <label>Nombre de usuario</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') ?? $data->name}}">
                                    @error('name')
                                        <div class="text-red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Correo electrónico</label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') ?? $data->email}}">
                                    @error('email')
                                        <div class="text-red">{{ $message }}</div>
                                    @enderror
                                </div>
                                 
                                 <div class="row justify-content-center mt-2">
                                     <div class="col-6">
                                         <input type="submit" class="btn btn-dark btn-block btn-sm"
                                             value="Actualizar datos">
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