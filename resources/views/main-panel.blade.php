@extends('template.layout')

@include('template.h-navbar')

@section('main')
<div class="container-fluid">

  <div class="tarjeta">
    <h4 class="cabezera">
      <a href="#">titulo</a>
      <small class="text-muted"><a href="#">Jhonathan calderon</a></small>

      <div class="imagen">
        <img src="/imagenes/perfiles/{{Auth::user()->url_foto}}" alt="" width="60" height="60">
      </div>
    </h4>


    <div class="contenido">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati libero alias, eius corrupti animi eligendi deleniti. Sunt adipisci, quibusdam. Atque, accusamus. Odit totam sed mollitia laboriosam alias praesentium modi fugit.</p>
    </div>

  </div>


</div>
@endsection
