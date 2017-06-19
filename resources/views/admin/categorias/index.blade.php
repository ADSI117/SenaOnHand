@extends('template.admin')

@section('title','Categorias')

@section('title-content', 'Categorias')

@section('search-content')
	<div class="col-12">
		<div class="search-content">
		<!-- BUSCADOR -->
		{!! Form::open(['route'=>'categorias.index', 'method'=>'GET','class' => 'f-right form-search']) !!}
		<div class="input-group">
			{!! Form::text('descripcion', null,
				['placeholder' => 'Buscar...', 'class' => 'form-control', 'id' => 'buscar_categoria']) !!}
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
			data-action="{{route('categorias.store')}}"
			data-method="POST"
			onclick="showModalAccion(this.dataset)"
			class="btn btn-danger btn-icon btn-round">
			<i class="fa fa-plus"></i>
		</button>
	</div>

	@if (count($errors) > 0)
		@foreach($errors->all() as $error)
			{{$error}}
		@endforeach
	@endif
	<table class="table table-hover" id="table">
		<thead>
			<tr>
				<th class="ta-left">Id</th>
				<th class="ta-left">Categorias</th>
				<th class="ta-right">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categorias as $categoria)
				<tr data-tr="{{$categoria->id}}">
					<td class="align-middle">{{$categoria->id}}</td>
					<td class="align-middle">{{$categoria->descripcion}}</td>
					<td class="ta-right">
						<button
							data-toggle="modal" data-target="#modal-control"
							data-action="{{route('categorias.update', $categoria)}}"
							data-method="PUT"
							data-td="{{$categoria->id}}"
							onclick="showModalAccion(this.dataset)"
							class="btn btn-warning btn-icon btn-icon-mini btn-round">
								<i class="fa fa-pencil" aria-hidden="true"></i>
						</button>
					{{ Form::open(['class'=>'d-ib m-0','method' => 'DELETE', 'route' => ['categorias.destroy', $categoria->id]]) }}
					<button type="submit" class="btn btn-danger btn-icon btn-icon-mini btn-round">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
					{{ Form::close() }}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
{{-- Paginacion --}}
{!!$categorias->links('vendor.pagination.custom')!!}

{{-- <div aria-live="assertive" aria-atomic="true" aria-relevant="text" class="mdl-snackbar mdl-js-snackbar">
	<div class="mdl-snackbar__text"></div>
	<button type="button" class="mdl-snackbar__action"></button>
</div> --}}

@endsection

@section('modal-control')
	@extends('template.modal')
	@section('modal-title','Categoria')
	@section('modal-content')
		{!!Form::open(['id' => 'form-accion'])!!}
		<div class="modal-body">
		    <div class="form-group">
					{!! Form::text('descripcion',null,
						['placeholder' => 'Nombre categoria' ,
						 	'required',
							'class' => 'form-control'])!!}
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

	<script src="{{asset('js/categorias.js')}}" charset="utf-8"></script>
@endsection
