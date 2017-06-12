<!-- Detalle de mensajes -->

@extends('template.layout')

@include('template.h-navbar')

@section('main')
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12">
        <h3>Mensajes</h3>

        <p>{{$mensaje->mensaje}}</p>
        <small>Enviado por: {{$mensaje->user->nombres}}</small>
      </div>
    </div>
  </div>
@endsection
