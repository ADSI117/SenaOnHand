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
use App\Archivo;
use App\Video;

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
      $publicacion->user_id = Auth::user()->id;
      $publicacion->estado_id = $request->estado_id;

      if ($publicacion->save()){

        //ingresar tags
        if ($request->tags){
          // $tags = explode(',', $request->tags);

          foreach ($request->tags as $tag) {
            $publicacion->tags()->attach($tag);
          }

        }

        //verificar si hay imagen y guardar
        if ($request->file('imagen')){
          //Manipular las imagenes.
          $imagen = $request->file('imagen');
          //cambiar nombre a imagen
          $nombre = 'soh_' . time() . '.'. $imagen->getClientOriginalExtension();
          //definir la ubicacion
          $direccion = public_path() . '/imagenes/publicaciones/';

          $respuesta = $imagen->move($direccion, $nombre);
          // dd($respuesta);
          //Guardar el registro en tabla imagenes enlazado a la publicacion
          $ima = new Imagen();
          $ima->descripcion = $nombre;
          $ima->publicacion()->associate($publicacion);
          $ima->save();
        }

        //verificar si hay archivo y guardarlo
        if ($request->file('archivo')){
          // dd($request->file('archivo')->getClientOriginalExtension());
          //Manipular las imagenes.
          $archivo = $request->file('archivo');

          //cambiar nombre a imagen
          $nombre = 'soh_arh_' . time() . '.'. $archivo->getClientOriginalExtension();
          //definir la ubicacion

          $direccion = public_path() . '/archivos/publicaciones/';

          $respuesta = $archivo->move($direccion, $nombre);
          // dd($respuesta);
          //Guardar el registro en tabla archivos enlazado a la publicacion
          $arh = new Archivo();

          $arh->descripcion = $nombre;
          $arh->publicacion()->associate($publicacion);
          $arh->save();
        }

        //verificar si hay url de video y guardarlo
        if ($request->video){

          $video = new video();

          $video->descripcion = $request->video;
          $video->publicacion()->associate($publicacion);
          $video->save();
        }



        return back();
      }else{
        dd('Hubo un error!');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $publicacion = Publicacion::find($id);

      $imagenes = $publicacion->imagenes->all();

      $archivos = $publicacion->archivos->all();

      $videos = $publicacion->videos->all();

      // dd($imagenes);

        return view ('main-panel.publicaciones.detalle', compact('publicacion', 'imagenes', 'archivos', 'videos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publicacion = Publicacion::find($id);

        $estados = EstadoPublicacion::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id');
        $subcategorias = Subcategoria::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id');
        $tags = Tag::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id');
        // dd($estados);
          return view ('main-panel.publicaciones.editar')
                      ->with('publicacion', $publicacion)
                      ->with('subcategorias', $subcategorias)
                      ->with('tags', $tags)
                      ->with('estados', $estados);
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
      $publicacion = Publicacion::find($id);
      $publicacion->titulo = $request->titulo;
      $publicacion->contenido = $request->contenido;
      $publicacion->subcategoria_id = $request->subcategoria_id;
      // $publicacion->usuario_id = Auth::user()->id;
      $publicacion->user_id = Auth::user()->id;
      $publicacion->estado_id = $request->estado_id;

      if ($publicacion->save()){

        //ingresar tags
        if ($request->tags){
          // $tags = explode(',', $request->tags);

          // foreach ($request->tags as $tag) {
            $publicacion->tags()->sync($request->tags);
          // }

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
          //Guardar el registro en tabla imagenes enlazado a la publicacion
          $ima = new Imagen();
          $ima->descripcion = $nombre;
          $ima->publicacion()->associate($publicacion);
          $ima->save();
        }

        //verificar si hay archivo y guardarlo
        if ($request->file('archivo')){
          // dd($request->file('archivo')->getClientOriginalExtension());
          //Manipular las imagenes.
          $archivo = $request->file('archivo');

          //cambiar nombre a imagen
          $nombre = 'soh_arh_' . time() . '.'. $archivo->getClientOriginalExtension();
          //definir la ubicacion

          $direccion = public_path() . '/archivos/publicaciones/';

          $respuesta = $archivo->move($direccion, $nombre);
          // dd($respuesta);
          //Guardar el registro en tabla archivos enlazado a la publicacion
          $arh = new Archivo();

          $arh->descripcion = $nombre;
          $arh->publicacion()->associate($publicacion);
          $arh->save();
        }

        //verificar si hay url de video y guardarlo
        if ($request->video){

          $video = new video();

          $video->descripcion = $request->video;
          $video->publicacion()->associate($publicacion);
          $video->save();
        }

        return back();

      }else{
        dd('Hubo un error!');
      }

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
