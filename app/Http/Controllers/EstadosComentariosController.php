<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoComentario;
use App\Http\Requests\RequestEstadoComentario;
use Illuminate\Support\Facades\Cache;

class EstadosComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

     /* //pasamos en un array los middlewares que queramos   
     

    $this->middleware('auth',['except'=>['show']]); 
    // luego le pasamos el parametro del middleware que creamos para que sea dinamico que seria el nombre del rol de la base de datos
    $this->middleware('roles:admin',['except'=>['edit','update','show']]); // hacemos un execept para que el usuario pueda modificar sus datos
    */
    }
    
    public function index()
    {
       $estados_comentarios = EstadoComentario::orderBy('id','ASC')->paginate(10);
        return view('admin.estados_comentarios.index')->with('estados_comentarios',$estados_comentarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.estados_comentarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestEstadoComentario $request)
    {
        $estados_comentarios = new EstadoComentario($request->all());
        $estados_comentarios->save();
       // Flash::success(' '.$tipos_denuncias->name.' se registro correctamente')->important();
        return redirect()->route('estados_comentarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return '¡Equivocacion!';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estado_comentario = EstadoComentario::find($id);
        // DD($user);
        return view('admin.estados_comentarios.edit')->with('estado_comentario',$estado_comentario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestEstadoComentario $request, $id)
    {
        $estado_comentario = EstadoComentario::find($id);
        $estado_comentario->descripcion = $request->descripcion;
        
        if ($estado_comentario->save()){
           //Flash::success('el tipo_denuncia fue editado')->important();
        }else{
           // Flash::success('el tipo_denuncia no se edito')->important();
        }

        return redirect()->route('estados_comentarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('Fx eliminar');
        $estado_comentario = EstadoComentario::find($id);
        $estado_comentario->delete();
        //Flash::warning('el tipo_denuncia '.$tipo_denuncia->descripcion.' fue destroyer')->important();
        return redirect()->route('estados_comentarios.index');
    }
}
