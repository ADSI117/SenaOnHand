<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@extends('layouts.app')

@section('content')
<div class="container-fluid">

                    <table class="table" border="1" width="100%">
                      <tr>
                        <td width="25%">Lateral izquierdo</td>
                        <td width="50%">Central</td>
                        <td width="25%">Lateral derecho</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <h1>Nueva publicacion</h1>
                          <a href="{{route('publicaciones.create')}}">IR</a>
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <h1>Ultimas publicaciones</h1>
                          @foreach ($publicaciones as $publicacion)
                          <h3>{{$publicacion->titulo}}</h3>
                          <p>{{$publicacion->contenido}}</p>
                          @endforeach
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <h1>Últimas imagenes</h1>
                          @foreach ($imagenes as $imagen)
                            <img src="/imagenes/publicaciones/{{$imagen->descripcion}}" alt="">
                          @endforeach
                        </td>
                        <td></td>
                      </tr>
                    </table>

</div>
@endsection
