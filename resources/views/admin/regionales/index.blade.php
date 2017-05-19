@extends('admin.template.main')
@section('title','Listar Regionales')
@section('nombre','Listar Regionales')
 

@section('content')


<a href="{{route('regionales.create')}}" class="">Registrar Regional</a><hr>
<!-- BUSCADOR -->
	{!!Form::open(['route'=>'regionales.index','method'=>'GET'])!!}
	<div class="form-group">
			{!! Form::text('descripcion',null,['placeholder'=>'buscar regionales'])!!}
	</div>
	{!!Form::close() !!}
<!--  FIN BUSCADOR -->

<table class="">
<thead>
	<th>Id</th>
	<th>Regional</th>
	<th>Editar</th>
	<th>Eliminar</th>
</thead>
<tbody>
	@foreach($regionales as $regional)
		<tr>
			<td>{{$regional->id}}</td>
			<td>{{$regional->descripcion}}</td>
			
			<td>
				<a href="{{route('regionales.edit',$regional->id)}}" class="">editar</a>
			</td>
			<td>
				

				{{ Form::open(['method' => 'DELETE', 'route' => ['regionales.destroy', $regional->id]]) }}
                     {{ Form::submit('X', ['class' => 'btn btn-danger']) }} 
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                {{ Form::close() }}
			</td>
		</tr>


	@endforeach
</tbody>


</table>
{!!$regionales->render()!!}

@endsection