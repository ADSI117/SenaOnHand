 @extends('admin.template.main')
@section('title','Estados de Comentarios')
@section('nombre','Listar Estados de Comentarios')
 

@section('content')


<a href="{{route('estados_comentarios.create')}}" class="">Registrar Estado Comentario</a><hr>
<table class="">
<thead>
	<th>Id</th>
	<th>Estado de Comentario</th>
	<th>Editar</th>
	<th>Eliminar</th>
</thead>
<tbody>
	@foreach($estados_comentarios as $estado_comentario)
		<tr>
			<td>{{$estado_comentario->id}}</td>
			<td>{{$estado_comentario->descripcion}}</td>
			
			<td>
				<a href="{{route('estados_comentarios.edit',$estado_comentario->id)}}" class="">editar</a>
			</td>
			<td>				

				{{ Form::open(['method' => 'DELETE', 'route' => ['estados_comentarios.destroy', $estado_comentario->id]]) }}
                    <!-- {{ Form::submit('X', ['class' => 'btn btn-danger']) }} -->
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                {{ Form::close() }}
			</td>
		</tr>


	@endforeach
</tbody>


</table>
{!!$estados_comentarios->render()!!}

@endsection