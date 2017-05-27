@extends('admin.template.main')
@section('title','Editar Centros' . $centro->descripcion)
@section('nombre','Editar Centros' . $centro->descripcion)
 

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

{!!Form::open(['route'=>['centros.update', $centro],'method'=>'PUT'])!!}
<div class="form-group">
	{!!form::label('Regional')!!}
	{!!form::select('regional_id', $regional, $centro->regional->id,['class' => 'form-control selector', 'required'])!!}
</div>
<div class="">
	{!!Form::label('acronimo','Acrónimo')!!}
	{!! Form::text('acronimo',$centro->acronimo,['placeholder'=>'acronimo','required'])!!}
</div>
<div class="">
	{!!Form::label('descripcion','Centro')!!}
	{!! Form::text('descripcion',$centro->descripcion,['placeholder'=>'centro','required'])!!}
</div>
<div class="">
{!! Form::submit('Editar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection
@section('js')
<script>
    $(".selector").chosen({
      // disable_search_threshold: 10,
      search_contains: true,
      no_results_text: 'No hay resultados',
      placeholder_text_single: 'Seleccion una opcion'
    });
  </script>
@endsection
