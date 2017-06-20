@extends('template.layout')

@include('template.h-navbar')

@section('main')
  <div class="page-banner" style="background-color:#2196F3;">
    <div class="container">
      <h1>
        {{$publicacion->titulo}}
      </h1>
      <div class="d-flex">
        <img  class="mr-3"
              src="{{Storage::url($publicacion->user->url_foto)}}"
              alt="foto de perfil"
              width="50" height="50"/>
        <span class="d-flex align-items-center">
          Autor:
          <a href="{{route('instructores.show', [$publicacion->user_id])}}" class="link-autor">
            {{$publicacion->user->nombres}} {{$publicacion->user->apellidos}}
          </a>
          <span style="padding: 5px;">Tiene: {{$publicacion->user->publicaciones->count()}} publicaciones.</span>


            Calificación promedio: {{round($promedio, 2)}}
        </span>
      </div>
    </div>
    @if(Auth::user()->id == $publicacion->user_id)
    <div class="btn-float-page">
      <a href="{{route('publicaciones.edit', $publicacion->id)}}" class="btn btn-warning btn-icon btn-round">
        <i class="fa fa-pencil"></i>
      </a>
    </div>
    @endif
  </div>
  <div class="container mb-5">
    <div class="row">
      <!-- Mensaje flash -->
      @include('flash::message')
    </div>

    <div class="row">

      <div class="col-6 justify-content-start">
        Fecha creado: {{ date('Y-m-d', strtotime($publicacion->created_at)) }}
        <br />
        Puntaje promedio: {{$publicacion->puntaje}}
        <br>
        Número de vistas: {{$publicacion->num_visitas}}
        <br>
        {{-- Fecha actualizado: {{ date('Y-m-d', strtotime($publicacion->created_at)) }} --}}
      </div>
      <div class="col-6 justify-content-end">
        {!!Form::open(['route' => 'calificaciones.store', 'id' => 'form'])!!}
          {!!Form::hidden('publicacion_id', $publicacion->id)!!}
          <p class="clasificacion">
            {!!Form::submit('Calificar', ['class' => 'material-btn'])!!}
            <input id="radio1" type="radio" name="estrellas" value="5">
            <label for="radio1">★</label>
            <input id="radio2" type="radio" name="estrellas" value="4">
            <label for="radio2">★</label>
            <input id="radio3" type="radio" name="estrellas" value="3">
            <label for="radio3">★</label>
            <input id="radio4" type="radio" name="estrellas" value="2">
            <label for="radio4">★</label>
            <input id="radio5" type="radio" name="estrellas" value="1">
            <label for="radio5">★</label>
          </p>
        {!!Form::close()!!}
      </div>

      <div class="w-100"></div>

      <div class="col">
        <h4 class="display-4">{{$publicacion->titulo}}</h4>
        <p class="lead pt-2">
          {{$publicacion->contenido}}
        </p>
        @if($publicacion->imagenes)
          <h3>Imagenes</h3>
          @foreach($publicacion->imagenes as $imagen)
            <img src="{{ Storage::url($imagen->descripcion) }}" alt="" width="150" height="150">
          @endforeach
        @endif
        <div>
          @if($publicacion->archivos->all())
            <h3>Archivos</h3>
            @foreach($publicacion->archivos as $archivo)

              <!-- TODO: como mostrar los archivos -->
              <!-- {{$archivo->descripcion}} -->
              <a href="{{ Storage::url($archivo->descripcion) }}" target="_blank">{{$archivo->descripcion}}</a>

            @endforeach
          @endif
        </div>
        @if($publicacion->videos->all())
        <div class="p-5">
            <div class="embed-responsive embed-responsive-21by9">
            @foreach($publicacion->videos as $video)
              <!-- TODO: como mostrar los videos -->
                <iframe class="embed-responsive-item" src="{{$video->descripcion}}" frameborder="0" allowfullscreen></iframe>
            @endforeach
          </div>
        </div>
      @endif

      </div>

      <div class="w-100"></div>

      <div class="col mt-4">
        <h5>tags</h5>
        <span class="chip">
          {{$publicacion->subcategoria->descripcion}}
        </span>
        <span class="chip">
          {{$publicacion->subcategoria->categoria->descripcion}}
        </span>
        @if($publicacion->tags)
          @foreach($publicacion->tags as $tag)
            <span class="chip">
              {{$tag->descripcion}}
            </span>
          @endforeach
        @endif
      </div>

    </div>

</div>

<hr>

<div class="container">
  <div>
    @include('flash::message')
  </div>
  <div class="row">
    <div class="col-xs-12">
      <h3>Comentarios</h3>
      <!-- Formulario para comentarios. -->
      {!!Form::open(['route'=>'comentarios.store', 'method' => 'POST'])!!}
        <div class="form-group">
          {!!Form::hidden('publicacion_id', $publicacion->id)!!}
          {!!Form::textarea('comentario', null, ['plcaholder'=>'Ingresa tu comentario', 'class'=>'form-control'])!!}
        </div>
        <div class="form-group">
          {!!Form::submit('Enviar', ['class'=>'btn btn-primary'])!!}
        </div>
      {!!Form::close()!!}
    </div>
  </div>
</div>
<hr>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h3>Listado</h3>
      @foreach($publicacion->comentarios as $comentario)
        <span>{{$comentario->comentario}}</span>
        <small>Publicado por: {{$comentario->user->nombres}}</small>
        {!!Form::open(['route'=>'denuncias.store', 'method' => 'POST'])!!}
        {!!Form::hidden('comentario_id', $comentario->id)!!}
        {!!Form::hidden('publicacion_id', $publicacion->id)!!}
        <!-- TODO: Hacer el siguiente campo visible cuando se termine el frontend -->
        {!!Form::text('comentario', 'Comentario', ['class' => 'form-control'])!!}
        {!!Form::select('tipo_denuncia', $tipos_denuncias, $comentario->tipo_id, ['class'=>'form-control'])!!}

        <br>
        {!!Form::submit('Denunciar', ['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}

        <!-- Formulario de eliminacion -->
        @if(Auth::user()->id == $comentario->usuario_id || Auth::user()->id == $publicacion->usuario_id || Auth::user()->rol_id == 3)
          {!!Form::open(['route' => ['comentarios.destroy', $comentario->id], 'method' => 'DELETE'])!!}
          {!!Form::submit('Eliminar', ['class'=>'btn btn-primary'])!!}
          {!!Form::close()!!}
        @endif
      @endforeach
    </div>
  </div>
  <br><br><br>
</div>
@endsection
