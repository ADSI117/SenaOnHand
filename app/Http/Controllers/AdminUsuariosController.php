<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\TipoDoc;
use App\Sede;
use App\Grupo;
use Auth;
use App\Categoria;
use Storage;
use App\EstadoUsuario;

class AdminUsuariosController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request)
  {

    if ($request->filtro != ''){
      $usuarios = User::search($request->filtro)->orderBy('id','DESC')->paginate(5);

    }else {
      $usuarios = null;
    }
    // $tipos_docs = TipoDoc::orderBy('nombre','ASC');
    // $estados_usuarios = EstadoUsuario::orderBy('descripcion','ASC');

    return view('admin.admin-usuarios.index', compact('usuarios'));

  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
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
    $usuario->tipo_doc_id;
    $tipos_docs = TipoDoc::orderBy('nombre','ASC')->pluck('nombre', 'id');
    $usuario->estado_id;
    $estados_usuarios = EstadoUsuario::orderBy('descripcion','ASC')->pluck('descripcion', 'id');

    return view('admin.admin-usuarios.edit', compact('usuario', 'tipos_docs','estados_usuarios'));
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
    $usuario = Sede::find($id);
    $usuario->tipo_doc_id = $request->tipo_doc_id;
    $usuario->estado_id = $request->estado_id;
    $usuario->nombres = $request->nombres;
    $usuario->apellidos = $request->apellidos;
    $usuario->email = $request->email;

    if ($sede->save()){
      return '{ "estado": 1, "mensaje": "Registro actualizado"}';
    } else {
      return '{ "estado": 0, "mensaje": "Registro no pudo actualizarse"}';
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
