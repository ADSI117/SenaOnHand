@if (Auth::user()->rol_id == 3)
  <nav class="navbar navbar-toggleable-md bg-info m-0 p-0">
@else
  <nav class="navbar navbar-toggleable-md bg-info p-0">
@endif
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </button>

      <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'SenaOnHand') }}
      </a>


      <div class="collapse navbar-collapse" id="navigation">
        <div class="d-flex justify-content-start">
          <form class="form-inline d-flex align-items-center m-0">
            <div class="input-group form-group-no-border m-0">
              <span class="input-group-addon">
                <i class="fa fa-search"></i>
              </span>
              <input class="form-control" type="search" placeholder="Buscar...">
            </div>
          </form>
        </div>
        <div class="d-flex justify-content-end align-items-center">
          <ul class="navbar-nav">
            @if (Auth::user()->rol_id == 2)
            <li class="nav-item d-flex align-items-center pl-1">
              <a href="{{route('publicaciones.create')}}" class="nav-link">Publicar</a>
            </li>
            @endif
            @if (!Auth::guest())
              <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="userSetting" aria-expanded="false">
                  @if(Auth::user()->url_foto)
                    <img src="/imagenes/perfiles/{{Auth::user()->url_foto}}" alt="" class="rounded-circle white" width="40" height="40">
                  @else
                    <img src="/imagenes/perfiles/soh_profile_default.png" alt="" class="rounded-circle white" width="40" height="40">
                  @endif
                  <i class="now-ui-icons ui-1_settings-gear-63" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-header">Configuración</a>
                  <a class="dropdown-item"  href="{{route('usuarios.edit', Auth::user()->id)}}" >Editar perfil</a>
                  <div class="divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Salir
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </nav>
