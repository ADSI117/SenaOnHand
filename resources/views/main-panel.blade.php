@extends('template.layout')

@include('template.h-navbar')

@section('main')
  <div class="row justify-content-center">
    {{-- <div class="col"> --}}

      @foreach($publicaciones as $publicacion)

        <div class="tarjeta">
          <h4 class="cabezera">
            <a href="{{route('publicaciones.show', [$publicacion->id])}}">{{$publicacion->titulo}}</a>
            <small class="text-muted">
              <a href="{{route('instructores.show', [$publicacion->user_id])}}">
                {{$publicacion->user->nombres}} {{$publicacion->user->apellidos}}
              </a>
            </small>

            <div class="imagen">
              <img src="/imagenes/perfiles/{{$publicacion->user->url_foto}}" class="rounded-circle" width="60" height="60">
            </div>
          </h4>


          <div class="contenido">
            <p>{{substr($publicacion->contenido, 0, 140)}} ... </p>
          </div>

        </div>
      @endforeach
    {{-- </div> --}}


  </div>
@endsection
