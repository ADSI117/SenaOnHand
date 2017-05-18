@extends('admin.template.main')
@section('title','Crear Centro')
@section('nombre','Crear Centro')
 

@section('content')

@if (count($errors) > 0)
<div class="">
<ul>
	@foreach($errors->all() as $error)
	
		<li> {{$error}}</li>
	
	@endforeach
	
	</ul>
	</div>
@endif

{!!Form::open(['route'=>'centros.store','method'=>'POST'])!!}

<div class="form-group">
      {!!Form::label('Regional')!!}
      {!!Form::select('regional_id', $regionales, null,['class' => 'form-control selector', 'required'])!!}
 </div>

 <div class="form-group">
	{!!Form::label('acronimo','Acrónimo')!!}
	{!! Form::text('acronimo',null,['placeholder'=>'acrónimo','required'])!!}
</div>

<div class="form-group">
	{!!Form::label('descripcion','Centro')!!}
	{!! Form::text('descripcion',null,['placeholder'=>'centro','required'])!!}
</div>

<div class="">
{!! Form::submit('Registrar',['class'=>''])!!}
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

















