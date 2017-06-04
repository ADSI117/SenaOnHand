<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategoria;
use App\Tag;
use App\Publicacion;
use Auth;
use App\Imagen;
// use Storage;
use App\EstadoPublicacion;

class PublicacionesController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $estados = EstadoPublicacion::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id');
      $subcategorias = Subcategoria::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id');
      $tags = Tag::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id');
      // dd($estados);
        return view ('main-panel.publicaciones.crear')
                    ->with('subcategorias', $subcategorias)
                    ->with('tags', $tags)
                    ->with('estados', $estados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $publicacion = new Publicacion();
      $publicacion->titulo = $request->titulo;
      $publicacion->contenido = $request->contenido;
      $publicacion->subcategoria_id = $request->subcategoria_id;
      // $publicacion->usuario_id = Auth::user()->id;
      $publicacion->usuario_id = 2;
      $publicacion->estado_id = $request->estado_id;

      if ($publicacion->save()){

        //ingresar tags
        if ($request->tags){
          // $tags = explode(',', $request->tags);

          foreach ($request->tags as $tag) {
            $publicacion->tags()->attach($tag);
          }

        }

        //verificar si hay archivo y guardarlo
        if ($request->file('imagen')){
          //Manipular las imagenes.
          $imagen = $request->file('imagen');
          //cambiar nombre a imagen
          $nombre = 'soh_' . time() . '.'. $imagen->getClientOriginalExtension();
          //definir la ubicacion
          $direccion = public_path() . '/imagenes/publicaciones/';

          $respuesta = $imagen->move($direccion, $nombre);
          // dd($respuesta);
        }

        //Guardar el registro en tabla imagenes enlazado a la publicacion
        $ima = new Imagen();
        $ima->descripcion = $nombre;
        $ima->publicacion()->associate($publicacion);
        $ima->save();
        dd('Publicacion guardada');
      }else{
        dd('Hubo un error!');
      }





        dd($path);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
