<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Centro;
use App\Regional;
use App\Http\Requests\RequestCentro;

class CentrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $centros = Centro::search($request->descripcion)->orderBy('id','ASC')->paginate(10);

        return view('admin.centros.index', compact('centros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $regionales = Regional::orderBy('descripcion', 'desc')->pluck('descripcion', 'id');

                             
        return view('admin.centros.create',compact('regionales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCentro $request)
    {
        $centros = new Centro($request->all());
        $centros->save();
       // Flash::success(' '.$tipos_denuncias->name.' se registro correctamente')->important();
        return redirect()->route('centros.index');
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
        $centro = Centro::find($id);
        $centro->regional;
        $regional = Regional::orderBy('descripcion', 'desc')->pluck('descripcion', 'id');
        return view ('admin.centros.edit', ['centro'=>$centro, 'regional'=>$regional]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestCentro $request, $id)
    {
        $centro = Centro::find($id);
        $centro->acronimo = $request->acronimo;
        $centro->descripcion = $request->descripcion;
        $centro->regional_id = $request->regional_id;
        
        if ($centro->save()){
           //Flash::success('el tipo_denuncia fue editado')->important();
        }else{
           // Flash::success('el tipo_denuncia no se edito')->important();
        }

        return redirect()->route('centros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $centro = Centro::find($id);
        $centro->delete();

        return redirect()->route('centros.index');
    }
}
