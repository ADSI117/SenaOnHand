

 @extends('admin.template.main')
@section('title','Listar Centros')
@section('nombre','Listar Centros')
 

@section('content')


<a href="{{route('sedes.create')}}" class="">Registrar Sedes</a><hr>
<!-- BUSCADOR -->
	{!!Form::open(['route'=>'sedes.index','method'=>'GET'])!!}
	<div class="form-group">
			{!! Form::text('descripcion',null,['placeholder'=>'buscar sedes'])!!}
	</div>
	{!!Form::close() !!}
<!--  FIN BUSCADOR -->

<table class="">
<thead>
	<th>Id</th>
	<th>Centro</th>
	<th>Acrónimo</th>
	<th>Sede</th>
	<th>Editar</th>
	<th>Eliminar</th>
</thead>
<tbody>
	@foreach($sedes as $sede)

		<tr>
			<td>{{$sede->id}}</td>
			<td>{{$sede->centro->descripcion}}</td>
			<td>{{$sede->acronimo}}</td>
			<td>{{$sede->descripcion}}</td>
			
			<td>
				<a href="{{route('sedes.edit',$sede->id)}}" class="">editar</a>
			</td>
			<td>
				

				{{ Form::open(['method' => 'DELETE', 'route' => ['sedes.destroy', $sede->id]]) }}
                     {{ Form::submit('X', ['class' => 'btn btn-danger']) }} 
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                {{ Form::close() }}
			</td>
		</tr>


	@endforeach

	
</tbody>


</table>
{!!$sedes->render()!!}

@endsection