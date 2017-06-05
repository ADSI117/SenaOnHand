<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TipoDoc;
use App\Sede;
use App\Grupo;

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
      return view ('main-panel.usuarios.edit', compact('usuario', 'tipos_doc', 'sedes', 'grupos'));
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
        $usuario = User::find($id);

        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->profesion = $request->profesion;
        $usuario->tipo_doc_id = $request->tipo_doc_id;
        $usuario->num_doc = $request->num_doc;
        $usuario->fecha_nac = $request->fecha_nac;
        $usuario->sede_id = $request->sede_id;
        $usuario->grupo_id = $request->grupo_id;

        if ($request->file('imagen')){
          $imagen = $request->file('imagen');

          $nombre = 'soh_profile_' . time() . '.'. $imagen->getClientOriginalExtension();

          $direccion = public_path() . '/imagenes/perfiles/';



          $respuesta = $imagen->move($direccion, $nombre);

          if ($respuesta){
            $usuario->url_foto = $nombre;
          }
        }

        if ($usuario->save()){
          dd('Perfil actualizado');
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
