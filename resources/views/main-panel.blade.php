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

                  <a id="share" class="share-toggle share-icon" href="#"></a>
              </div>

              <div class="mdcard__meta">
                  <a href="#">{{$publicacion->cat_nombre}}</a>
                  <time>{{$publicacion->created_at}}</time>
              </div>

              <article class="mdcard__article">
                  <h4><a href="{{route('publicaciones.show', [$publicacion->id])}}">{{$publicacion->titulo}}</a></h4>

                  <p>{{substr($publicacion->contenido, 0, 140)}} ...</p>
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
