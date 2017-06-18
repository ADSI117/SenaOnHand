<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Mostrar listado de categorias iniciales para que el usuario haga primeros pasos -->

<div class="container">
  <div class="row">
    <h1>Primeros pasos</h1>
  </div>
  <div class="row">
    <ul>
      @foreach($categorias as $categoria)
        <li>
        {{$categoria->descripcion}}
          {!!Form::open(['route'=>'categoria-usuario.store', 'method' => 'POST'])!!}
            {!!Form::hidden('categoria_id', $categoria->id)!!}
            {!!Form::submit('Agregar', ['class'=>'btn btn-primary'])!!}
          {!!Form::close()!!}
        <br>
        </li>
      @endforeach
    </ul>
  </div>
  <div class="row">
    <a href="{{route('main-panel')}}" class=" btn btn-danger">Saltar este paso</a>
  </div>
</div>
