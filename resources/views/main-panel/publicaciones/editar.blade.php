@extends('template.layout')

@include('template.h-navbar')

@section('main')

  <div class="container">
    <div class="row justify-content-center">

      {!! Form::open(['route' => ['publicaciones.update', $publicacion], 'method' => 'PUT', 'files' => true, 'class' => 'form']) !!}
      <div class="header header-primary text-center">
        <h4 class="title title-up" >Editar publicacion</h4>
      </div>

      <div class="form-group form-group-no-border">
        {{-- <input type="text" value="" placeholder="Regular" class="form-control" /> --}}
        {!!Form::text('titulo', $publicacion->titulo, ['id' => 'nombre', 'placeholder' => 'Título', 'required', 'class' => 'form-control'])!!}
      </div>
      <div class="form-group form-group-no-border ">
        {!!Form::textarea('contenido', $publicacion->contenido,
          ['id' => 'contenido', 'rows' => '5', 'placeholder' => 'Contenido de la pubicación', 'required', 'class' => 'form-control'])!!}
        </div>

        <div class="form-group form-group-no-border ">
          {!! Form::label('imagen', 'Imagen') !!}
          {!! Form::file('imagen', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group form-group-no-border ">
          {!! Form::label('archivo', 'Archivo') !!}
          {!! Form::file('archivo', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group form-group-no-border">
          {!! Form::label('video', 'Video') !!}
          {!!Form::text('video', null, ['id' => 'video', 'placeholder' => 'URL del video', 'class' => 'form-control'])!!}
        </div>

        <div class="form-group form-group-no-border">
          {!! Form::select('subcategoria_id', $subcategorias, $publicacion->subcategoria_id, ['placeholder' => 'Seleccione una Subcategoria', 'required', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group form-group-no-border">
          {!! Form::select('estado_id', $estados, $publicacion->estado_id, ['placeholder' => 'Estado publicacion', 'required', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group form-group-no-border">
          {!! Form::select('tags', $tags, $publicacion->tags, ['multiple'=>'multiple', 'name'=>'tags[]',  'required', 'class' => 'form-control']) !!}
        </div>

        <div class="text-center">
          {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close()!!}

        <p>
          @if($publicacion->tags->all())
            <h3>Tags</h3>
              @foreach($publicacion->tags as $tag)

                {!! Form::open(['method' => 'DELETE', 'route' => ['tags.destroy', $tag->id]]) !!}
                  {{$tag->descripcion}}
                  <!-- Corregir modo hidden -->
                  {!!Form::text('publicacion_id', $publicacion->id, ['class'=>'invisible'])!!}
                  {!!Form::button('Borrar', ['class' => 'btn btn-warning', 'type' => 'submit'])!!}
                {!! Form::close() !!}

              @endforeach
          @endif
        </p>
        <br>

        <p>
          @if($publicacion->imagenes->all())
            <h3>Imagenes</h3>
            @foreach($publicacion->imagenes as $imagen)

              {!! Form::open(['method' => 'DELETE', 'route' => ['imagenes.destroy', $imagen->id]]) !!}
                <img src="/imagenes/publicaciones/{{$imagen->descripcion}}" alt="" width="150" height="150">
                {!!Form::button('Borrar', ['class' => 'btn btn-warning', 'type' => 'submit'])!!}
              {!! Form::close() !!}

            @endforeach
          @endif
        </p>

        <br>

        <!-- Desplegar archivos que tiene la publicacion -->
        <p>
          @if($publicacion->archivos->all())
            <h3>Archivos</h3>
            @foreach($publicacion->archivos as $archivo)

              {!! Form::open(['method' => 'DELETE', 'route' => ['archivos.destroy', $archivo->id]]) !!}
              <!-- TODO: como mostrar los archivos -->
              {{$archivo->descripcion}}
                <!-- <img src="/imagenes/publicaciones/{{$imagen->descripcion}}" alt="" width="150" height="150"> -->
                {!!Form::button('Borrar', ['class' => 'btn btn-warning', 'type' => 'submit'])!!}
              {!! Form::close() !!}

            @endforeach
          @endif
        </p>

        <br>

        <!-- Desplegar VIDEOS que tiene la publicacion -->
        <p>
          @if($publicacion->videos->all())
            <h3>Videos</h3>
            @foreach($publicacion->videos as $video)

              {!! Form::open(['method' => 'DELETE', 'route' => ['videos.destroy', $video->id]]) !!}
              <!-- TODO: como mostrar los videos -->
              <iframe width="560" height="315" src="{{$video->descripcion}}" frameborder="0" allowfullscreen></iframe>
                <!-- <img src="/imagenes/publicaciones/{{$imagen->descripcion}}" alt="" width="150" height="150"> -->
                {!!Form::button('Borrar', ['class' => 'btn btn-warning', 'type' => 'submit'])!!}
              {!! Form::close() !!}

            @endforeach
          @endif
        </p>

      </div>
    </div>
  @endsection
