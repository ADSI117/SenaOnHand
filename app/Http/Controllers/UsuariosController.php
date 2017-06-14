<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TipoDoc;
use App\Sede;
use App\Grupo;
use Auth;
use App\Categoria;
use Storage;
use Response;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    //Generar link de activacion y enviar por correo
    public function getlink(){
      $usuario = User::find(Auth::user()->id);
      // dd(Auth::user()->id);
      $url = url('/').'/activar'.'?'.'usuario_id=' . Auth::user()->id . '&key=' . bcrypt($usuario->email);
      //TODO: Enviar correo con $url
      dd('Enlace de activación: ' . $url);
    }

    //Activar usuario
    public function activarUsuario(){
      $usuario = User::find($_GET['usuario_id']);
      // dd($_GET['key']);
      if (strcmp(bcrypt($usuario->email) , $_GET['key'])){
        $usuario->estado_id = 2;
        $usuario->save();

        $categorias = Categoria::all();
          return view ('main-panel.usuarios-categorias.index', compact('categorias'));

        //dd('Usuario activado');
        // Agregar categorias_usuarios
      }else{
        dd('Hubo un error!');
      }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('main-panel.usuarios.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function getImagen($url_foto){
      $ruta = storage_path("app/avatars/$url_foto");

      if (!\File::exists($ruta)) abort(404);

      $archivo = \File::get($ruta);

      $tipo = \File::mimeType($ruta);

      $respuesta = Response::make($archivo, 200);

      $respuesta->header('Content-Type', $tipo);
      return $respuesta;
      // var_dump ($respuesta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $usuario = User::find($id);
      $tipos_doc = TipoDoc::orderBy('nombre', 'desc')->pluck('nombre', 'id');
      $sedes = Sede::orderBy('descripcion', 'desc')->pluck('descripcion', 'id');
      $grupos = Grupo::orderBy('nombre', 'desc')->pluck('nombre', 'id');
      // dd($usuario);
      return view ('main-panel.usuarios.edit', compact('usuario', 'tipos_doc', 'sedes', 'grupos', 'imagen'));
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
      // Guardar imagen con nombres personalizado
      // $path = $request->file('imagen')->storeAs('avatars', Auth::user()->id . '.jpg');

      // Guardar imagen con nombre aleatorio
      // $path = Storage::putFile('avatars', $request->file('imagen'));
      // dd(url('/').'/'.$path);
      // dd(storage_path('app'));
      // $contents = Storage::get('//avatars/'.'2aZjxSUNzkn0IoulAtw0GflEbqZsDS41aFwLzD6u.png');
      // dd(Storage::url('2aZjxSUNzkn0IoulAtw0GflEbqZsDS41aFwLzD6u.jpg'));
      // dd($contents['name']);

        $usuario = User::find($id);

        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->profesion = $request->profesion;
        $usuario->tipo_doc_id = $request->tipo_doc_id;
        $usuario->num_doc = $request->num_doc;
        $usuario->fecha_nac = $request->fecha_nac;
        $usuario->sede_id = $request->sede_id;
        $usuario->grupo_id = $request->grupo_id;

        if ($request->hasFile('imagen') && $request->imagen->isValid()){
          $imagen = $request->file('imagen');

          $nombre = 'soh_profile_' . time() . '.'. $imagen->getClientOriginalExtension();
          // $path = $request->file('imagen')->storeAs('avatars', $nombre);
          $path = Storage::putFileAs('public', $request->file('imagen'), $nombre);


          if ($path){
            $usuario->url_foto = $nombre;
          }
        }

        if ($usuario->save()){
          flash('Perfil actualizado con exito')->success()->important();
          return back();
        }else{
          dd('Opps Hubo un error!!!');
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
