@extends('admin.template.main')
@section('title','Crear Sede')
@section('nombre','Crear Sede')
 

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

{!!Form::open(['route'=>'sedes.store','method'=>'POST'])!!}
<div class="form-group">
      {!!Form::label('Centros')!!}
      {!!Form::select('centro_id', $centros, null,['class' => 'form-control selector', 'required'])!!}
 </div>

<div class="form-group">
	{!!Form::label('acronimo','Acrónimo')!!}
	{!! Form::text('acronimo',null,['placeholder'=>'acrónimo','required'])!!}
</div>
<div class="form-group">
	{!!Form::label('descripcion','Sede')!!}
	{!! Form::text('descripcion',null,['placeholder'=>'sede','required'])!!}
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

















