@extends('template.layout')

@include('template.h-navbar')

@section('main')
<!-- Mostrar listado de categorias iniciales para que el usuario haga primeros pasos -->

<div class="container">
  <div class="row">
    <h1>Primeros pasos</h1>
    <h3>Selecciona algunos de tus intereses para comenzar</h3>
  </div>
  <div class="row">
    @foreach($categorias as $categoria)
    <div class="col-xs-12 col-md-4">
      <div class="card" style="width: 20rem;">
        <!-- <div class="card-img-top" style="padding: 20px;">
          <h1>HOla</h1>
        </div> -->
        <div class="card-block">
          <h4 class="card-title"><span class="badge badge-default">{{$categoria->descripcion}}</span></h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          {!!Form::open(['route'=>'categoria-usuario.store', 'method' => 'POST'])!!}
          {!!Form::hidden('categoria_id', $categoria->id)!!}
          {!!Form::submit('Seguir', ['class'=>'btn btn-primary'])!!}
          {!!Form::close()!!}
        </div>
      </div>
    </div>

    @endforeach

  </div>
  <div class="row">
    <a href="{{route('main-panel')}}" class=" btn btn-danger btn-block">Saltar este paso</a>
  </div>
</div>
@endsection
