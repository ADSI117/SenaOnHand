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
  <div class="row justify-content-center">
    <div class="col">
      <h3>({{$publicaciones->count()}}) Publicaciones</h3>
    </div>
    <div class="w-100"></div>
    @foreach($publicaciones as $publicacion)
    <div class="col-xs-12 col-sm-10 col-md-6 col-lg-4">
      <div class="mdcard radius shadowDepth1">
          <div class="mdcard__image border-tlr-radius bg-indigo">
              {{-- <img src="http://lorempixel.com/400/200/sports/" alt="image" class="border-tlr-radius"> --}}
          </div>

          <div class="mdcard__content mdcard__padding">
              <div class="mdcard__share">
                  <div class="mdcard__social">
                      <a class="share-icon facebook" href="#"><span class="fa fa-facebook"></span></a>
                      <a class="share-icon twitter" href="#"><span class="fa fa-twitter"></span></a>
                      <a class="share-icon googleplus" href="#"><span class="fa fa-google-plus"></span></a>
                  </div>

                  <a id="share" class="share-toggle share-icon" href="#"></a>
              </div>

              <div class="mdcard__meta">
                  <a href="#">
                    Nombre Categoria
                    {{-- {{$publicacion->cat_nombre}} --}}
                  </a>
                  <time>{{$publicacion->created_at}}</time>
              </div>

              <article class="mdcard__article">
                  <h4><a href="{{route('publicaciones.show', [$publicacion->id])}}">{{$publicacion->titulo}}</a></h4>

                  <p>{!!substr($publicacion->contenido, 0, 140)!!} ...</p>
              </article>
          </div>

          <div class="mdcard__action">

              <div class="mdcard__author">
                  <img src="{{Storage::url($publicacion->url_foto)}}" alt="author" width="50" height="50">
                  <div class="mdcard__author-content">
                      Por <a href="{{route('instructores.show', [$publicacion->user_id])}}">{{$publicacion->nombres}} {{$publicacion->apellidos}}</a>
                  </div>
              </div>
          </div>
      </div>
    </div>
    @endforeach

  </div>
</div>

@endif

@if($usuarios->count() > 0)
<div class="container">
  <div class="row justify-content-center">
    <div class="col">
      <h3>({{$usuarios->count()}}) Usuarios</h3>
    </div>
    <div class="w-100"></div>
    @foreach($usuarios as $usuario)
    <div class="col-xs-12 col-sm-6 col-lg-4">
        <a href="{{route('instructores.show', [$usuario->id])}}" class="material-card">
          <small class="content-date"><i class="fa fa-clock-o mr-2"></i> {{$usuario->rol}}</small>
          <div class="material-card-header">
            <img src="{{Storage::url($usuario->url_foto)}}"  alt="">
            <div class="content-header-title">
              <h5  class="header--title">{{$usuario->nombres}} {{$usuario->apellidos}}</h5>
              <small>{{$usuario->email}}</small>
            </div>
          </div>
          <p>
            <!-- {{$usuario->perfil}} -->
          </p>
        </a>
    </div>
    @endforeach
  </div>
</div>
@endif


@endsection
