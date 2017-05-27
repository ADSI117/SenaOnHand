<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoDoc;
use App\Http\Requests\RequestTipoDoc;

class TiposDocsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_docs = TipoDoc::orderBy('id','desc')->paginate(5);
        return view('admin.tipos_docs.index')->with('tipos_docs',$tipos_docs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.tipos_docs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestTipoDoc $request)
    {
        $tipos_docs = new TipoDoc($request->all());
        $tipos_docs->save();
       // Flash::success(' '.$tipos_denuncias->name.' se registro correctamente')->important();
        return redirect()->route('tipos_docs.index');
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
        $tipo_doc = TipoDoc::find($id);
        // DD($user);
        return view('admin.tipos_docs.edit')->with('tipo_doc',$tipo_doc);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestTipoDoc $request, $id)
    {
        $tipo_doc = TipoDoc::find($id);
        $tipo_doc->nombre = $request->nombre;
        
        if ($tipo_doc->save()){
           //Flash::success('el tipo_denuncia fue editado')->important();
        }else{
           // Flash::success('el tipo_denuncia no se edito')->important();
        }

        return redirect()->route('tipos_docs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_doc = TipoDoc::find($id);
        $tipo_doc->delete();
        //Flash::warning('el tipo_denuncia '.$tipo_denuncia->descripcion.' fue destroyer')->important();
        return redirect()->route('tipos_docs.index');
    }
}
