@extends('template.layout')

@include('template.h-navbar')

@section('main')

<div class="page-banner bg-indigo">
  <div class="container">
    <h1>
      Instructores destacados.
    </h1>
  </div>
</div>

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
