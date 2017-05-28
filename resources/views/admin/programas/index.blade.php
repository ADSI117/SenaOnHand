{{-- llama main blade --}}
@extends('template.main')
{{-- seteamos el titulo --}}
@section('title','Programas')
{{-- Ponemos el vertical nav  --}}
@section('vNavbar')
  @include('template.v-navbar')
@endsection
{{-- horizontal nav --}}
@section('hNavbar')
  @include('template.h-navbar')
@endsection
{{-- titulo del contenido --}}
@section('title-content', 'Programas')
{{-- poner el buscar al lado del titulo --}}
@section('search-content')
  <!-- BUSCADOR -->
  	{!!Form::open(['route'=>'programas.index','method'=>'GET'])!!}
  	<div class="input-group">
  			{!! Form::text('descripcion',null,
          ['placeholder'=>'Buscar...', 'class' => 'form-control'])!!}
          <span class="input-group-addon">
            <i class="fa fa-search"></i>
        </span>
  	</div>
  	{!!Form::close() !!}
  <!--  FIN BUSCADOR -->
@endsection
@section('content')

<div class='btn-float'>
  <button data-toggle="modal" data-target="#modal-control"
      type="button"
      data-action="{{route('programas.store')}}"
      data-method="POST"
      onclick="showModalAccion(this.dataset)"
      class="btn btn-danger btn-icon btn-round">
    <i class="fa fa-plus"></i>
  </button>
</div>

<table class="table table-hover">
<thead>
  <tr>
    <th class="ta-left">Id</th>
    <th class="ta-left">Acronimo</th>
    <th class="ta-left">Nombre del Programa</th>
    <th class="ta-right">Acciones</th>
  </tr>
</thead>
<tbody>
	@foreach($programas as $programa)
		<tr data-tr="{{$programa->id}}">
			<td>{{$programa->id}}</td>
			<td>{{$programa->acronimo}}</td>
			<td>{{$programa->descripcion}}</td>
			<td class="ta-right">
        <button
							data-toggle="modal" data-target="#modal-control"
							data-action="{{route('programas.update', $programa)}}"
							data-method="PUT"
							data-td="{{$programa->id}}"
							onclick="showModalAccion(this.dataset)"
							class="btn btn-warning btn-icon  btn-icon-mini btn-round">
								<i class="fa fa-pencil" aria-hidden="true"></i>
						</button>

				{{ Form::open(['class' => 'd-inline-block', 'method' => 'DELETE', 'route' => ['programas.destroy', $programa->id]]) }}
            <button type="submit" class="btn btn-danger btn-icon btn-icon-mini btn-round">
              <i class="fa fa-trash"></i>
            </button>
        {{ Form::close() }}
			</td>
		</tr>
	@endforeach
</tbody>
</table>
{!!$programas->links('vendor.pagination.custom')!!}

@endsection


@section('modal-control')
	@extends('template.modal')
	@section('modal-title','Programas')
	@section('modal-content')
		{!!Form::open(['id' => 'form-accion'])!!}
		<div class="modal-body">
		    <div class="form-group">
          {!! Form::text('acronimo', null,
						['placeholder' => 'Acronimo' ,
						 	'required',
							'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
					{!! Form::text('descripcion',null,
						['placeholder' => 'Nombre categoria' ,
						 	'required',
							'class' => 'form-control']) !!}
		    </div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
			<button type="submit" name="btnSubmit" class="btn btn-info btn-simple">Registrar</button>
			{{-- {!! Form::submit('Registrar',['class'=>'mdl-button'])!!} --}}
		</div>
		{!!Form::close() !!}
	@endsection
@endsection

@section('js')

	<script src="{{asset('js/Programas.js')}}" charset="utf-8"></script>
@endsection
