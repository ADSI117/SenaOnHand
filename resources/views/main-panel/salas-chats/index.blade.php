<!-- Lista de salas de chats -->

@extends('template.layout')

@include('template.h-navbar')

@section('main')
<div class="page-banner bg-indigo">
  <div class="container">
    <h1>
      @if($salas->count() == 0)
        No tienes chats
      @else
      {{$salas->count()}} Salas Activas

      @endif
    </h1>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col full-h">



      <div class="list-group">
        @foreach($salas as $sala)
        <a href="{{route('salas.show', $sala->id)}}" class="material-card">
          <div class="material-card-header">
            @if(Auth::user()->id == $sala->usuario_amigo_id)
              <img src="{{Storage::url($sala->user_creador->url_foto)}}"  alt="">
              <div class="content-header-title">
                <h5  class="header--title">Con {{$sala->user_creador->nombres}} {{$sala->user_creador->apellidos}}</h5>
            @else
              <img src="{{Storage::url($sala->user_amigo->url_foto)}}" alt="">
              <div class="content-header-title">
                <h5  class="header--title">Con {{$sala->user_amigo->nombres}} {{$sala->user_amigo->apellidos}}</h5>
            @endif
              <small class="header--date">Último mensaje: {{$sala->updated_at}}</small>
            </div>
          </div>


        </a>
        <!-- <a href="{{route('salas.show', $sala->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 align-items-center">
            @if(Auth::user()->id == $sala->usuario_amigo_id)
              <img src="{{Storage::url($sala->user_creador->url_foto)}}" class="rounded-circle" width="75" height="75" alt="">
              <h5  class="mb-1">Con {{$sala->user_creador->nombres}} {{$sala->user_creador->apellidos}}</h5 >
            @else
              <img src="{{Storage::url($sala->user_amigo->url_foto)}}" class="rounded-circle" width="75" height="75" alt="">
              <h5  class="mb-1">Con {{$sala->user_amigo->nombres}} {{$sala->user_amigo->apellidos}}</h5 >
            @endif
            <small class="align-self-start">Último mensaje: {{$sala->updated_at}}</small>
          </div>
        </a> -->
        @endforeach
      </div>

    </div>
  </div>
</div>




@endsection
