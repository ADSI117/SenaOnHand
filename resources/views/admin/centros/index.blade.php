@extends('template.admin')

@section('title','Centros')

@section('title-content', 'Centros')

@section('search-content')
	<div class="col-12">
		<div class="search-content">
			<!-- BUSCADOR -->
			{!! Form::open(['route'=>'centros.index', 'method'=>'GET','class' => 'f-right form-search']) !!}
			<div class="input-group">
				{!! Form::text('descripcion', null,
					['placeholder' => 'Buscar...', 'class' => 'form-control', 'id' => 'buscar_centro']) !!}
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
			<button
				data-toggle="modal" data-target="#modal-control"
				data-action="{{route('centros.store')}}"
				data-method="POST"
				onclick="showModalAccion(this.dataset)"
				class="btn btn-danger btn-icon btn-round">
					<i class="fa fa-plus"></i>
		</button>
	</div>

	<table class="table table-hover" id="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Regional</th>
				<th>Acrónimo</th>
				<th>Centro</th>
				<th class="ta-right">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($centros as $centro)
				<tr data-tr="{{$centro->id}}">
					<td>{{$centro->id}}</td>
					<td data-index="{{$centro->regional->id}}">{{$centro->regional->descripcion}}</td>
					<td>{{$centro->acronimo}}</td>
					<td>{{$centro->descripcion}}</td>
					<td class="ta-right">
						<button
						data-toggle="modal" data-target="#modal-control"
						data-action="{{route('centros.update', $centro->id) }}"
						data-method="PUT"
						data-td="{{$centro->id}}"
						onclick="showModalAccion(this.dataset)"
						class="btn btn-warning btn-icon btn-icon-mini">
						<i class="fa fa-pencil"></i>
					</button>
					{{ Form::open(['class' => 'd-inline-block', 'method' => 'DELETE', 'route' => ['centros.destroy', $centro->id]]) }}
					<button type="submit" class="btn btn-danger btn-icon btn-icon-mini">
						<i class="fa fa-trash"></i>
					</button>
					{{ Form::close() }}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
{!!$centros->links('vendor.pagination.custom')!!}

@endsection

@section('modal-control')
	@extends('template.modal')
	@section('modal-title','Categoria')
	@section('modal-content')
		{!!Form::open(['id' => 'form-accion'])!!}
		<div class="modal-body">
			<div class="form-group">
				{!! Form::select('regional_id', $regionales, null,
					['class'=>'form-control',
					'placeholder'=>'Seleccionar',
					'required'])!!}
				</div>
				<div class="form-group">
					{!! Form::text('acronimo',null,
						['placeholder'=>'acrónimo',
						'required',
						'class' => 'form-control'])!!}
				</div>
				<div class="form-group">
					{!! Form::text('descripcion',null,
						['placeholder' => 'Nombre' ,
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

			<script src="{{asset('js/centros.js')}}" charset="utf-8"></script>
		@endsection
