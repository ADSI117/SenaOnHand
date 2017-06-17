<!-- Detalle de mensajes -->

@extends('template.layout')

@include('template.h-navbar')

@section('main')
<div class="page-banner bg-indigo">
  <div class="container">

      @if(Auth::user()->id == $sala->usuario_amigo_id)
      <h3 class="list-group-item-heading">Mensajes con </h3>
        <small>
        {{$sala->user_creador->nombres}} {{$sala->user_creador->apellidos}}
        </small>
      @else
        <h3 class="list-group-item-heading">Mensajes con </h3>
          <small>
            {{$sala->user_amigo->nombres}} {{$sala->user_amigo->apellidos}}
          </small>
      @endif

  </div>
</div>

  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12">
        <h3>Enviar mensaje</h3>

        {!!Form::open(['route'=>'mensajes.store', 'method'=>'POST'])!!}

        <div class="form-group">
          {!! Form::hidden('sala_id', $sala->id) !!}
        </div>


        <div class="form-group {{$errors->has('mensaje' ? 'has-error' : '')}}">
          {!!Form::textarea('mensaje', null, ['class'=>'', 'placeholder'=> 'Nuevo mensaje...'])!!}
          {!!$errors->first('mensaje', "<span class='help-block'>:message</span>")!!}
        </div>

        <div class="form-group">
          {!!Form::submit('Enviar', ['class'=>'form-control btn btn-primary'])!!}
        </div>

        {!!Form::close()!!}
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12">
        <h3>Últimos mensajes</h3>
            @foreach($sala->mensajes as $mensaje)
            <!-- <tr>
              <td>
                <small>{{$mensaje->user->nombres}} dice: </small>
                {{$mensaje->mensaje}}
              </td>
            </tr> -->
            <div class="list-group">
              <div class="list-group-item">

                <!-- <h4 class="list-group-item-heading"></h4> -->
                <!-- <br> -->
                <p class="list-group-item-text">
                  Fecha: {{$mensaje->created_at}} {{$mensaje->user->nombres}} dice: {{$mensaje->mensaje}}
                </p>
              </div>
            </div>
            @endforeach

        </div>
        <!-- <p>{{$mensaje->mensaje}}</p> -->
        <!-- <small>Enviado por: {{$mensaje->user->nombres}}</small> -->
      </div>
    </div>
  </div>
@endsection
