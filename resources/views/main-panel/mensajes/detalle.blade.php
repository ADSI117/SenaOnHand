<!-- Detalle de mensajes -->

@extends('template.layout')

@include('template.h-navbar')

@section('main')
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
            <img src="{{$sala->user_creador->url_foto}}" alt="foto de perfil"> {{$sala->user_creador->nombres}} {{$sala->user_creador->apellidos}}
          @else
            <img src="{{$sala->user_amigo->url_foto}}" alt="foto de perfil de mi amigo"> {{$sala->user_amigo->nombres}} {{$sala->user_amigo->apellidos}}
          @endif
        </h3>
        <div class="chatroom">
          @if($mensajes)
            <div class="list-group">
            @foreach($mensajes as $mensaje)

            @if ($mensaje->usuario_id == Auth::user()->id)
              {{-- Derecha - Usuario yo --}}
              <a href="#" class="list-group-item list-group-item-action flex-column align-items-end msg-activo">
                <p class="mb-1">
                  {{$mensaje->mensaje}}
                </p>
                <small>{{$mensaje->created_at}}</small>
              </a>

            @else
              {{-- Izquierda - Usuario amigo --}}
               <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <p class="mb-1">
                  {{$mensaje->mensaje}}
                </p>
                <small>{{$mensaje->created_at}}</small>
              </a>
            @endif
            @endforeach
            </div>
          @endif
        </div>
        <!-- <p>{{$mensaje->mensaje}}</p> -->
        <!-- <small>Enviado por: {{$mensaje->user->nombres}}</small> -->
      </div>

      <div class="w-100"></div>

      <div class="col">
        {!!Form::open(['route'=>'mensajes.store', 'method'=>'POST'])!!}
        <div class="form-group">
          {!! Form::hidden('sala_id', $sala->id) !!}
        </div>
        <div class="row mt-4">
          <div class="col-xs-6 col-md-9 col-lg-10">
            <input type="text" class="material-input" name="mensaje" placeholder="hola"/>
            {{-- {!!Form::text('mensaje', null, ['class' => 'material-input', 'placeholder' => 'Escribir mensaje...'])!!} --}}
            {{-- {!!$errors->first('mensaje', "<span class='help-block'>:message</span>")!!} --}}
          </div>
          <div class="col-xs-6 col-md-3 col-lg-2">
            {!!Form::submit('Enviar', ['class'=>'material-btn btn-indigo'])!!}
          </div>
        </div>

        {!!Form::close()!!}
      </div>
    </div>
  </div>
@endsection
