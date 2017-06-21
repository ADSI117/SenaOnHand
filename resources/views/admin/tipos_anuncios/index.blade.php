@extends('template.admin')

@section('title','Tipos anuncios')

@section('title-content', 'Tipos de anuncios')

@section('search-content')
	<div class="col-12">
		<div class="search-content">
		<!-- BUSCADOR -->
		{!! Form::open(['route'=>'tipos_anuncios.index', 'method'=>'GET','class' => 'f-right form-search']) !!}
		<div class="input-group">
			{!! Form::text('descripcion', null,
				['placeholder' => 'Buscar...', 'class' => 'form-control', 'id' => 'buscar_tipo_anuncio']) !!}
				<span class="input-group-addon">
					<i class="fa fa-search" aria-hidden="true"></i>
				</span>
			</div>
			{!! Form::close() !!}
			<!--  FIN BUSCADOR -->
		</div>
	</div>
@endsection
@section('content')

<!-- Colored FAB button -->
	<div class="btn-float">
			<button data-toggle="modal" data-target="#modal-control"
			data-action="{{route('tipos_anuncios.store')}}"
			data-method="POST"
			onclick="showModalAccion(this.dataset)"
			class="btn btn-danger btn-icon btn-round">
			<i class="fa fa-plus"></i>
		</button>
	</div>

<table class="table table-hover" id="table">
<thead>
  <tr>
    <th class="ta-left">Id</th>
    <th class="ta-left">Tipo de Anuncio</th>
    <th class="ta-right">Acciones</th>
  </tr>
</thead>
<tbody>
	@foreach($tipos_anuncios as $tipo_anuncio)
		<tr data-tr="{{$tipo_anuncio->id}}">
			<td class="align-middle">{{$tipo_anuncio->id}}</td>
			<td class="align-middle">{{$tipo_anuncio->nombre}}</td>

			<td class="ta-right">
        <button
							data-toggle="modal" data-target="#modal-control"
							data-action="{{route('tipos_anuncios.update', $tipo_anuncio)}}"
							data-method="PUT"
							data-td="{{$tipo_anuncio->id}}"
							onclick="showModalAccion(this.dataset)"
							class="btn btn-warning btn-icon  btn-icon-mini btn-round">
								<i class="fa fa-pencil" aria-hidden="true"></i>
						</button>
				{{ Form::open(['class'=>'d-ib m-0','method' => 'DELETE', 'route' =>
        ['tipos_anuncios.destroy', $tipo_anuncio->id]]) }}
        <button type="submit" class="btn btn-danger btn-icon btn-icon-mini btn-round">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
        {{ Form::close() }}
			</td>
		</tr>
	@endforeach
</tbody>
</table>
{!!$tipos_anuncios->links('vendor.pagination.custom')!!}

@endsection


@section('modal-control')
	@extends('template.modal')
	@section('modal-title','tipos de anuncios')
	@section('modal-content')
		{!!Form::open(['id' => 'form-accion'])!!}
		<div class="modal-body">
		    <div class="form-group">
					{!! Form::text('nombre',null,
						['placeholder' => 'Nombre' ,
						 	'required',
							'class' => 'form-control',
							'id' => 'nombre'])!!}
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

	<script src="{{asset('js/tipos_anuncios.js')}}" charset="utf-8"></script>
@endsection
