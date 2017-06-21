@extends('template.layout')


@section('main')
@include('template.h-navbar')

  <h1>Mis seguidores</h1>
  <h3>Tienes {{$seguidores->count()}} seguidores</h3>

  @foreach($seguidores as $seguidor)
    {{ $seguidor->seguidor->nombres }} {{ $seguidor->seguidor->apellidos }}
    <br>
    Desde: {{$seguidor->created_at}}
    <br>
    <hr>
  @endforeach

  <!-- Tiene pagina de 20 -->
  <div class="row mt-3">
    <div class="col">
      <div class="text-center">{{ $seguidores->links('vendor.pagination.custom') }}</div>
    </div>
  </div>


@endsection
