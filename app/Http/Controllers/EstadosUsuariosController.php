<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoUsuario;
use App\Http\Requests\RequestEstadoUsuario;

class EstadosUsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados_usuarios = EstadoUsuario::orderBy('id','desc')->paginate(5);
        return view('admin.estados_usuarios.index')->with('estados_usuarios',$estados_usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.estados_usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestEstadoUsuario $request)
    {
         $estados_usuarios = new EstadoUsuario($request->all());
        $estados_usuarios->save();
       // Flash::success(' '.$tipos_denuncias->name.' se registro correctamente')->important();
       return '{ "estado": 1, "mensaje": "Registro creado"}';
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
         $estado_usuario = EstadoUsuario::find($id);
        // DD($user);
        return view('admin.estados_usuarios.edit')->with('estado_usuario',$estado_usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestEstadoUsuario $request, $id)
    {
        $estado_usuario = EstadoUsuario::find($id);
        $estado_usuario->descripcion = $request->descripcion;

        if ($estado_usuario->save()){
          return '{ "estado": 1, "mensaje": "Registro actualizado"}';
       }else{
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
        $estado_usuario = EstadoUsuario::find($id);
        $estado_usuario->delete();
        //Flash::warning('el tipo_denuncia '.$tipo_denuncia->descripcion.' fue destroyer')->important();
        return redirect()->route('estados_usuarios.index');
    }
}
