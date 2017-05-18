 @extends('admin.template.main')
@section('title','Listar Tipos de Documento')
@section('nombre','Listar Tipos de Documento')
 

@section('content')


<a href="{{route('tipos_docs.create')}}" class="">Registrar Tipo de Documento</a><hr>
<table class="">
<thead>
	<th>Id</th>
	<th>Tipo de Documento</th>
	<th>Editar</th>
	<th>Eliminar</th>
</thead>
<tbody>
	@foreach($tipos_docs as $tipo_doc)
		<tr>
			<td>{{$tipo_doc->id}}</td>
			<td>{{$tipo_doc->nombre}}</td>
			
			<td>
				<a href="{{route('tipos_docs.edit',$tipo_doc->id)}}" class="">editar</a>
			</td>
			<td>
				

				{{ Form::open(['method' => 'DELETE', 'route' => ['tipos_docs.destroy', $tipo_doc->id]]) }}
                    <!-- {{ Form::submit('X', ['class' => 'btn btn-danger']) }} -->
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                {{ Form::close() }}
			</td>
		</tr>


	@endforeach
</tbody>


</table>
{!!$tipos_docs->render()!!}

@endsection