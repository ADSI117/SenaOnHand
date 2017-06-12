@extends('template.layout')

@include('template.h-navbar')

@section('main')

<div class="container">

  <div class="row">
    <div class="col-3">
      <div class="card">
        <img class="card-img-top img-fluid" src="{{url('/')}}/imagenes/perfiles/{{$instructor->url_foto}}" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title">
            {{$instructor->nombres}} {{$instructor->apellidos}}
          </h4>
          <small class="text-muted font-italic">{{$instructor->profesion}}</small>
          <hr />
          <a href="mail:to">{{$instructor->email}}</a>
          <hr />
          <p>
            Some quick example text to build on the card title and make up the bulk of the card's content.
          </p>
          <hr />

        </div>
      </div>
    </div>

    <div class="col-9">
      <div class="row">
        <div class="col-6 justify-content-start">
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
            </form>
          </div>
          <div class="col-6">
            {!!Form::open(['route'=>'seguidos.store','method'=>'POST', 'class' => 'text-right'])!!}
            {!!Form::hidden('seguir_id', $instructor->id)!!}
            {!!Form::submit('Seguir', ['class'=>'btn btn-primary'])!!}
            {!!Form::close()!!}
          </div>
      </div>
    </div>

  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col text-center">
      <h2>Publicaciones del instructor</h2>

      @foreach($publicaciones as $publicacion)

        <div class="tarjeta">
          <h4 class="cabezera">
            <a href="{{route('publicaciones.show', [$publicacion->id])}}">{{$publicacion->titulo}}</a>
            <small class="text-muted"><a href="{{route('instructores.show', [$publicacion->user_id])}}">{{$publicacion->user->nombres}}</a></small>

            <div class="imagen">
              <img src="{{url('/')}}/imagenes/perfiles/{{$publicacion->user->url_foto}}" alt="" width="60" height="60">
            </div>
          </h4>


          <div class="contenido">
            <p>{{substr($publicacion->contenido, 0, 140)}} ... </p>
          </div>

        </div>
      @endforeach

      <!-- Paginado -->
      <div class="text-center">{{ $publicaciones->links() }}</div>
    </div>

  </div>
</div>

@endsection
