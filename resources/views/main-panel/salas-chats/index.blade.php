<!-- Lista de salas de chats -->

@extends('template.layout')


@section('main')
@include('template.h-navbar')
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

        @foreach($salas as $sala)
        <a href="{{route('salas.show', $sala->id)}}" class="material-card">
          <small class="content-date"><i class="fa fa-clock-o mr-2"></i> {{$sala->updated_at}}</small>
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
            </div>
          </div>


        </a>
        @endforeach

    </div>
  </div>
</div>

@endsection
