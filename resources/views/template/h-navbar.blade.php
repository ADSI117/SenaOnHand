

  @if (Auth::user()->rol_id == 3)
    <nav class="navbar navbar-toggleable-md bg-info m-0 p-0">
  @else
    <nav class="navbar navbar-toggleable-md bg-teal p-0">
  @endif
      <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
   	      <span class="navbar-toggler-bar bar1"></span>
    	    <span class="navbar-toggler-bar bar2"></span>
    	    <span class="navbar-toggler-bar bar3"></span>
     	  </button>
        @if (!Auth::guest())
          <a class="navbar-brand" href="{{route('main-panel')}}" >
        @else
          <a class="navbar-brand" href="{{ url('/') }}">
        @endif
          {{ config('app.name', 'SenaOnHand') }}
        </a>

        <div class="collapse navbar-collapse" id="navigation">

          <ul class="navbar-nav nav-ul">
            <li class="nav-item pl-5 pr-2 d-flex align-items-center">

              {!!Form::open(['route' => 'busquedas.index', 'method'=> 'GET'])!!}
                <div class="input-group form-group-no-border m-0">
                  <span class="input-group-addon">
                    <i class="fa fa-search"></i>
                  </span>
                  <input name= 'filtro' class="form-control" type="search" placeholder="Buscar...">
                </div>
              {!!Form::close()!!}
            </li>
            @if (Auth::user()->rol_id == 2)
              <li class="nav-item">
                <a class="nav-link" href="{{route('publicaciones.create')}}">
                  Publicar
                </a>
              </li>
            @endif
              <li class="nav-item">
                <a class="nav-link"  href="{{route('categoria-usuario.index')}}" >Explorar</a>
              </li>
          </ul>

    	    <ul class="navbar-nav">
            @if (!Auth::guest())
            <li class="nav-item">
              <a class="nav-link" href="{{route('mensajes.create')}}">
                Nuevo mensaje
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link notify" href="{{ route('notificaciones.index') }}" data-badge="{{Auth::user()->unreadNotifications->count()}}">
                <i class="fa fa-bell"></i>
              </a>
            </li>

              <li class="nav-item">
                @if(Auth::user()->url_foto)
                  <img src="{{Storage::url(Auth::user()->url_foto)}}" alt="" class="rounded white" width="45">
                @else
                  <img src="{{Storage::url('soh_profile_default.png')}}" alt="" class="rounded white" width="45">
                @endif
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="userSetting" aria-expanded="false">
                  <i class="now-ui-icons ui-1_settings-gear-63" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <span class="dropdown-header black text-center">{{Auth::user()->nombres}} {{Auth::user()->apellidos}}</span>
                  @if(Auth::user()->url_foto)
                    <img src="{{Storage::url(Auth::user()->url_foto)}}" alt="" class="rounded-0 white">
                  @else
                    <img src="{{Storage::url('soh_profile_default.png') }}" alt="" class="rounded-0 white">
                  @endif
                  <a class="dropdown-header">Configuración</a>
                  <a class="dropdown-item"  href="{{route('salas.index')}}" >Chats</a>
                  <a class="dropdown-item"  href="{{route('usuarios.edit', Auth::user()->id)}}" >Editar perfil</a>
                  <a class="dropdown-item"  href="{{route('suscripciones.index')}}" >Mis suscripciones</a>
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
</nav>
