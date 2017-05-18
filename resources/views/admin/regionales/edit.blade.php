@extends('admin.template.main')
@section('title','Editar Regional' . $regional->descripcion)
@section('nombre','Editar Regional' . $regional->descripcion)
 

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

{!!Form::open(['route'=>['regionales.update', $regional],'method'=>'PUT'])!!}
<div class="">
{!!Form::label('descripcion','Regional')!!}
{!! Form::text('descripcion',$regional->descripcion,['placeholder'=>'regional','required'])!!}
</div>
<div class="">
{!! Form::submit('Editar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection
