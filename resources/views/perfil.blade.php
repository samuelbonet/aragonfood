<div class="profile-area ">
    <div class="container">
        <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card1 mx-auto">
                <div class="img1"><img src="img\dashboard\perfil\almond.jpg"></div>
                <div class="img2">   <img src="https://ui-avatars.com/api/?name={{urlencode(auth()->user()->name) }}&color=f9f9f9&background=red'" width="40" backgroun-color="red" class="rounded-circle"></div>
             <div class="main-text">
                <h3 class="profile-username text-center text-light">{{Auth::user()->name}}</h3>
                <h3 class="profile-username text-center text-light">{{Auth::user()->email}}</h3>
                <p class="profile-username text-center text-light"><i class="fa-solid fa-pencil" style="color: #ffffff;"></i> Cambiar contraseña</p>
            </div>
            </div>
             </div>
              </div>
               </div>
