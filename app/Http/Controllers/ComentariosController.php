<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;
use Auth;
use App\Denuncia;

class ComentariosController extends Controller
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
        //
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

        $comentario = new Comentario();
        $comentario->usuario_id = Auth::user()->id;
        $comentario->publicacion_id = $request->publicacion_id;;
        $comentario->comentario = $request->comentario;
        $comentario->estado_id = 1;
        if ($comentario->save()){
          flash('Comentario publicado')->success()->important();
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
        $comentario = Comentario::find($id);
        $comentario->estado_id = 2;
        $denuncia = Denuncia::find($request->denuncia_id);
        // dd($denuncia);
        $denuncia->estado_id = 2;

        $denuncia->save();

        if ($comentario->save()){
          flash('El comentario se ha borrado')->success()->important();
          return back();
        }else{
          flash('¡Hubo un error!')->success()->important();
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
      if (Comentario::find($id)->delete()){
        flash('Comentario eliminado')->success()->important();
        return back();
      }else{
        flash('Hubo un error')->error()->important();
        return back();
      }
    }
}
