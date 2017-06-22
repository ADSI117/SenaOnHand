<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Denuncia;
use Auth;

class DenunciasController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');

  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $denuncia = new Denuncia();
        $denuncia->usuario_id = Auth::user()->id;
        $denuncia->comentario_id = $request->comentario_id;
        $denuncia->publicacion_id = $request->publicacion_id;
        $denuncia->tipo_id = $request->tipo_denuncia;

        $denuncia->estado_id = 1;
        $denuncia->comentario = $request->comentario;

        if ($denuncia->save()){
          flash('Se ha enviado la denuncia')->success()->important();
          return back();
        }else{
          flash('Hubo un error')->error()->important();
          return back();
        }
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
        //
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
        $denuncia = Denuncia::find($id);
        $denuncia->estado_id = 2;
        if($denuncia->save()){
          flash('La denuncia se a borrado')->success()->important();
          return back();
        }else{
          flash('¡HUbo un error!')->success()->important();
          return back();
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
