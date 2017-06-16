<!-- Detalle de mensajes -->

@extends('template.layout')

@include('template.h-navbar')

@section('main')
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12">
        <h3>Mensajes</h3>
        <div  class="alert alert-success" role="alert">
          <table class="table">
            @foreach($sala->mensajes as $mensaje)
            <tr>
              <td>
                <small>{{$mensaje->user->nombres}} dice: </small>
                {{$mensaje->mensaje}}
              </td>
            </tr>
            @endforeach
          </table>
        </div>
        <!-- <p>{{$mensaje->mensaje}}</p> -->
        <!-- <small>Enviado por: {{$mensaje->user->nombres}}</small> -->
      </div>
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
@endsection
