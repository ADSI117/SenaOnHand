@extends('template.layout')


@section('main')
@include('template.h-navbar')

<div class="page-banner bg-indigo">
  <div class="container">
    <h1>
      @if($publicaciones->count() == 0 && $usuarios->count() == 0)
        (0) Resultados de búsqueda para [{{$query}}]
      @else
        Resultados de búsqueda para [{{$query}}]
      @endif

    </h1>
  </div>
</div>

@if($publicaciones->count() >0 )
<div class="container">
  <h3>({{$publicaciones->count()}}) Publicaciones</h3>
  <br>
  <div class="row justify-content-center">

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
</div>

@endif

@if($usuarios->count() > 0)
<div class="container">
  <h3>({{$usuarios->count()}}) Usuarios</h3>
  <br>
  <div class="row justify-content-center">

    @foreach($usuarios as $usuario)
    <div class="col-xs-12 col-sm-10 col-md-6 col-lg-4">
      <div class="tarjeta">
        <h4 class="cabezera">
          <a href="{{route('instructores.show', [$usuario->id])}}">{{$usuario->nombres}} {{$usuario->apellidos}}</a>
          <small class="text-muted">
            <a href="{{route('instructores.show', [$usuario->id])}}">
              {{$usuario->email}}
            </a>
          </small>

          <div class="imagen">
            <img src="{{Storage::url($usuario->url_foto)}}" class="rounded-circle" width="60" height="60">
          </div>
        </h4>


        <div class="contenido">
          <p>{{$usuario->perfil}}</p>
        </div>

      </div>
    </div>
    @endforeach

  </div>
</div>
@endif


@endsection
