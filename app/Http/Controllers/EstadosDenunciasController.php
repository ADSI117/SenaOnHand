<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoDenuncia;

class EstadosDenunciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados_denuncias = EstadoDenuncia::orderBy('id','ASC')->paginate(10);
        return view('admin.estados_denuncias.index')->with('estados_denuncias',$estados_denuncias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.estados_denuncias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estados_denuncias = new EstadoDenuncia($request->all());
        $estados_denuncias->save();
       // Flash::success(' '.$tipos_denuncias->name.' se registro correctamente')->important();
        return redirect()->route('estados_denuncias.index');
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
         $estado_denuncia = EstadoDenuncia::find($id);
        // DD($user);
        return view('admin.estados_denuncias.edit')->with('estado_denuncia',$estado_denuncia);
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
        $estado_denuncia = EstadoDenuncia::find($id);
        $estado_denuncia->descripcion = $request->descripcion;
        
        if ($estado_denuncia->save()){
           //Flash::success('el tipo_denuncia fue editado')->important();
        }else{
           // Flash::success('el tipo_denuncia no se edito')->important();
        }

        return redirect()->route('estados_denuncias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado_denuncia = EstadoDenuncia::find($id);
        $estado_denuncia->delete();
        //Flash::warning('el tipo_denuncia '.$tipo_denuncia->descripcion.' fue destroyer')->important();
        return redirect()->route('estados_denuncias.index');
    }
}
