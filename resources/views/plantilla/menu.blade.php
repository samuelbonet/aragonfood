<!--Menu de la plantilla-->
<ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a href="{{url("/")}}" class="nav-link">Inicio</a>
    </li>
    <li class="nav-item">
        <a href="{{route("restaurantes")}}" class="nav-link">Restaurantes</a>
    </li>
    <li class="nav-item">
        <a href="{{route("blog")}}" class="nav-link">Blog</a>
    </li>
    <li class="nav-item">
        <a href="{{route("contacto")}}" class="nav-link">Contacto</a>
    </li>
    <li class="boton">
        @if (Auth::check())
            <div class="d-flex align-items-center">
                <a href="{{route("dashboard")}}" class="btn btn-outline-light text-light" role="button">👋🏻 {{Auth::user()->name}}</a>
                <a href="{{route("logout")}}" class="btn btn-outline-light text-light ml-2" role="button">Cerrar sesión</a>
            </div>
        @else
            <a href="{{route("login")}}" class="btn btn-outline-light text-light" role="button">Inicia sesión</a>
        @endif
    </li>
</ul>
