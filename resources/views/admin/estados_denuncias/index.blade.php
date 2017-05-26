 @extends('admin.template.main')
@section('title','Listar Estados de Denuncias')
@section('nombre','Listar Estados de Denuncias')
 

@section('content')


<a href="{{route('estados_denuncias.create')}}" class="">Registrar Estado de Denuncia</a><hr>
<table class="">
<thead>
	<th>Id</th>
	<th>Estado de Denuncia</th>
	<th>Editar</th>
	<th>Eliminar</th>
</thead>
<tbody>
	@foreach($estados_denuncias as $estado_denuncia)
		<tr>
			<td>{{$estado_denuncia->id}}</td>
			<td>{{$estado_denuncia->descripcion}}</td>
			
			<td>
				<a href="{{route('estados_denuncias.edit',$estado_denuncia->id)}}" class="">editar</a>
			</td>
			<td>
				

				{{ Form::open(['method' => 'DELETE', 'route' => ['estados_denuncias.destroy', $estado_denuncia->id]]) }}
                     {{ Form::submit('', ['class' => 'btn btn-danger']) }} 
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                {{ Form::close() }}
			</td>
		</tr>


	@endforeach
</tbody>


</table>
{!!$estados_denuncias->render()!!}

@endsection