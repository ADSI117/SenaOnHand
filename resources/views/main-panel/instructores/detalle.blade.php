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

<div class="container text-center">
  <h1>Detalle de instructor</h1>

  <h2>{{$instructor->nombres}} {{$instructor->apellidos}}</h2>
  <h3>{{$instructor->profesion}}</h3>
  <img src="/imagenes/perfiles/{{$instructor->url_foto}}" alt="" width="80" height="80">
  <br>
  <a href="mail:to">{{$instructor->email}}</a>
  <br>
  <button class="btn btn-primary">Seguir</button>
  <div class="">
    <h1>Calificacion</h1>

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
</div>
<hr>

<div class="container-fluid text-center">
  <h2>Publicaciones del instructor</h2>

  @foreach($publicaciones as $publicacion)

    <div class="tarjeta">
      <h4 class="cabezera">
        <a href="{{route('publicaciones.show', [$publicacion->id])}}">{{$publicacion->titulo}}</a>
        <small class="text-muted"><a href="{{route('instructores.show', [$publicacion->user_id])}}">{{$publicacion->user->nombres}}</a></small>

        <div class="imagen">
          <img src="/imagenes/perfiles/{{$publicacion->user->url_foto}}" alt="" width="60" height="60">
        </div>
      </h4>


      <div class="contenido">
        <p>{{substr($publicacion->contenido, 0, 140)}} ... </p>
      </div>

    </div>
  @endforeach
</div>



@endsection
