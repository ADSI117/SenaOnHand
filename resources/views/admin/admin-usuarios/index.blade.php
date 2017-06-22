
@extends('template.admin')

@section('title','Usuario')

@section('title-content', 'Gestión de usuarios')

@section('search-content')
<!-- BUSCADOR -->



<!-- BUSCADOR -->
{!!Form::open(['route'=>'admin-usuarios.index','method'=>'GET'])!!}
<div class="input-group">
  {!! Form::text('filtro',null,
  ['placeholder'=>'Buscar...', 'class' => 'form-control'])!!}
  <span class="input-group-addon">
    <i class="fa fa-search"></i>
  </span>
</div>
{!!Form::close() !!}
<!--  FIN BUSCADOR -->
@endsection




@section('content')
@if($usuarios)
<table class="table table-striped">
  <table class="table table-hover" id="table">
    <thead>
      <tr>
        <th class="ta-left">Nombres</th>
        <th class="ta-left">Apellidos</th>
        <th class="ta-left">Estado</th>
        <th class="ta-left">Tipo de Documento</th>
        <th class="ta-right">Identificación</th>
        <th class="ta-right">Correo</th>
        <th class="ta-right">Rol</th>
        <th class="ta-right">Sede</th>
        <th class="ta-right">Grupo</th>
        <th class="ta-right">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($usuarios as $usuario)

      <tr data-tr="{{$usuario->id}}">
        <td class="align-middle">{{$usuario->nombres}}</td>
        <td class="align-middle">{{$usuario->apellidos}}</td>
        <td class="align-middle">{{$usuario->estado_usuario->descripcion}}</td>
        <td class="align-middle">{{$usuario->tipo_doc['nombre']}}</td>
        <td class="align-middle">{{$usuario->num_doc}}</td>
        <td class="align-middle">{{$usuario->email}}</td>
        <td class="align-middle">{{$usuario->rol->descripcion}}</td>
        <td class="align-middle">{{$usuario->sede['descripcion']}}</td>
        <td class="align-middle">{{$usuario->grupo['nombre']}}</td>

        <td>
          <a href="{{route('admin-usuarios.edit',$usuario->id)}}" class="btn btn-warning"><i class="fa fa-wrench" aria-hidden="true"></i></a>
          <!-- <a href="{{route('admin-usuarios.show',$usuario->id)}}" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
        </td>
      </tr>


      @endforeach
    </tbody>


  </table>

  {!! $usuarios->links('vendor.pagination.custom')!!}

  @else
    <h3>Ejecutar una búsqueda para comenzar</h3>
  @endif


  @endsection
