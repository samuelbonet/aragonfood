<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a href="{{ route('dashboard') }}" class="brand-link">
    <img src="{{ url('img/pagina/index/logo.png') }}" alt="" class="brand-image img-circle">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
       
        <li class="nav-item">
        <a href="{{ url('dashboard') }}"  class="nav-link">
            <i class="fa-solid fa-gauge" style="color: #ffffff;"></i> <p style="margin-left:12px">Dashboard</p>
            
        </a>
        </li>

        <li class="nav-item">
        <a href="{{ route('calendario') }}" class="nav-link">
            <i class="fa-solid fa-calendar-days" style="color: #ffffff;"></i> <p style="margin-left:12px">Calendario</p>
            
        </a>
        </li>

        <li class="nav-item">
        <a href="{{ route('comunidad') }}" class="nav-link">
          <i class="fa-solid fa-thumbs-up" style="color: #ffffff;"></i> <p style="margin-left:12px">Comunidad</p>
            
        </a>
        </li>

        <li class="nav-item">
        <a href="{{ route('perfil') }}" class="nav-link">
            <i class="fa-solid fa-user" style="color: #ffffff;"></i> <p style="margin-left:12px">Mi perfil</p>
            
        </a>
        </li>

        <li class="nav-item">
        <a href="{{ url('/') }}" class="nav-link">
            <i class="fa-solid fa-rotate-left" style="color: #ffffff;"></i> <p style="margin-left:12px">Volver a la aplicación</p>
            
        </a>
        </li>

<li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link">
            <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i> <p style="margin-left:12px">Cerrar sesión</p>
            
        </a>
        </li>
      
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
    <!-- /.sidebar -->
</aside>