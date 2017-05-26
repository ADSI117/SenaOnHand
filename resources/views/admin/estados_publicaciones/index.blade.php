 @extends('admin.template.main')
@section('title','Listar Estados de Publicación')
@section('nombre','Listar Estados de Publicación')
 

@section('content')


<a href="{{route('estados_publicaciones.create')}}" class="">Registrar Estado de Publicación</a><hr>
<table class="">
<thead>
	<th>Id</th>
	<th>Estado de Publicación</th>
	<th>Editar</th>
	<th>Eliminar</th>
</thead>
<tbody>
	@foreach($estados_publicaciones as $estado_publicacion)
		<tr>
			<td>{{$estado_publicacion->id}}</td>
			<td>{{$estado_publicacion->descripcion}}</td>
			
			<td>
				<a href="{{route('estados_publicaciones.edit',$estado_publicacion->id)}}" class="">editar</a>
			</td>
			<td>
				

				{{ Form::open(['method' => 'DELETE', 'route' => ['estados_publicaciones.destroy', $estado_publicacion->id]]) }}
                     {{ Form::submit('X', ['class' => 'btn btn-danger']) }} 
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                {{ Form::close() }}
			</td>
		</tr>


	@endforeach
</tbody>


</table>
{!!$estados_publicaciones->render()!!}

@endsection