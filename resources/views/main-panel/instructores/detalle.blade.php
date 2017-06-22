@extends('template.layout')


@section('main')
@include('template.h-navbar')

  <div class="container">

    <div class="row">
      <div class="col text-right">
        {!!Form::open(['route'=>'seguidos.store','method'=>'POST', 'class' => 'text-right'])!!}
        {!!Form::hidden('seguir_id', $instructor->id)!!}
        {!!Form::submit('Seguir', ['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
      </div>

      <div class="w-100"></div>

      <div class="col-xs-10 col-md-4 col-lg-3">
        <div class="card">
          <div class="card-header">Foto de perfil</div>
          <img class="card-img-top img-fluid" src="{{Storage::url($instructor->url_foto )}}" alt="Card image cap">
          <div class="p-4">
            <h6>Correo</h6>
            <a href="mail:to">{{$instructor->email}}</a>
          </div>
        </div>
      </div>

      <div class="col-xs-10 col-md-8 col-lg-9">
        <h4 class="display-4">
          {{$instructor->nombres}} {{$instructor->apellidos}}
          <br />
          <small class="text-muted font-italic small">{{$instructor->profesion}}</small>
        </h4>
        <hr />
        <p class="">
          {{$instructor->perfil}}
        </p>

      </div>

    </div>
  </div>
  {{--

<form id="form" class="p-0 m-0 d-flex">
<p class="clasificacion">
<input id="radio1" type="radio" name="estrellas" value="5"><!--
--><label for="radio1">★</label><!--
--><input id="radio2" type="radio" name="estrellas" value="4"><!--
--><label for="radio2">★</label><!--
--><input id="radio3" type="radio" name="estrellas" value="3"><!--
--><label for="radio3">★</label><!--
--><input id="radio4" type="radio" name="estrellas" value="2"><!--
--><label for="radio4">★</label><!--
--><input id="radio5" type="radio" name="estrellas" value="1"><!--
--><label for="radio5">★</label>
</p>
</form> --}}



<div class="container">
  <div class="row">
    <div class="col text-center mb-4">
      <hr />
      <h2>Publicaciones del instructor</h2>
    </div>
  </div>
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
                  <img src="{{Storage::url($publicacion->user->url_foto)}}" alt="author" width="50" height="50">
                  <div class="mdcard__author-content">
                      Por <a href="{{route('instructores.show', [$publicacion->user_id])}}">{{$publicacion->user->nombres}} {{$publicacion->user->apellidos}}</a>
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
@endsection
