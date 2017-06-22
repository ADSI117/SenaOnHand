@extends('template.layout')


@section('main')
@include('template.h-navbar') 

  <div class="page-banner" style="background-color:#FBC02D;color:#000">
    <div class="container">
      <h1>
        <i class="fa fa-pencil mr-2"></i>{{ $publicacion->titulo }} 
      </h1>
    </div>
    <div class="btn-float-page">
      <button type="submit" class="btn btn-info btn-icon btn-round">
        <i class="fa fa-floppy-o"></i>
      </button>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-xs-12 col-6">
        {!! Form::open(['route' => ['publicaciones.update', $publicacion], 'method' => 'PUT', 'files' => true, 'class' => 'card']) !!}
          <div class="card-block">
            <div class="form-group">
              {!!Form::text('titulo', $publicacion->titulo, ['id' => 'nombre', 'placeholder' => 'Título', 'required', 'class' => 'material-input'])!!}
            </div>
            <div class="form-group">
              {!!Form::textarea('contenido', $publicacion->contenido,
              ['id' => 'contenido', 'rows' => '5', 'placeholder' => 'Contenido de la pubicación', 'required', 'class' => 'form-control'])!!}
            </div>
            <div class="form-group form-group-no-border">
              {!! Form::label('imagen', 'Imagen') !!}
              {!! Form::file('imagen', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group form-group-no-border">
              {!! Form::label('archivo', 'Archivo') !!}
              {!! Form::file('archivo', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('video', 'Video') !!}
              {!!Form::text('video', null, ['id' => 'video', 'required', 'placeholder' => 'URL del video', 'class' => 'material-input'])!!}
            </div>
            <div class="form-group">
              {!! Form::select('subcategoria_id', $subcategorias, $publicacion->subcategoria_id, ['placeholder' => 'Seleccione una Subcategoria', 'required', 'class' => 'chosen-select form-control']) !!}
            </div>
            <div class="form-group">
              {!! Form::select('estado_id', $estados, $publicacion->estado_id, ['placeholder' => 'Estado publicacion', 'required', 'class' => 'chosen-select form-control']) !!}
            </div>
            <div class="form-group">
              {!! Form::select('tags', $tags, $publicacion->tags, ['multiple'=>'multiple', 'name'=>'tags[]',  'required', 'class' => 'chosen-select form-control']) !!}
            </div>
          </div>
       {!! Form::close()!!}
      </div>
    

    <div class="col-xs-12 col-4">
      <!-- Desplegar Etiquetas que tiene la publicacion -->
      @if($publicacion->tags->all())
        <h3>Tags</h3>
        @foreach($publicacion->tags as $tag)

          {!! Form::open(['name' => 'form_'.$tag->id, 'class' => 'd-inline-block', 'method' => 'DELETE', 'route' => ['tags.destroy', $tag->id]]) !!}
            {!!Form::hidden('publicacion_id', $publicacion->id)!!}
            <div class="chip">
              {{$tag->descripcion}}
              {{-- {!!Form::button('Borrar', ['class' => 'btn btn-link closebtn', 'type' => 'submit'])!!} --}}
              <span class="closebtn" onclick="this.parentElement.style.display='none';document.form_{{$tag->id}}.submit();">&times;</span>
            </div>
            <!-- Corregir modo hidden -->
          {!! Form::close() !!}

        @endforeach
        <hr />
      @endif
      <!-- Desplegar Imagenes que tiene la publicacion -->
      @if($publicacion->imagenes->all())
        <h3>Imagenes</h3>
        @foreach($publicacion->imagenes as $imagen)

          {!! Form::open(['method' => 'DELETE', 'route' => ['imagenes.destroy', $imagen->id]]) !!}
            <img src="{{Storage::url($imagen->descripcion)}}" alt="" width="150" height="150">
            {!!Form::button('Borrar', ['class' => 'btn btn-warning', 'type' => 'submit'])!!}
          {!! Form::close() !!}

        @endforeach
      @endif
      <!-- Desplegar archivos que tiene la publicacion -->
      @if($publicacion->archivos->all())
        <h3>Archivos</h3>
        @foreach($publicacion->archivos as $archivo)

          {!! Form::open(['method' => 'DELETE', 'route' => ['archivos.destroy', $archivo->id]]) !!}
          <!-- TODO: como mostrar los archivos -->

            <a href="{{ Storage::url($archivo->descripcion) }}">{{$archivo->descripcion}}</a>
            <!-- <img src="/imagenes/publicaciones/{{$imagen->descripcion}}" alt="" width="150" height="150"> -->
            {!!Form::button('Borrar', ['class' => 'btn btn-warning', 'type' => 'submit'])!!}
          {!! Form::close() !!}

        @endforeach
      @endif
      <!-- Desplegar VIDEOS que tiene la publicacion -->
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
    </div>
  </div>
@endsection
