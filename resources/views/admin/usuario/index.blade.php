{{-- llama main blade --}}
@extends('template.admin')
{{-- seteamos el titulo --}}
@section('title','Usuario')
{{-- titulo del contenido --}}
@section('title-content', 'Usuario')
{{-- poner el buscar al lado del titulo --}}
@section('search-content')
  <!-- BUSCADOR -->



 <!-- BUSCADOR -->
  	{!!Form::open(['route'=>'usuario.index','method'=>'GET'])!!}
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
      data-action="{{route('usuario.index')}}"
      data-method="POST"
      onclick="showModalAccion(this.dataset)"
      class="btn btn-danger btn-icon btn-round">
    <i class="fa fa-plus"></i>
  </button>
</div>

<table class="table table-hover">
<thead>
  <tr>
    <th class="ta-left">Id</th>
    <th class="ta-left">nombre</th>
    <th class="ta-left">email</th>
    <th class="ta-left">estado</th>
    <th class="ta-right">Acciones</th>
  </tr>
</thead>
<tbody>
	@foreach($user as $usuario)

		<tr data-tr="{{$usuario->id}}">
			<td>{{$usuario->nombres}}</td>
			<td >{{$usuario->id}}</td>
			<td>{{$usuario->email}}</td>
			<td>{{$usuario->id}}</td>
			<td class="ta-right">
         
         <a class="btn btn-warning btn-icon btn-icon-mini" href="{{route('usuario.edit',$usuario->id) }}"><i class="fa fa-pencil">
         	
         </i></a>
        
	
     
			</td>
		</tr>
	@endforeach
</tbody>
</table>
{!!$user->links('vendor.pagination.custom')!!}

@endsection
