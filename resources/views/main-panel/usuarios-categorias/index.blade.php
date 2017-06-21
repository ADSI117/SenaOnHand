@extends('template.layout')


@section('main')
  @include('template.h-navbar') 
<!-- Mostrar listado de categorias iniciales para que el usuario haga primeros pasos -->
<div class="page-banner bg-indigo">
  <div class="container">
    <h1>
      Sigue más categorías
    </h1>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      @include('flash::message')
    </div>
  </div>
</div>

<div class="container">


  <div class="row">
    @foreach($categorias as $categoria)
    <div class="col-xs-12 col-md-4">
      {!!Form::open(['route'=>'categoria-usuario.store', 'method' => 'POST', 'class' => 'material-card__big'])!!}
        {!!Form::hidden('categoria_id', $categoria->id)!!}
        <div class="card-header__image" style="background-image: url({{Storage::url($categoria->url_imagen)}})">
          <h2 class="card-header__titulo"><a href="#">{{$categoria->nombre}}</a></h2>
        </div>
        <p class="card__text">
          {{$categoria->descripcion}}
        </p>
        <div class="card__action-bar">
          {!!Form::submit('Seguir', ['class' => 'card__button'])!!}
        </div>
      {!!Form::close()!!}
    </div>
    @endforeach

  </div>
  
  <!-- <div class="row">
    <a href="{{route('main-panel')}}" class=" btn btn-danger btn-block">Saltar este paso</a>
  </div> -->
</div>
@endsection
