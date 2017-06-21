@extends('template.layout')


@section('main')
  @include('template.h-navbar')
  {!! Form::open(['route' => 'publicaciones.store', 'method' => 'POST', 'files' => true, 'class' => '']) !!}
  <div class="page-banner bg-red">
    <div class="container">
      <h1>Nueva publicacion</h1>
    </div>
    <div class="btn-float-page">
      <button type="submit" class="btn btn-info btn-icon btn-round">
        <i class="fa fa-floppy-o"></i>
      </button>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-12 col-md-7 ">
        <div class="card">

          <div class="card-block">
            <div class="form-group">
              {!!Form::text('titulo', null, ['id' => 'nombre', 'placeholder' => 'Título', 'required', 'class' => 'material-input'])!!}
            </div>
            <div class="form-group form-group-no-border ">
              {!! Form::label('contenido', 'Contenido') !!}
              {!!Form::textarea('contenido', null, ['id' => 'contenido', 'rows' => '5', 'placeholder' => 'Contenido de la pubicación', 'required', 'class' => 'form-control'])!!}
            </div>
            <div class="form-group">
              {!! Form::select('subcategoria_id', $subcategorias, null, ['placeholder' => 'Seleccione una Subcategoria', 'required', 'class' => 'material-select chosen-select']) !!}
            </div>
            <div class="form-group form-group-no-border">
              {!! Form::select('estado_id', $estados, null, ['placeholder' => 'Estado publicacion', 'required', 'class' => 'form-control chosen-select']) !!}
            </div>
            <div class="form-group form-group-no-border">
              {!! Form::select('tags', $tags, null, ['multiple'=>'multiple', 'name'=>'tags[]',  'required', 'class' => 'material-input chosen-select']) !!}
            </div>
          </div>
        </div>

      </div>
      <div class="col-sm-12 col-md-5 col-lg-4">
        <div class="form-group form-group-no-border ">
          {!! Form::label('imagen', 'Imagen') !!}
          {!! Form::file('imagen', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group form-group-no-border">
          {!! Form::label('archivo', 'Archivo') !!}
          {!! Form::file('archivo', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!!Form::text('video', null, ['id' => 'video', 'placeholder' => 'URL del video', 'class' => 'material-input', 'type' => 'url'])!!}
        </div>

        <div class="embed-responsive embed-responsive-16by9" id="video-container">
          {{-- <iframe class="embed-responsive-item" src="//www.youtube.com/embed/zpOULjyy-n8?rel=0" frameborder="0" allowfullscreen></iframe> --}}
        </div>

      </div>
    </div>
    {!! Form::close()!!}
  @endsection

  @section('js')
    <script src="{{asset('js/cargarvideo.js')}}"></script>
  @endsection
