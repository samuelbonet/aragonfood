<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: #ffffff"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
       <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="{{ route('logout') }}" role="">
          
        </a>
      </li>

      <li class="nav-item dropdown user-menu">
        
         <img src="https://ui-avatars.com/api/?name={{urlencode(auth()->user()->name) }}&color=f9f9f9&background=323e62'" width="30" class="rounded-circle ">
          <span class="d-none d-md-inline text-light"> Bienvenido, {{Auth::user()->name}}</span>
      
        
      </li>
    </ul>
  </nav>