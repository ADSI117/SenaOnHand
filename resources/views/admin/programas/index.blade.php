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
    <th class="ta-left">Acciones</th>
  </tr>
</thead>
<tbody>
	@foreach($programas as $programa)
		<tr>
			<td class="align-middle">{{$programa->id}}</td>
			<td class="align-middle">{{$programa->acronimo}}</td>
			<td class="align-middle">{{$programa->descripcion}}</td>

			<td class="ta-right">
        <button
							data-toggle="modal" data-target="#modal-control"
							data-action="{{route('programas.update', $programa)}}"
							data-method="PUT"
							data-i="{{$programa->id}}"
							onclick="showModalAccion(this.dataset)"
							class="btn btn-neutral btn-icon  btn-icon-mini btn-round">
								<i class="fa fa-pencil" aria-hidden="true"></i>
						</button>

				{{ Form::open(['class' => 'd-inline-block', 'method' => 'DELETE', 'route' => ['programas.destroy', $programa->id]]) }}
            <button type="submit" class="btn btn-neutral btn-icon btn-icon-mini btn-round">
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
