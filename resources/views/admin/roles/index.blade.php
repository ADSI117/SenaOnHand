 @extends('admin.template.main')
@section('title','Listar Roles')
@section('nombre','Listar Roles')
 

@section('content')


<a href="{{route('roles.create')}}" class="">Registrar Rol</a><hr>
<table class="">
<thead>
	<th>Id</th>
	<th>Rol</th>
	<th>Editar</th>
	<th>Eliminar</th>
</thead>
<tbody>
	@foreach($roles as $rol)
		<tr>
			<td>{{$rol->id}}</td>
			<td>{{$rol->descripcion}}</td>
			
			<td>
				<a href="{{route('roles.edit',$rol->id)}}" class="">editar</a>
			</td>
			<td>
				

				{{ Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $rol->id]]) }}
                     {{ Form::submit('X', ['class' => 'btn btn-danger']) }} 
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                {{ Form::close() }}
			</td>
		</tr>


	@endforeach
</tbody>


</table>
{!!$roles->render()!!}

@endsection