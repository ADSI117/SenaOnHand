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
  <br>
  <div class="row justify-content-center">
    <div class="col">
      <h3>({{$usuarios->count()}}) Usuarios</h3>
    </div>
    <div class="w-100"></div>
    @foreach($usuarios as $usuario)
    <div class="col-xs-12 col-sm-10 col-md-6 col-lg-4">

      <a href="{{route('instructores.show', [$usuario->id])}}" class="material-card">
        <div class="material-card-header">
          <img src="{{Storage::url($usuario->url_foto)}}"  alt="">
          <div class="content-header-title">
            <h5  class="header--title">{{$usuario->nombres}} {{$usuario->apellidos}}</h5>
            <small>{{$usuario->email}}</small>
          </div>

        </div>

      </a>
      <p class="text-center">
        {{$usuario->perfil}}
      </p>

      {{-- <div class="tarjeta">
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
      </div> --}}

    </div>
    @endforeach

  </div>
</div>
@endif


@endsection
