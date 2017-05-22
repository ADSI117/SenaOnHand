@extends('template.main')
@section('title','Categorias')

@section('navbar')
  @include('template.navbar')
@endsection


@section('title-content','Crear categoria')
@section('content')


  @if (count($errors) > 0)

    <div class="">
      <ul>
        @foreach($errors->all() as $error)

          <li> {{$error}}</li>

        @endforeach

      </ul>
    </div>
  @endif
  <div class="row middle-xs">
    <div class="col-xs">
      <div class="box">
        {!!Form::open(['route'=>'categorias.store','method'=>'POST'])!!}
        <div class="mdl-card mdl-shadow--2dp">
          <div class="mdl-card__supporting-text">
            {!!Form::label('descripcion','Categoría')!!}
            {!! Form::text('descripcion',null,['placeholder'=>'categoría','required'])!!}
          </div>
          <div class="mdl-card__actions">
            {!! Form::submit('Registrar',['class'=>''])!!}
          </div>
        </div>
        {!!Form::close() !!}
      </div>
    </div>
  </div>



@endsection
