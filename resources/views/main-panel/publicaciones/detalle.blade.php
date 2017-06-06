<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style media="screen">
  #form {
  width: 250px;
  margin: 0 auto;
  height: 50px;
  }

  #form p {
  text-align: center;
  }

  #form label {
  font-size: 20px;
  }

  input[type="radio"] {
  display: none;
  }

  label {
  color: grey;
  }

  .clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
  }

  label:hover,
  label:hover ~ label {
  color: orange;
  }

  input[type="radio"]:checked ~ label {
  color: orange;
  }

</style>

<h1>Detalle de una publicacion</h1>
<h2>{{$publicacion->titulo}}</h2>

<h3>Autor: <a href="{{route('instructores.show', [$publicacion->user_id])}}">{{$publicacion->user->nombres}}</a></h3>
<p>Fecha {{ date('Y-m-d', strtotime($publicacion->created_at)) }}</p>
<p><img src="/imagenes/perfiles/{{$publicacion->user->url_foto}}" alt="" width="50" height="50"></p>
<p>{{$publicacion->contenido}}</p>

@if($imagenes)
  <h3>Imagenes</h3>
  @foreach($imagenes as $imagen)
    <img src="/imagenes/publicaciones/{{$imagen->descripcion}}" alt="" width="150" height="150">
  @endforeach
@endif

@if($archivos)
  <h3>Archivos</h3>
  @foreach($archivos as $archivo)

  @endforeach
@endif

@if($videos)
  <h3>Vídeos</h3>
  @foreach($videos as $video)

  @endforeach
@endif

<form id="form">
  <p class="clasificacion">
    <input id="radio1" type="radio" name="estrellas" value="5"><!--
    --><label for="radio1">★</label><!--
    --><input id="radio2" type="radio" name="estrellas" value="4"><!--
    --><label for="radio2">★</label><!--
    --><input id="radio3" type="radio" name="estrellas" value="3"><!--
    --><label for="radio3">★</label><!--
    --><input id="radio4" type="radio" name="estrellas" value="2"><!--
    --><label for="radio4">★</label><!--
    --><input id="radio5" type="radio" name="estrellas" value="1"><!--
    --><label for="radio5">★</label>
  </p>
</form>
