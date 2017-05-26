 @extends('admin.template.main')
@section('title','Listar Estados de Usuario')
@section('nombre','Listar Estados de Usuario')
 

@section('content')


<a href="{{route('estados_usuarios.create')}}" class="">Registrar Estado de Usuario</a><hr>
<table class="">
<thead>
	<th>Id</th>
	<th>Estado de Usuario</th>
	<th>Editar</th>
	<th>Eliminar</th>
</thead>
<tbody>
	@foreach($estados_usuarios as $estado_usuario)
		<tr>
			<td>{{$estado_usuario->id}}</td>
			<td>{{$estado_usuario->descripcion}}</td>
			
			<td>
				<a href="{{route('estados_usuarios.edit',$estado_usuario->id)}}" class="">editar</a>
			</td>
			<td>
				

				{{ Form::open(['method' => 'DELETE', 'route' => ['estados_usuarios.destroy', $estado_usuario->id]]) }}
                    <!-- {{ Form::submit('X', ['class' => 'btn btn-danger']) }} -->
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                {{ Form::close() }}
			</td>
		</tr>


	@endforeach
</tbody>


</table>
{!!$estados_usuarios->render()!!}

@endsection