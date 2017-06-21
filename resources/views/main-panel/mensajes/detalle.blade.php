<!-- Detalle de mensajes -->

@extends('template.layout')


@section('main')
  @include('template.h-navbar')
    {{-- @if(Auth::user()->id == $sala->usuario_amigo_id)
      {{$sala->user_creador->nombres}} {{$sala->user_creador->apellidos}}
    @else
          {{$sala->user_amigo->nombres}} {{$sala->user_amigo->apellidos}}
    @endif --}}

    {{-- <div class="row">
      @include('flash::message')
    </div> --}}
    {{-- <h3><a class="material-btn" href="{{route('salas.index')}}">< Salas</a>Enviar mensaje</h3> --}}
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3>
           @if(Auth::user()->id == $sala->usuario_amigo_id)
            <img class="rounded-circle" width="70" height="70" src="{{Storage::url($sala->user_creador->url_foto)}}" alt="foto de perfil"> {{$sala->user_creador->nombres}} {{$sala->user_creador->apellidos}}
          @else
            <img class="rounded-circle" width="70" height="70" src="{{Storage::url($sala->user_amigo->url_foto)}}" alt="foto de perfil de mi amigo"> {{$sala->user_amigo->nombres}} {{$sala->user_amigo->apellidos}}
          @endif
        </h3>
        <div class="chatroom">
          @if($mensajes)
            @foreach($mensajes as $mensaje)

            @if ($mensaje->usuario_id == Auth::user()->id)
              {{-- Derecha - Usuario yo --}}
              <div class="pop-chat active">
                <div class="bocadillo">
                  <p>
                    {{$mensaje->mensaje}}
                  </p>
                  <small>{{$mensaje->created_at}}</small>
                </div>
              </div>
            @else
            {{-- Derecha - Usuario distinto a yo --}}
            <div class="pop-chat">
              <div class="bocadillo">
                <p>
                  {{$mensaje->mensaje}}
                </p>
                <small>{{$mensaje->created_at}}</small>
              </div>
            </div>
            @endif
            @endforeach
            </div>
          @endif
        <!-- <p>{{$mensaje->mensaje}}</p> -->
        <!-- <small>Enviado por: {{$mensaje->user->nombres}}</small> -->
      </div>
    </div>
    {!!Form::open(['route'=>'mensajes.store', 'method'=>'POST'])!!}
    {!! Form::hidden('sala_id', $sala->id) !!}
    <div class="row justify-content-center mt-4">
      <div class="col-8">
        {!!Form::text('mensaje', $cad, ['id' => 'nombre', 'placeholder' => 'Escribir mensaje...', 'required', 'class' => 'material-input'])!!}
      </div>
      <div class="col-2">
        {!!Form::submit('Enviar', ['class'=>'material-btn btn-indigo'])!!}
      </div>
    </div>
    {!!Form::close()!!}
  </div>
@endsection

@section('js')
  <script type="text/javascript">
    let scroll = document.querySelector('.chatroom');
    scroll.scrollTop = scroll.scrollHeight;
  </script>
@endsection
