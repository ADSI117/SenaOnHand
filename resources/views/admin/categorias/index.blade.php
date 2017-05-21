@extends('admin.template.main')
@section('title','Listar Categorias')
@section('nombre','Listar Categorias')


@section('content')


<a href="{{route('categorias.create')}}" class="">Registrar Categoria</a><hr>
<!-- BUSCADOR -->
	{!!Form::open(['route'=>'categorias.index','method'=>'GET'])!!}
	<div class="form-group">
			{!! Form::text('descripcion',null,['placeholder'=>'buscar categorias'])!!}
	</div>
	{!!Form::close() !!}
<!--  FIN BUSCADOR -->

<table class="">
<thead>
	<th>Id</th>
	<th>Categorias</th>
	<th>Editar</th>
	<th>Eliminar</th>
</thead>
<tbody>
	@foreach($categorias as $categoria)
		<tr>
			<td>{{$categoria->id}}</td>
			<td>{{$categoria->descripcion}}</td>

			<td>
				<a href="{{route('categorias.edit',$categoria->id)}}" class="">editar</a>
			</td>
			<td>


				{{ Form::open(['method' => 'DELETE', 'route' => ['categorias.destroy', $categoria->id]]) }}
                     {{ Form::submit('X', ['class' => 'btn btn-danger']) }}
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                {{ Form::close() }}
			</td>
		</tr>


	@endforeach
</tbody>


</table>
{!!$categorias->render()!!}

@endsection
