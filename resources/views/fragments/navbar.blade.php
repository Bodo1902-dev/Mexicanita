<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><i class="fa-sharp fa-solid fa-shop fa-lg" style="color: #ff1900;"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">Dulces La Mexicanita</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dulces
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('products.create')}}">Registrar</a></li>
              <li><a class="dropdown-item" href="{{route('products.index')}}"><i class="fa-sharp fa-solid fa-cart-shopping fa-lg" style="color: #63E6BE;"></i> Inventario</a></li>
              <li><a class="dropdown-item" href="#">Marcas</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Clientes
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Nuevo</a></li>
              <li><a class="dropdown-item" href="#">Agenda</a></li>
              <li><a class="dropdown-item" href="#">
                <i class="fa-sharp fa-solid fa-location-dot fa-lg" style="color: #63E6BE;"></i> Direcciones</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ventas
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Registrar</a></li>
              <li><a class="dropdown-item" href="#">Salidas</a></li>
            </ul>
          </li>
        </ul>
                  {{--  Configuracion de inicio de sesion  --}}

                  @if(auth()->user()!=null)
                {{-- when  login  --}}
                  <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">

                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{auth()->user()->name}}
                      </a>

                      <ul class="dropdown-menu">

                        <li>
                          <form action="{{route('logout')}}" method="POST">
                            @csrf
                          <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                                                                        this.closest('form').submit();">
                            Cerrar Sesion
                          </a>

                        </form>
                        </li>
                      </ul>
                    </li>

                  </ul>



                  @else
                    {{--when  logout  --}}
                  <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                   <a class="nav-link active" aria-current="page" href="{{route('register')}}">Registrar</a>
                 </li>

                 <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{'login'}}">Login</a>
                </li>
              </ul>
              @endif
              {{--  termina inicio de sesion  --}}
      </div>
    </div>
  </nav>