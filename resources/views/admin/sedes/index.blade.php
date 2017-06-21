{{-- llama main blade --}}
@extends('template.admin')
{{-- seteamos el titulo --}}
@section('title','Sedes')
{{-- titulo del contenido --}}
@section('title-content', 'Sedes')
{{-- poner el buscar al lado del titulo --}}
@section('search-content')
  <!-- BUSCADOR -->
  	<div class="col-12">
	<div class="search-content">
  	{!!Form::open(['route'=>'sedes.index','method'=>'GET','class'=>'f-right form-search'])!!}
  	<div class="input-group">
  			{!! Form::text('descripcion',null,
          ['placeholder'=>'Buscar...', 'class' => 'form-control'])!!}
          <span class="input-group-addon">
            <i class="fa fa-search"></i>
        </span>
  	</div>
  	</div>
  	</div>
  	{!!Form::close() !!}
  <!--  FIN BUSCADOR -->
@endsection


@section('content')

<div class='btn-float'>
  <button data-toggle="modal" data-target="#modal-control"
      type="button"
      data-action="{{route('sedes.store')}}"
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
    <th class="ta-left">Centro</th>
    <th class="ta-left">Sede</th>
    <th class="ta-right">Acciones</th>
  </tr>
</thead>
<tbody>
	@foreach($sedes as $sede)

		<tr data-tr="{{$sede->id}}">
			<td>{{$sede->id}}</td>
			<td data-index="{{$sede->centro->id}}">{{$sede->centro->descripcion}}</td>
			<td>{{$sede->descripcion}}</td>
			<td class="ta-right">
        <button data-toggle="modal" data-target="#modal-control"
            data-action="{{route('sedes.update', $sede->id) }}"
            data-method="PUT"
            data-td="{{$sede->id}}"
            onclick="showModalAccion(this.dataset)"
            class="btn btn-warning btn-icon btn-icon-mini">
          <i class="fa fa-pencil"></i>
        </button>
				{{ Form::open(['class' => 'd-inline-block', 'method' => 'DELETE', 'route' => ['sedes.destroy', $sede->id]]) }}
           <button type="submit" class="btn btn-danger btn-icon btn-icon-mini">
             <i class="fa fa-trash"></i>
           </button>
        {{ Form::close() }}
			</td>
		</tr>
	@endforeach
</tbody>
</table>
{!!$sedes->links('vendor.pagination.custom')!!}

@endsection

@section('modal-control')
	@extends('template.modal')
	@section('modal-title','Sedes')
	@section('modal-content')
		{!!Form::open(['id' => 'form-accion'])!!}
		<div class="modal-body">
			<div class="form-group">
				{!! Form::select('centro_id', $centros, null,
					['class'=>'form-control',
					'placeholder'=>'Seleccionar',
					'required'])!!}
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

			<script src="{{asset('js/sedes.js')}}" charset="utf-8"></script>
		@endsection
