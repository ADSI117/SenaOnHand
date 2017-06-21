@extends('template.layout')


@section('main')
@include('template.h-navbar')
	<div class="page-banner" style="background-color:#2196F3;">
		<div class="container">
			<h1 class="text-capitalize page-banner--title">
				{{$publicacion->titulo}}
			</h1>
		 <div class="d-flex justify-content-start">
			 <div class="d-flex align-items-baseline mr-4">
				<i class="fa fa-clock-o mr-2"></i> {{ date('Y-m-d', strtotime($publicacion->created_at)) }}
			</div>
			<div class="d-flex align-items-baseline mr-4">
				<i class="fa fa-leaf mr-2"></i> {{$publicacion->puntaje}}
			</div>
			<div class="d-flex align-items-baseline mr-4">
				<i class="fa fa-eye mr-2"></i> {{$publicacion->num_visitas}}
			</div>
		 </div>
				{{-- Fecha actualizado: {{ date('Y-m-d', strtotime($publicacion->created_at)) }} --}}

		</div>
		@if(Auth::user()->id == $publicacion->user_id)
		<div class="btn-float-page">
			<a href="{{route('publicaciones.edit', $publicacion->id)}}" class="btn btn-warning btn-icon btn-round">
				<i class="fa fa-pencil"></i>
			</a>
		</div>
		@endif
	</div>
	<div class="container mb-5">
		<div class="row">
			<!-- Mensaje flash -->
			@include('flash::message')

			<div class="col">
				<div class="d-flex align-items-center">
					<img  class="mr-3"
								src="{{Storage::url($publicacion->user->url_foto)}}"
								alt="foto de perfil"
								width="70" height="70"/>
					<div class="d-flex flex-column">
						<span class="d-flex align-items-baseline">
							<i class="fa fa-user mr-2"></i>
							<a href="{{route('instructores.show', [$publicacion->user_id])}}" class="material-link">
								{{$publicacion->user->nombres}} {{$publicacion->user->apellidos}}
							</a>
						</span>
							
						<div class="d-flex align-items-baseline">
							<i class="fa fa-bookmark mr-2"></i> {{$publicacion->user->publicaciones->count()}} publicaciones.
						</div>
						<div class="d-flex align-items-baseline">
							<i class="fa fa-leaf mr-2"></i> {{round($promedio, 2)}}
						</div>
					</div>
				</div>
			</div>
			<div class="col-6 justify-content-end">
				{!!Form::open(['route' => 'calificaciones.store', 'id' => 'form'])!!}
					{!!Form::hidden('publicacion_id', $publicacion->id)!!}
					<p class="clasificacion">
						{{-- {!!Form::submit('Calificar', ['class' => 'material-btn'])!!} --}}
						<input id="radio1" type="radio" name="estrellas" value="5">
						<label for="radio1"><i class="fa fa-leaf"></i></label>
						<input id="radio2" type="radio" name="estrellas" value="4">
						<label for="radio2"><i class="fa fa-leaf"></i></label>
						<input id="radio3" type="radio" name="estrellas" value="3">
						<label for="radio3"><i class="fa fa-leaf"></i></label>
						<input id="radio4" type="radio" name="estrellas" value="2">
						<label for="radio4"><i class="fa fa-leaf"></i></label>
						<input id="radio5" type="radio" name="estrellas" value="1">
						<label for="radio5"><i class="fa fa-leaf"></i></label>
					</p>
				{!!Form::close()!!}
			</div>
		</div>

		<div class="row">
			<div class="col">
				<h4 class="display-4 text-capitalize">{{$publicacion->titulo}}</h4>
				<hr />
				<p class="lead mt-4 mb-4 text-capitalize">
					{{$publicacion->contenido}}
				</p>
			</div>
		</div>

		@if($publicacion->imagenes)
		<div class='row mt-5 justify-content-center'>
			<div class="col">
				<h3><i class="fa fa-picture-o mr-2"></i>Imagenes</h3>
				<hr />
			</div>
			<div class="w-100"></div>
			@foreach($publicacion->imagenes as $imagen)
				<div class="col-xs-12 col-md-6 col-lg-4 col-xl-3">
					<img src="{{ Storage::url($imagen->descripcion) }}" alt="" class="img-fluid">
				</div>
			@endforeach
		</div>
		@endif

		@if($publicacion->archivos->all())
		<div class="row mt-5">
			<div class="col">
				<h3><i class="fa fa-file-text mr-2"></i>Archivos</h3>
				<hr />
				@foreach($publicacion->archivos as $archivo)
					<!-- TODO: como mostrar los archivos -->
					<!-- {{$archivo->descripcion}} -->
					<a href="{{ Storage::url($archivo->descripcion) }}" target="_blank">
						<i class="fa fa-file-pdf-o mr-2"></i>{{$archivo->descripcion}}
					</a>
				@endforeach
			</div>
		</div>
		@endif

		@if($publicacion->videos->all())
			<div class="row mt-5">
				<div class="col">
					<div class="embed-responsive embed-responsive-21by9">
					@foreach($publicacion->videos as $video)
						<!-- TODO: como mostrar los videos -->
						<iframe class="embed-responsive-item" src="{{$video->descripcion}}" frameborder="0" allowfullscreen></iframe>
					@endforeach
					</div>
				</div>
			</div>
		@endif


		<div class="row mt-5">
			<div class="col">
				<h3><i class="fa fa-tags mr-2"></i> tags</h3>
				<hr />
				<span class="chip">
					{{$publicacion->subcategoria->descripcion}}
				</span>
				<span class="chip">
					{{$publicacion->subcategoria->categoria->descripcion}}
				</span>
				@if($publicacion->tags)
					@foreach($publicacion->tags as $tag)
						<span class="chip">
							{{$tag->descripcion}}
						</span>
					@endforeach
				@endif
			</div>
		</div>
</div>

<div class="container">

	<div class="row">
		<div class="col">
			@include('flash::message')
		</div>
	</div>

	<div class="row">
		<div class="col">
			<!-- Formulario para comentarios. -->
			<div class="card">
				<div class="card-block">
					<h3><i class="fa fa-commenting-o mr-2"></i>Comentarios</h3>
					{!!Form::open(['route'=>'comentarios.store', 'method' => 'POST'])!!}
						<div class="form-group">
							{!!Form::hidden('publicacion_id', $publicacion->id)!!}
							{!!Form::text('comentario', null, ['placeholder'=>'Comentar...', 'class'=>'material-input', 'required'])!!}
						</div>
						<div class="form-group text-right">
							{!!Form::submit('Enviar', ['class'=>'btn-indigo material-btn'])!!}
						</div>
					{!!Form::close()!!}

					<hr />
					@foreach($publicacion->comentarios as $comentario)
						<div class="card card-outline-primary mb-3">
							<div class="card-block">
								<blockquote class="card-blockquote">
									<p>{{$comentario->comentario}}</p>
									<footer>Publicado por:<cite title="Source Title">{{$comentario->user->nombres}}</cite></footer>
								</blockquote>
							</div>
						</div>
						{!!Form::open(['route'=>'denuncias.store', 'method' => 'POST'])!!}
						{!!Form::hidden('comentario_id', $comentario->id)!!}
						{!!Form::hidden('publicacion_id', $publicacion->id)!!}
						<!-- TODO: Hacer el siguiente campo visible cuando se termine el frontend -->
						{!!Form::text('comentario', null, ['required', 'placeholder' => 'Comentar...', 'class' => 'material-input'])!!}
						{!!Form::select('tipo_denuncia', $tipos_denuncias, $comentario->tipo_id, ['class'=>'form-control'])!!}

						<br>
						{!!Form::submit('Denunciar', ['class'=>'btn btn-primary'])!!}
						{!!Form::close()!!}

						<!-- Formulario de eliminacion -->
						@if(Auth::user()->id == $comentario->usuario_id || Auth::user()->id == $publicacion->usuario_id || Auth::user()->rol_id == 3)
							{!!Form::open(['route' => ['comentarios.destroy', $comentario->id], 'method' => 'DELETE'])!!}
							{!!Form::submit('Eliminar', ['class'=>'btn btn-primary'])!!}
							{!!Form::close()!!}
						@endif
					@endforeach

				</div>
			</div>
			
		</div>
	</div>

</div>

@endsection
