

  @if (Auth::user()->rol_id == 3)
    <nav class="navbar navbar-toggleable-md bg-info p-0">
  @else
    <nav class="navbar navbar-toggleable-md bg-teal p-0">
  @endif

        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="true" aria-label="Toggle navigation">
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
            </div>
            <div class="navbar-collapse justify-content-end has-image collapse show" id="navigation" style="background: url(&quot;./assets/img/blurred-image-1.jpg&quot;) 0% 0% / cover;" aria-expanded="true">
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
              <li class="nav-item">
                <a class="nav-link"  href="{{route('inst-destacados.index')}}" >Destacados</a>
              </li>
          </ul>

    	    <ul class="navbar-nav no-mt">
            @if (!Auth::guest())
            <li class="nav-item">
              <a class="nav-link"  href="{{route('salas.index')}}" >
                <i class="fa fa-comments-o"></i>
              </a>
            </li>
            <li class="nav-item">
              {{-- {{route('mensajes.create')}} --}}
              <a class="nav-link" data-toggle="modal" data-target="#NewMessage" href="{{route('mensajes.create')}}">
                Nuevo mensaje
              </a>
            </li>
            {{-- notificaciones :enlace="{{ route('notificaciones.index') }}" --}}
            {{-- <notification :unread="{{ Auth::user()->unreadNotifications->count() }}" enlace="{{ route('notificaciones.index') }}" :userid="{{Auth::user()->id}}"></notification> --}}
              <li class="nav-item">
                @if (Auth::user()->unreadNotifications->count() > 0)
                <a class="nav-link notify active" id="notificaciones" href="{{ route('notificaciones.index') }}" data-badge="{{ Auth::user()->unreadNotifications->count() }}">
                @else
                <a class="nav-link notify" id="notificaciones" href="{{ route('notificaciones.index') }}" data-badge="{{ Auth::user()->unreadNotifications->count() }}">
                @endif
                    <i class="fa fa-bell"></i>
                </a>
              </li>
              <li class="nav-item">
                @if(Auth::user()->url_foto)
                  <img src="{{Storage::url(Auth::user()->url_foto)}}" alt="" class="rounded img-fluid hidden-md-down white" width="45" height="45">
                @else
                  <img src="{{Storage::url('soh_profile_default.png')}}" alt="" class="rounded img-fluid hidden-md-down white" width="45" height="45">
                @endif
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="userSetting" aria-expanded="false">
                  <i class="now-ui-icons ui-1_settings-gear-63" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <span class="dropdown-header black text-center">{{Auth::user()->nombres}} {{Auth::user()->apellidos}}</span>
                  @if(Auth::user()->url_foto)
                    <img src="{{Storage::url(Auth::user()->url_foto)}}" alt="" class="rounded-0 hidden-md-down white">
                  @else
                    <img src="{{Storage::url('soh_profile_default.png') }}" alt="" class="rounded-0 hidden-md-down white">
                  @endif
                  <a class="dropdown-header">Configuración</a>
                  

                  <a class="dropdown-item"  href="{{route('seguidores.index')}}" >Seguidores</a>
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


    {{-- <div class="modal fade" id="NewMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>
          <div class="modal-body">
            Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-info btn-simple">Save</button>
          </div>
        </div>
      </div>
    </div> --}}
