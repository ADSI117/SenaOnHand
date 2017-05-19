<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Centro;
use App\Sede;

class SedesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sedes = Sede::search($request->descripcion)->orderBy('id','ASC')->paginate(10);

        return view('admin.sedes.index', compact('sedes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centros = Centro::orderBy('descripcion', 'desc')->pluck('descripcion', 'id');

                             
        return view('admin.sedes.create',compact('centros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $sede = new Sede($request->all());
        $sede->save();
       // Flash::success(' '.$tipos_denuncias->name.' se registro correctamente')->important();
        return redirect()->route('sedes.index');
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
        $sede = Sede::find($id);
        $sede->centro;
        $centros = Centro::orderBy('descripcion', 'desc')->pluck('descripcion', 'id');
        return view ('admin.sedes.edit', ['sede'=>$sede, 'centros'=>$centros]);
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
        $sede = Sede::find($id);
        $sede->acronimo = $request->acronimo;
        $sede->descripcion = $request->descripcion;
        $sede->centro_id = $request->centro_id;
        
        if ($sede->save()){
           //Flash::success('el tipo_denuncia fue editado')->important();
        }else{
           // Flash::success('el tipo_denuncia no se edito')->important();
        }
        return redirect()->route('sedes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sede = Sede::find($id);
        $sede->delete();

        return redirect()->route('sedes.index');
    }
}
