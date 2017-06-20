@extends('template.layout')


@section('main')
  @include('template.h-navbar')

<div class="page-banner bg-indigo">
  <div class="container">
    <h1>
      Últimas publicaciones
    </h1>
  </div>
</div>

<div class="container">
  <div class="row justify-content-center">
    {{-- <div class="col"> --}}

      @foreach($publicaciones as $publicacion)
      <div class="col-xs-12 col-sm-10 col-md-6 col-lg-4">
        <div class="tarjeta">
          <h4 class="cabezera">
            <a href="{{route('publicaciones.show', [$publicacion->id])}}">{{$publicacion->titulo}}</a>
            <small class="text-muted">
              <a href="{{route('instructores.show', [$publicacion->user_id])}}">
                {{$publicacion->nombres}} {{$publicacion->apellidos}}
              </a>
            </small>

            <div class="imagen">
              <img src="{{Storage::url($publicacion->url_foto)}}" class="rounded-circle" width="60" height="60">
            </div>
          </h4>


          <div class="contenido">
            <p>{{substr($publicacion->contenido, 0, 140)}} ... </p>
          </div>

        </div>
      </div>
      @endforeach

    </div>
    <div class="row mt-3">
      <div class="col">
        <div class="text-center">{{ $publicaciones->links('vendor.pagination.custom') }}</div>
      </div>
    </div>

  </div>
</div>

@if ($publicaciones->count() < 20)
<div class="container">
  <div class="row">
    <h4>Para ver más contenido, sigue más categorias</h4>
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

</div>
@endif


@endsection
