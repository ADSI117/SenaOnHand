@extends('template.layout')

@include('template.h-navbar')

@section('main')
  <div class="page-banner" style="background-color:#2196F3;">
    <div class="container">
      <h1>
        {{$publicacion->titulo}}
      </h1>
      <div class="d-flex">
        <img  class="mr-3"
              src="/imagenes/perfiles/{{$publicacion->user->url_foto}}"
              alt="foto de perfil"
              width="50" height="50"/>
        <span class="d-flex align-items-center">
          Autor:
          <a href="{{route('instructores.show', [$publicacion->user_id])}}" class="link-autor">
            {{$publicacion->user->nombres}} {{$publicacion->user->apellidos}}
          </a>
        </span>
      </div>
    </div>
    @if(Auth::user()->id == $publicacion->user_id)
    <div class="btn-float-page">
      <a href="{{route('publicaciones.edit', $publicacion->id)}}" class="btn btn-warning btn-icon btn-round">
        <i class="fa fa-pencil"></i>
      </a>
    </div>
    @endif
  </div>
  <div class="container mb-5">

    <div class="row">

      <div class="col-6 justify-content-start">
        Fecha creado: {{ date('Y-m-d', strtotime($publicacion->created_at)) }}
        <br />
        {{-- Fecha actualizado: {{ date('Y-m-d', strtotime($publicacion->created_at)) }} --}}
      </div>
      <div class="col-6 justify-content-end">
        <form id="form">
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
        </form>
      </div>

      <div class="w-100"></div>

      <div class="col">
        <h4 class="display-4">{{$publicacion->titulo}}</h4>
        <p class="lead pt-2">
          {{$publicacion->contenido}}
        </p>
        @if($imagenes)
          <h3>Imagenes</h3>
          @foreach($imagenes as $imagen)
            <img src="/imagenes/publicaciones/{{$imagen->descripcion}}" alt="" width="150" height="150">
          @endforeach
        @endif
        <div>
          @if($publicacion->archivos->all())
            <h3>Archivos</h3>
            @foreach($publicacion->archivos as $archivo)

              <!-- TODO: como mostrar los archivos -->
              {{$archivo->descripcion}}

            @endforeach
          @endif
        </div>
        @if($publicacion->videos->all())
        <div class="p-5">
            <div class="embed-responsive embed-responsive-21by9">
            @foreach($publicacion->videos as $video)
              <!-- TODO: como mostrar los videos -->
                <iframe class="embed-responsive-item" src="{{$video->descripcion}}" frameborder="0" allowfullscreen></iframe>
            @endforeach
          </div>
        </div>
      @endif

      </div>

      <div class="w-100"></div>

      <div class="col mt-4">
        <h5>tags</h5>
        <span class="chip">
          {{$publicacion->subcategoria->descripcion}}
        </span>
        <span class="chip">
          {{$publicacion->subcategoria->categoria->descripcion}}
        </span>
        @if($publicacion->tags)
          @foreach($publicacion->tags as $tag)
            <span class="chip">
              {{$tag->descripcion}}
            </span>
          @endforeach
        @endif
      </div>

    </div>
</div>
@endsection
