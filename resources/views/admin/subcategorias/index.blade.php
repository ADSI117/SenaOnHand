

 @extends('admin.template.main')
@section('title','Listar Categorias')
@section('nombre','Listar Categorias')
 

@section('content')


<a href="{{route('subcategorias.create')}}" class="">Registrar Subcategoria</a><hr>
<!-- BUSCADOR -->
	{!!Form::open(['route'=>'subcategorias.index','method'=>'GET'])!!}
	<div class="form-group">
			{!! Form::text('descripcion',null,['placeholder'=>'buscar subcategorias'])!!}
	</div>
	{!!Form::close() !!}
<!--  FIN BUSCADOR -->

<table class="">
<thead>
	<th>Id</th>
	<th>Categoria</th>
	<th>Subcategoria</th>
	<th>Editar</th>
	<th>Eliminar</th>
</thead>
<tbody>
	@foreach($subcategorias as $subcategoria)

		<tr>
			<td>{{$subcategoria->id}}</td>
			<td>{{ $subcategoria->categoria->descripcion }}</td>
			<td>{{$subcategoria->descripcion}}</td>
			
			<td>
				<a href="{{route('subcategorias.edit',$subcategoria->id)}}" class="">editar</a>
			</td>
			<td>
				

				{{ Form::open(['method' => 'DELETE', 'route' => ['subcategorias.destroy', $subcategoria->id]]) }}
                     {{ Form::submit('X', ['class' => 'btn btn-danger']) }} 
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                {{ Form::close() }}
			</td>
		</tr>


	@endforeach

	
</tbody>


</table>
{!!$subcategorias->render()!!}

@endsection