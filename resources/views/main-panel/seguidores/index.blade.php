@extends('template.layout')


@section('main')
@include('template.h-navbar')

<!-- <h1>Mis seguidores</h1>
<h3>Tienes {{$seguidores->count()}} seguidores</h3>

@foreach($seguidores as $seguidor)
{{ $seguidor->seguidor->nombres }} {{ $seguidor->seguidor->apellidos }}
<br>
Desde: {{$seguidor->created_at}}
<br>
<hr>
@endforeach -->

<!-- Tiene pagina de 20 -->
<div class="row mt-3">
  <div class="col">
    <div class="text-center">{{ $seguidores->links('vendor.pagination.custom') }}</div>
  </div>
</div>

<div class="page-banner bg-indigo">
  <div class="container">
    <h1>
      Mis seguidores.
    </h1>
  </div>
</div>


@if($seguidores->count() > 0)
<div class="container">
  <br>
  <div class="row justify-content-center">
    <div class="col">
      <h3>({{$seguidores->count()}}) Usuarios</h3>
    </div>
    <div class="w-100"></div>
    @foreach($seguidores as $seguidor)
    <div class="col-xs-12 col-sm-10 col-md-6 col-lg-4">

      <a href="{{route('instructores.show', [$seguidor->id])}}" class="material-card">
        <div class="material-card-header">
          <img src="{{Storage::url($seguidor->seguidor->url_foto)}}"  alt="">
          <div class="content-header-title">
            <h5  class="header--title">  {{ $seguidor->seguidor->nombres }} {{ $seguidor->seguidor->apellidos }}</h5>
            <small>{{$seguidor->email}}</small>
          </div>

        </div>

      </a>
      <p class="text-center">
        {{$seguidor->created_at}}
      </p>

    </div>
    @endforeach

  </div>
</div>
<div class="container">
  <div class="row mt-3">
    <div class="col">
      <div class="text-center">{{ $seguidores->links('vendor.pagination.custom') }}</div>
    </div>
  </div>
</div>
@endif


@endsection
