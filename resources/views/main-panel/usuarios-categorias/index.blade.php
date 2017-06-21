@extends('template.layout')

@include('template.h-navbar')

@section('main')
<!-- Mostrar listado de categorias iniciales para que el usuario haga primeros pasos -->
<div class="page-banner bg-indigo">
  <div class="container">
    <h1>
      Sigue más categorias
    </h1>
  </div>
</div>

<div class="container">

  <div class="row">
    @foreach($categorias as $categoria)
    <div class="col-xs-12 col-md-4">
      <div class="card" style="width: 20rem;">
        <!-- <div class="card-img-top" style="padding: 20px;">
          <h1>HOla</h1>
        </div> -->
        <div class="card-block">
          <h4 class="card-title"><span class="badge badge-default">{{$categoria->nombre}}</span></h4>
          <p class="card-text">{{$categoria->descripcion}}</p>
          {!!Form::open(['route'=>'categoria-usuario.store', 'method' => 'POST'])!!}
          {!!Form::hidden('categoria_id', $categoria->id)!!}
          {!!Form::submit('Seguir', ['class'=>'btn btn-primary'])!!}
          {!!Form::close()!!}
        </div>
      </div>
    </div>

    @endforeach

  </div>
  <div class="row mt-3">
    <div class="col">
      <div class="text-center">{{ $categorias->links('vendor.pagination.custom') }}</div>
    </div>
  </div>
  <!-- <div class="row">
    <a href="{{route('main-panel')}}" class=" btn btn-danger btn-block">Saltar este paso</a>
  </div> -->
</div>
@endsection
