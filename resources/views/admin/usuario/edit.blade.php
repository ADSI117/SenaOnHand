@extends('template.admin')
{{-- seteamos el titulo --}}
@section('title','Usuario')
{{-- titulo del contenido --}}
@section('title-content', 'Usuario edit')
{{-- poner el buscar al lado del titulo --}}
@section('search-content')



    <form method="post" action="{{route('usuario.update',$user->id)}}">
    	{!! method_field('PUT') !!}
            {{csrf_field()}}
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombres" required value="{{$user->nombres}}" class="form-control" placeholder="Nombre...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="direccion">Profesion</label>
                <input type="text" name="profesion" value="{{$user->nombres}}" class="form-control" placeholder="profesion...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Estado</label>
                <select name="estado_id" class="form-control">
                    @if ($user->estado_id===2)
                        <option value="2" selected>Activo</option>
                        <option value="1">sin activar</option>
                        <option value="3">Suspendido</option>

                   @elseif($user->estado_id===1)
                       <option value="2">Activo</option>
                       <option value="1" selected>sin Activar</option>
                       <option value="2">Suspendido</option>
                    @else
                        <option value="3">suspendido</option>
                       <option value="1">Sin activar</option>
                       <option value="1" selected>Activo</option>
                    @endif
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Email</label>
                <input type="email" name="email" value="" class="form-control" placeholder="Email...">
            </div>
        </div>

           <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">password</label>
                <input type="email" name="email" value="" class="form-control" placeholder="Email...">
            </div>
        </div>

              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">password confirmar papu</label>
                <input type="email" name="email" value="" class="form-control" placeholder="Email...">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>
    </div>



	</form>




@endsection
