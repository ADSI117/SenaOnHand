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
    <div class="col-xs-12">
      @foreach($salas as $sala)
      <div class="list-group">
        <a href="{{route('salas.show', $sala->id)}}" class="list-group-item">
          @if(Auth::user()->id == $sala->usuario_amigo_id)
          <h4 class="list-group-item-heading">Con {{$sala->user_creador->nombres}} {{$sala->user_creador->apellidos}}</h4>
          @else
            <h4 class="list-group-item-heading">Con {{$sala->user_amigo->nombres}} {{$sala->user_amigo->apellidos}}</h4>
          @endif
          <p class="list-group-item-text">
            Último mensaje: {{$sala->updated_at}}
          </p>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>




@endsection
