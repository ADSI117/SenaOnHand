@extends('template.layout')

@include('template.h-navbar')

<style media="screen">
  #form {
  width: 250px;
  margin: 0 auto;
  height: 50px;
  }

  #form p {
  text-align: center;
  }

  #form label {
  font-size: 20px;
  }

  input[type="radio"] {
  display: none;
  }

  label {
  color: grey;
  }

  .clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
  }

  label:hover,
  label:hover ~ label {
  color: orange;
  }

  input[type="radio"]:checked ~ label {
  color: orange;
  }

</style>

@section('main')
<div class="container">

    <h1>Detalle de una publicacion</h1>
    @if(Auth::user()->id == $publicacion->user_id)
      <p>
        <a href="{{route('publicaciones.edit', $publicacion->id)}}">
          <button class="btn btn-warning"> Editar </button>
        </a>
      </p>
    @endif

    <h2>Título: {{$publicacion->titulo}}</h2>

    <h3>Autor:
      <a href="{{route('instructores.show', [$publicacion->user_id])}}">
      {{$publicacion->user->nombres}} {{$publicacion->user->apellidos}}
    </a>
    </h3>


    <h3>Subcategoria: {{$publicacion->subcategoria->descripcion}}</h3>
    <h3>Categoria: {{$publicacion->subcategoria->categoria->descripcion}}</h3>
    <p>Fecha creado: {{ date('Y-m-d', strtotime($publicacion->created_at)) }}</p>
    <p>Fecha actualizado: {{ date('Y-m-d', strtotime($publicacion->created_at)) }}</p>

    <p><img src="/imagenes/perfiles/{{$publicacion->user->url_foto}}" alt="" width="50" height="50"></p>
    <p>{{$publicacion->contenido}}</p>

    <p>
      @if($publicacion->tags)
        <h3>Tags</h3>
        @foreach($publicacion->tags as $tag)
          {{$tag->descripcion}} ,
        @endforeach
      @endif
    </p>

    @if($imagenes)
      <h3>Imagenes</h3>
      @foreach($imagenes as $imagen)
        <img src="/imagenes/publicaciones/{{$imagen->descripcion}}" alt="" width="150" height="150">
      @endforeach
    @endif

    <!-- Desplegar archivos que tiene la publicacion -->
    <p>
      @if($publicacion->archivos->all())
        <h3>Archivos</h3>
        @foreach($publicacion->archivos as $archivo)

          <!-- TODO: como mostrar los archivos -->
          {{$archivo->descripcion}}

        @endforeach
      @endif
    </p>

    <br>

    <!-- Desplegar VIDEOS que tiene la publicacion -->
    <p>
      @if($publicacion->videos->all())
        <h3>Videos</h3>
        @foreach($publicacion->videos as $video)
          <!-- TODO: como mostrar los videos -->
          <iframe width="560" height="315" src="{{$video->descripcion}}" frameborder="0" allowfullscreen></iframe>
            <!-- <img src="/imagenes/publicaciones/{{$imagen->descripcion}}" alt="" width="150" height="150"> -->

        @endforeach
      @endif
    </p>

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
  </else>
</div>
@endsection
