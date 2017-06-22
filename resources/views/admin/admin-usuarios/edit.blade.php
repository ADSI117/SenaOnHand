
@extends('template.admin')

@section('title','Administración Usuarios')

@section('title-content', 'Administración de Usuarios')

@section('content')

	{!!Form::open(['route'=>['admin-usuarios.update',$usuario],'method'=>'PUT'])!!}
		  <div class="header header-primary text-center">
        <h4 class="title title-up" >Editar Usuario</h4>
      </div>


      <div class="form-group form-group-no-border">
          {!!Form::text('nombres', $usuario->nombres, ['id' => 'nombres', 'placeholder' => 'Nombres', 'required', 'class' => 'form-control'])!!}
      </div>

      <div class="form-group form-group-no-border">
          {!!Form::text('apellidos', $usuario->apellidos, ['id' => 'apellidos', 'placeholder' => 'Apellidos', 'required', 'class' => 'form-control'])!!}
      </div>

      <div class="form-group form-group-no-border">
          {!! Form::select('tipo_doc_id', $tipos_docs, $usuario->tipo_doc_id, [ 'required', 'class' => 'form-control']) !!}
      </div>

      <div class="form-group form-group-no-border">
          {!!Form::text('num_doc', $usuario->num_doc, ['id' => 'num_doc', 'placeholder' => 'Numero de Documento', 'required', 'class' => 'form-control'])!!}
      </div>

      <div class="form-group form-group-no-border">
        {!! Form::select('estado_id', $estados_usuarios, $usuario->estado_id, [ 'required', 'class' => 'form-control']) !!}
      </div>

      <div class="form-group form-group-no-border">
          {!!Form::text('email', $usuario->email, ['id' => 'email', 'placeholder' => 'Email', 'required', 'class' => 'form-control'])!!}
      </div>

      <div class="form-group form-group-no-border">
          {!!Form::Submit('Editar Usuario', ['class' => 'btn btn-primary'])!!}
      </div>


@endsection
