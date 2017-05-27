<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoDenuncia;
use App\Http\Requests\RequestTipoDenuncia;

class TiposDenunciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // dd('Soy tipos de denuncias');
       $tipos_denuncias = TipoDenuncia::orderBy('id','desc')->paginate(5);
      //  dd($tipos_denuncias);
        return view('admin.tipos_denuncias.index')->with('tipos_denuncias',$tipos_denuncias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.tipos_denuncias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestTipoDenuncia $request)
    {
        $tipos_denuncias = new TipoDenuncia($request->all());
        $tipos_denuncias->save();
       // Flash::success(' '.$tipos_denuncias->name.' se registro correctamente')->important();
        return redirect()->route('tipos_denuncias.index');
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
        $tipo_denuncia = TipoDenuncia::find($id);
        // DD($user);
        return view('admin.tipos_denuncias.edit')->with('tipo_denuncia',$tipo_denuncia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestTipoDenuncia $request, $id)
    {
        $tipo_denuncia = TipoDenuncia::find($id);
        $tipo_denuncia->descripcion = $request->descripcion;

        if ($tipo_denuncia->save()){
           //Flash::success('el tipo_denuncia fue editado')->important();
        }else{
           // Flash::success('el tipo_denuncia no se edito')->important();
        }

        return redirect()->route('tipos_denuncias.index');
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
        $tipo_denuncia = TipoDenuncia::find($id);
        $tipo_denuncia->delete();
        //Flash::warning('el tipo_denuncia '.$tipo_denuncia->descripcion.' fue destroyer')->important();
        return redirect()->route('tipos_denuncias.index');
    }
}
