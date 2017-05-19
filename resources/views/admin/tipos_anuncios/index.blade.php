 @extends('admin.template.main')
@section('title','Listar Tipos de Anuncio')
@section('nombre','Listar Tipos de Anuncio')
 

@section('content')


<a href="{{route('tipos_anuncios.create')}}" class="">Registrar Tipo de Anuncio</a><hr>
<!-- BUSCADOR -->
	{!!Form::open(['route'=>'tipos_anuncios.index','method'=>'GET'])!!}
	<div class="form-group">
			{!! Form::text('nombre',null,['placeholder'=>'buscar tipos de anuncio'])!!}
	</div>
	{!!Form::close() !!}
<!--  FIN BUSCADOR -->
<table class="">
<thead>
	<th>Id</th>
	<th>Tipo de Anuncio</th>
	<th>Editar</th>
	<th>Eliminar</th>
</thead>
<tbody>
	@foreach($tipos_anuncios as $tipo_anuncio)
		<tr>
			<td>{{$tipo_anuncio->id}}</td>
			<td>{{$tipo_anuncio->nombre}}</td>
			
			<td>
				<a href="{{route('tipos_anuncios.edit',$tipo_anuncio->id)}}" class="">editar</a>
			</td>
			<td>
				

				{{ Form::open(['method' => 'DELETE', 'route' => ['tipos_anuncios.destroy', $tipo_anuncio->id]]) }}
                    <!-- {{ Form::submit('X', ['class' => 'btn btn-danger']) }} -->
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                {{ Form::close() }}
			</td>
		</tr>


	@endforeach
</tbody>


</table>
{!!$tipos_anuncios->render()!!}

@endsection