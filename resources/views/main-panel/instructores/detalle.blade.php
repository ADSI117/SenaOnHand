@extends('template.layout')

@include('template.h-navbar')

@section('main')

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
          <img class="card-img-top img-fluid" src="{{url('/')}}/imagenes/perfiles/{{$instructor->url_foto}}" alt="Card image cap">
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
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
          nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
          deserunt mollit anim id est laborum.
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
  <div class="row">
    <div class="col">
      <div class="text-center">{{ $publicaciones->links('vendor.pagination.custom') }}</div>
    </div>
  </div>
  <div class="row">
    @foreach($publicaciones as $publicacion)
      <div class="col-xs-12 col-md-6 col-lg-4">

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
      </div>
    @endforeach
  </div>
</div>
@endsection
