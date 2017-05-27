<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoAnuncio;
use App\Http\Requests\RequestTipoAnuncio;

class TiposAnunciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipos_anuncios = TipoAnuncio::search($request->nombre)->orderBy('id','desc')->paginate(5);
        return view('admin.tipos_anuncios.index')->with('tipos_anuncios',$tipos_anuncios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.tipos_anuncios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestTipoAnuncio $request)
    {
        $tipos_anuncios = new TipoAnuncio($request->all());
        $tipos_anuncios->save();
       // Flash::success(' '.$tipos_denuncias->name.' se registro correctamente')->important();
        return redirect()->route('tipos_anuncios.index');
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
        $tipo_anuncio = TipoAnuncio::find($id);
        // DD($user);
        return view('admin.tipos_anuncios.edit')->with('tipo_anuncio',$tipo_anuncio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestTipoAnuncio $request, $id)
    {
        $tipo_anuncio = TipoAnuncio::find($id);
        $tipo_anuncio->nombre = $request->nombre;
        
        if ($tipo_anuncio->save()){
           //Flash::success('el tipo_denuncia fue editado')->important();
        }else{
           // Flash::success('el tipo_denuncia no se edito')->important();
        }

        return redirect()->route('tipos_anuncios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_anuncio = TipoAnuncio::find($id);
        $tipo_anuncio->delete();
        //Flash::warning('el tipo_denuncia '.$tipo_denuncia->descripcion.' fue destroyer')->important();
        return redirect()->route('tipos_anuncios.index');
    }
}
