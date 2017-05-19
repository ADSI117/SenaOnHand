 @extends('admin.template.main')
@section('title','Programas')
@section('nombre','Listar Programas')
 

@section('content')


<a href="{{route('programas.create')}}" class="">Registrar Nuevo Programa</a><hr>

<!-- BUSCADOR -->
	{!!Form::open(['route'=>'programas.index','method'=>'GET'])!!}
	<div class="form-group">
			{!! Form::text('descripcion',null,['placeholder'=>'buscar programas'])!!}
	</div>
	{!!Form::close() !!}
<!--  FIN BUSCADOR -->

<table class="">
<thead>
	<th>Id</th>
	<th>Acronimo</th>
	<th>Nombre del Programa</th>
	<th>Editar</th>
	<th>Eliminar</th>
</thead>
<tbody>
	@foreach($programas as $programa)
		<tr>
			<td>{{$programa->id}}</td>
			<td>{{$programa->acronimo}}</td>
			<td>{{$programa->descripcion}}</td>
			
			<td>
				<a href="{{route('programas.edit',$programa->id)}}" class="">editar</a>
			</td>
			<td>				

				{{ Form::open(['method' => 'DELETE', 'route' => ['programas.destroy', $programa->id]]) }}
                    <!-- {{ Form::submit('X', ['class' => 'btn btn-danger']) }} -->
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                {{ Form::close() }}
			</td>
		</tr>


	@endforeach
</tbody>


</table>
{!!$programas->render()!!}

@endsection