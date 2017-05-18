 @extends('admin.template.main')
@section('title','Listar tipos de denuncia')
@section('nombre','Listar tipos de denuncia')
 

@section('content')


<a href="{{route('tipos_denuncias.create')}}" class="">Registrar Tipo de Denuncia</a><hr>
<table class="">
<thead>
	<th>Id</th>
	<th>Tipo de Denuncia</th>
	<th>Editar</th>
	<th>Eliminar</th>
</thead>
<tbody>
	@foreach($tipos_denuncias as $tipo_denuncia)
		<tr>
			<td>{{$tipo_denuncia->id}}</td>
			<td>{{$tipo_denuncia->descripcion}}</td>
			
			<td>
				<a href="{{route('tipos_denuncias.edit',$tipo_denuncia->id)}}" class="">editar</a>
			</td>
			<td>
				

				{{ Form::open(['method' => 'DELETE', 'route' => ['tipos_denuncias.destroy', $tipo_denuncia->id]]) }}
                    <!-- {{ Form::submit('X', ['class' => 'btn btn-danger']) }} -->
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                {{ Form::close() }}
			</td>
		</tr>


	@endforeach
</tbody>


</table>
{!!$tipos_denuncias->render()!!}

@endsection