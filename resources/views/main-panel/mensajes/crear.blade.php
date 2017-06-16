@extends('template.layout')

@include('template.h-navbar')

@section('main')
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12">
        <h3>Enviar mensaje</h3>

        {!!Form::open(['route'=>'mensajes.store', 'method'=>'POST'])!!}

        <div class="form-group">
          {!!Form::label('A quien?')!!}
          <!-- {!!Form::select('usuario_amigo_id', $usuarios, null,['class' => 'form-control', 'required'])!!} -->
          <select class="form-control" name="usuario_amigo_id">
            @foreach($usuarios as $usuario)
              <option value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}} [ {{$usuario->email}}]</option>
            @endforeach
          </select>
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
