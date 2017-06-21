@extends('template.layout')


@section('main')
@include('template.h-navbar')
  <div class="container" style="height: 80vh">
    <div class="row justify-content-center">
      <div class="col-xs-10 col-md-6 col-lg-4">
        {!!Form::open(['route'=>'mensajes.store', 'method'=>'POST'])!!}
        <h3>Enviar mensaje</h3>


        <div class="form-group">
          {!!Form::label('A quien?')!!}
          <!-- {!!Form::select('usuario_amigo_id', $usuarios, null,['class' => 'form-control', 'required'])!!} -->
          <select class="form-control chosen-select" name="usuario_amigo_id">
            @foreach($usuarios as $usuario)
              <option value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}} [ {{$usuario->email}}]</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          {!!Form::text('mensaje', null, ['class'=> 'material-input', 'placeholder'=> 'Escribir mensaje...', 'required'])!!}
        </div>

        <div class="form-group text-right">
          {!!Form::submit('Enviar', ['class'=>'material-btn btn-indigo'])!!}
        </div>

        {!!Form::close()!!}
      </div>
    </div>
  </div>
@endsection
