{{-- llama main blade --}}
@extends('template.main')
{{-- seteamos el titulo --}}
@section('title','Sedes')
{{-- Ponemos el vertical nav  --}}
@section('vNavbar')
  @include('template.v-navbar')
@endsection
{{-- horizontal nav --}}
@section('hNavbar')
  @include('template.h-navbar')
@endsection
{{-- titulo del contenido --}}
@section('title-content', 'Sedes')
{{-- poner el buscar al lado del titulo --}}
@section('search-content')
  <!-- BUSCADOR -->
  	{!!Form::open(['route'=>'sedes.index','method'=>'GET'])!!}
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
    <th class="ta-left">Acrónimo</th>
    <th class="ta-left">Sede</th>
    <th class="ta-left">Acciones</th>
  </tr>
</thead>
<tbody>
	@foreach($sedes as $sede)

		<tr>
			<td class="align-middle">{{$sede->id}}</td>
			<td class="align-middle">{{$sede->centro->descripcion}}</td>
			<td class="align-middle">{{$sede->acronimo}}</td>
			<td class="align-middle">{{$sede->descripcion}}</td>
			<td>
        <button data-toggle="modal" data-target="#modal-control"
            data-action="{{route('sedes.update', $sede->id) }}"
            data-method="PUT"
            data-ceni="{{$sede->centro->id}}"
            data-sedi="{{$sede->id}}"
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
