@extends('template.layout')

@include('template.h-navbar')

@section('main')
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6">
        <h2>Mis categorias</h2>

        @foreach($usuario->categorias as $categoria)
          {{ Form::open(['method' => 'DELETE', 'route' => ['categoria-usuario.destroy', $categoria->id]]) }}
          <a href="#">{{$categoria->descripcion}}</a>
          {!!Form::submit('Sejar de seguir', ['class'=>'btn btn-warning'])!!}
          {{ Form::close() }}
        @endforeach

      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-md-6">
        <h2>Instructores</h2>

        @foreach($usuario->seguidos as $seguido)
          {{ Form::open(['method' => 'DELETE', 'route' => ['seguidos.destroy', $seguido->id]]) }}
          @if($seguido->seguido->url_foto)
            <img src="{{url('/')}}/imagenes/perfiles/{{$seguido->seguido->url_foto}}" alt="" width="50" height="50">
          @else
            <img src="{{url('/')}}/imagenes/perfiles/soh_profile_default.png" alt="" width="50" height="50">
          @endif
          <a href="#">{{$seguido->seguido->nombres}} {{$seguido->seguido->apellidos}}</a>

          {!!Form::submit('Sejar de seguir', ['class'=>'btn btn-warning'])!!}
          {{ Form::close() }}
        @endforeach
      </div>
    </div>
  </div>
@endsection
