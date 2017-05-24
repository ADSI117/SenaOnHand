@extends('template.main')
@section('title','Categorias')

@section('navbar')
	@include('template.navbar')
@endsection


@section('title-content')
	@section('title-content--header','Categorias')
	<!-- BUSCADOR -->
	{!! Form::open(['route'=>'categorias.index', 'method'=>'GET','class' => 'f-right form-search']) !!}

	<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
		<label class="mdl-button mdl-js-button mdl-button--icon" for="buscar_categoria">
				<i class="material-icons">search</i>
		</label>
		<div class="mdl-textfield__expandable-holder">
			{!! Form::text('descripcion', null, ['placeholder' => 'Buscar...', 'class' => 'mdl-textfield__input', 'id' => 'buscar_categoria']) !!}
			{{-- <label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label> --}}
		</div>
	</div>

	{!! Form::close() !!}
	<!--  FIN BUSCADOR -->
@endsection
@section('content')

	<!-- Colored FAB button -->
	<button
				data-action="{{route('categorias.store')}}"
				data-method="POST"
				onclick="showModalAccion(this.dataset)"
				class="show-dialog btn-float mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
		<i class="material-icons">add</i>
	</button>
	@if (count($errors) > 0)
				@foreach($errors->all() as $error)
					{{$error}}
				@endforeach
	@endif
	<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width">
		<thead>
			<tr class="ta-left fw-bold upcase">
				<th class="ta-left">Id</th>
				<th class="ta-left">Categorias</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categorias as $categoria)
				<tr>
					<td class="ta-left">{{$categoria->id}}</td>
					<td class="ta-left">{{$categoria->descripcion}}</td>
					<td>
						<button
							data-action="{{route('categorias.update', $categoria)}}"
							data-method="PUT"
							onclick="showModalAccion(this.dataset)"
							class="show-dialog mdl-button mdl-js-button mdl-button--icon btn-warning-flat">
							<i class="material-icons">edit</i>
						</button>
						{{ Form::open(['class'=>'d-ib','method' => 'DELETE', 'route' => ['categorias.destroy', $categoria->id]]) }}
						<button type="submit" class="mdl-button mdl-js-button mdl-button--icon btn-danger-flat">
							<i class="material-icons">delete</i>
						</button>
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!!$categorias->links('vendor.pagination.custom')!!}

	<dialog class="mdl-dialog mdl-dialog--full-width">
		{!!Form::open(['id' => 'form-accion'])!!}
		<h4 class="mdl-dialog__title title-content">Crear categoria</h4>
		<div class="mdl-dialog__content">

			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				{!! Form::label('descripcion','Nombre',['class' => 'mdl-textfield__label','id' => 'nombre']) !!}
				{!! Form::text('descripcion',null,['required','class' => 'mdl-textfield__input','id' => 'nombre'])!!}
			</div>
		</div>
		<div class="mdl-dialog__actions">
			<button type="submit" name="btnSubmit" class="mdl-button">Registrar</button>
			{{-- {!! Form::submit('Registrar',['class'=>'mdl-button'])!!} --}}
			<button type="button" class="mdl-button close">Cancelar</button>
		</div>
		{!!Form::close() !!}
	</dialog>

	<div aria-live="assertive" aria-atomic="true" aria-relevant="text" class="mdl-snackbar mdl-js-snackbar">
	    <div class="mdl-snackbar__text"></div>
	    <button type="button" class="mdl-snackbar__action"></button>
	</div>

@endsection

@section('js')
		<script src="https://unpkg.com/vue@2.3.3" charset="utf-8"></script>
		<script src="{{asset('js/AjaxRequest.js')}}"></script>
		<script src="{{asset('js/categorias.js')}}" charset="utf-8"></script>
@endsection
