@extends('admin.template.main')
@section('title','Editar el Tipo de Documento' . $tipo_doc->nombre)
@section('nombre','Editar el Tipo de Documento' . $tipo_doc->nombre)
 

@section('content')
@if (count($errors) > 0)
<div class="alert alert-info" role="alert">
<ul>
	@foreach($errors->all() as $error)
	
		<li> {{$error}}</li>
	
	@endforeach
	
	</ul>
	</div>
@endif

{!!Form::open(['route'=>['tipos_docs.update', $tipo_doc],'method'=>'PUT'])!!}
<div class="">
{!!Form::label('nombre','Documento')!!}
{!! Form::text('nombre',$tipo_doc->nombre,['placeholder'=>'tipo de documento','required'])!!}
</div>
<div class="">
{!! Form::submit('Editar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection
