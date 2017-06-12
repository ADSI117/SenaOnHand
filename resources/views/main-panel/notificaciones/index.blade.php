<!-- Notificaciones del usuario -->

@extends('template.layout')

@include('template.h-navbar')

@section('main')
  <div class="container">
    <h3>Sus notificaciones</h3>
    <div class="row">
      <div class="col-md-6">
        <h4>No leidas</h4>
        <div class="list-group">
          @foreach($noleidas as $noleida)
            <div class="list-group-item">
              <!-- {{ var_dump($noleida->data) }} -->
              <a href="{{$noleida->data['link']}}">{{$noleida->data['text']}}</a>

              {!!Form::open(['route'=>['notificaciones.update', $noleida], 'method' => 'POST'])!!}
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                {!!Form::submit('x', ['class' => 'btn btn-danger btn-xs'])!!}
              {!!Form::close()!!}

            </div>
          @endforeach
        </div>


      </div>

      <div class="col-md-6">
        <h4>Leidas</h4>
        <div class="list-group">
          @foreach($leidas as $leida)
            <a href="{{$leida->data['link']}}">{{$leida->data['text']}}</a>

            {!!Form::open(['route'=>['notificaciones.destroy', $leida->id], 'method' => 'DELETE'])!!}

              {!!Form::submit('x', ['class' => 'btn btn-danger btn-xs'])!!}
            {!!Form::close()!!}

          @endforeach
        </div>

      </div>
    </div>
  </div>
@endsection
