

 @extends('admin.template.main')
@section('title','Listar Centros')
@section('nombre','Listar Centros')
 

@section('content')


<a href="{{route('centros.create')}}" class="">Registrar Centros</a><hr>
<!-- BUSCADOR -->
	{!!Form::open(['route'=>'centros.index','method'=>'GET'])!!}
	<div class="form-group">
			{!! Form::text('descripcion',null,['placeholder'=>'buscar centros'])!!}
	</div>
	{!!Form::close() !!}
<!--  FIN BUSCADOR -->

<table class="">
<thead>
	<th>Id</th>
	<th>Regional</th>
	<th>Acrónimo</th>
	<th>Centro</th>
	<th>Editar</th>
	<th>Eliminar</th>
</thead>
<tbody>
	@foreach($centros as $centro)

		<tr>
			<td>{{$centro->id}}</td>
			<td>{{$centro->regional->descripcion}}</td>
			<td>{{$centro->acronimo}}</td>
			<td>{{$centro->descripcion}}</td>
			
			<td>
				<a href="{{route('centros.edit',$centro->id)}}" class="">editar</a>
			</td>
			<td>
				

				{{ Form::open(['method' => 'DELETE', 'route' => ['centros.destroy', $centro->id]]) }}
                     {{ Form::submit('X', ['class' => 'btn btn-danger']) }} 
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                {{ Form::close() }}
			</td>
		</tr>


	@endforeach

	
</tbody>


</table>
{!!$centros->render()!!}

@endsection