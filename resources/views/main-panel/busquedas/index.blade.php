@extends('template.layout')

@include('template.h-navbar')

@section('main')

<div class="page-banner bg-indigo">
  <div class="container">
    <h1>
      Resultados de búsqueda
    </h1>
  </div>
</div>

<div class="container">
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



@endsection
