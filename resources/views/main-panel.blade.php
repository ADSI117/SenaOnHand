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
                        <td>
                          <div>
                            <!-- Imagen de péfil -->
                            @if(Auth::user()->url_foto)
                                <img src="/imagenes/perfiles/{{Auth::user()->url_foto}}" alt="" class="img-responsive img-circle">
                            @else
                              <img src="/imagenes/perfiles/soh_profile_default.png" alt="" class="img-responsive img-circle">
                            @endif

                          </div>
                          <div>
                            <h3>{{Auth::user()->nombres}} {{Auth::user()->apellidos}}</h3>
                          </div>
                          <a href="{{route('usuarios.edit', Auth::user()->id)}}" class=" btn btn-primary">Edit perfil</a>
                        </td>
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
                            <div class="row">
                              <div class="col-md-4">
                                <img src="/imagenes/publicaciones/{{$imagen->descripcion}}" alt="" class="img-responsive">
                              </div>
                            </div>
                          @endforeach
                        </td>
                        <td></td>
                      </tr>
                    </table>

</div>
@endsection
