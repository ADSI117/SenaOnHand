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

                  <a id="share" class="share-toggle share-icon" href="whatsapp://send?text={{url('/main-panel/publicaciones')}}/{{$publicacion->id}}" data-action="share/whatsapp/share">

                  </a>
              </div>

              <div class="mdcard__meta">
                  <a href="#">{{$publicacion->cat_nombre}}</a>
                  <time>{{$publicacion->created_at}}</time>
              </div>

              <article class="mdcard__article">
                  <h4><a href="{{route('publicaciones.show', [$publicacion->id])}}">{{$publicacion->titulo}}</a></h4>

                  <p>{!!substr($publicacion->contenido, 0, 140) !!} ...</p>
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
  <div class="row mt-3">
    <div class="col">
      <div class="text-center">{{ $publicaciones->links('vendor.pagination.custom') }}</div>
    </div>
  </div>
</div>

@if ($publicaciones->count() < 20)
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
@endif


@endsection
