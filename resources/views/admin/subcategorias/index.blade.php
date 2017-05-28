{{-- llama main blade --}}
@extends('template.main')
{{-- seteamos el titulo --}}
@section('title','Subcategorias')
{{-- Ponemos el vertical nav  --}}
@section('vNavbar')
  @include('template.v-navbar')
@endsection
{{-- horizontal nav --}}
@section('hNavbar')
  @include('template.h-navbar')
@endsection
{{-- titulo del contenido --}}
@section('title-content', 'Subcategorias')
{{-- poner el buscar al lado del titulo --}}
@section('search-content')
  <!-- BUSCADOR -->
  {!!Form::open(['route'=>'subcategorias.index','method'=>'GET'])!!}
  <div class="input-group">
    {!! Form::text('descripcion',null,
      ['placeholder'=>'Buscar...', 'class' => 'form-control'])!!}
      <span class="input-group-addon">
        <i class="fa fa-search"></i>
      </span>
    </div>
    {!!Form::close() !!}
    <!--  FIN BUSCADOR -->
  @endsection

  @section('content')

    <div class='btn-float'>
      <button data-toggle="modal" data-target="#modal-control"
      type="button"
      data-action="{{route('subcategorias.store')}}"
      data-method="POST"
      onclick="showModalAccion(this.dataset)"
      class="btn btn-danger btn-icon btn-round">
      <i class="fa fa-plus"></i>
    </button>
  </div>



  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Categoria</th>
        <th>Subcategoria</th>
        <th class="ta-right">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($subcategorias as $subcategoria)

        <tr data-tr="{{$subcategoria->id}}">
          <td>{{$subcategoria->id}}</td>
          <td data-index="{{$subcategoria->categoria->id}}">{{ $subcategoria->categoria->descripcion }}</td>
          <td>{{$subcategoria->descripcion}}</td>
          <td class="ta-right">
            <button data-toggle="modal" data-target="#modal-control"
            data-action="{{route('subcategorias.update', $subcategoria->id) }}"
            data-method="PUT"
            data-td="{{$subcategoria->id}}"
            onclick="showModalAccion(this.dataset)"
            class="btn btn-warning btn-icon btn-icon-mini">
            <i class="fa fa-pencil"></i>
          </button>
          {{ Form::open(['class' => 'd-inline-block', 'method' => 'DELETE', 'route' => ['subcategorias.destroy', $subcategoria->id]]) }}
          <button type="submit" class="btn btn-danger btn-icon btn-icon-mini"><i class="fa fa-trash"></i></button>
          {{ Form::close() }}
        </td>
      </tr>


    @endforeach


  </tbody>


</table>
{!!$subcategorias->links('vendor.pagination.custom')!!}

@endsection

@section('modal-control')
  @extends('template.modal')
  @section('modal-title','Categoria')
  @section('modal-content')
    {!!Form::open(['id' => 'form-accion'])!!}
    <div class="modal-body">
      <div class="form-group">

        {!! Form::select('categoria_id', $categorias, null,
          ['class'=>'form-control',
          'placeholder'=>'Seleccionar',
          'required'])!!}
        </div>
        <div class="form-group">
          {!! Form::text('descripcion',null,
            ['placeholder' => 'Nombre' ,
            'required',
            'class' => 'form-control',
            'id' => 'nombre'])!!}
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
          <button type="submit" name="btnSubmit" class="btn btn-info btn-simple">Registrar</button>
          {{-- {!! Form::submit('Registrar',['class'=>'mdl-button'])!!} --}}
        </div>
        {!!Form::close() !!}
      @endsection
    @endsection

    @section('js')
      <script src="{{asset('js/subcategorias.js')}}" charset="utf-8"></script>
    @endsection
