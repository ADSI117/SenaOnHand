<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TbSeguido;
use Auth;

class SeguidosController extends Controller
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
        $usuario = Auth::user();

        return view ('main-panel.suscripciones.index', compact('usuario'));
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
      if ($request->seguir_id == Auth::user()->id){
        dd('NO se puede seguir a usted mismo');
      }

        $registro = TbSeguido::where('usuario_seguido_id', '=', $request->seguir_id)
                              ->where('usuario_seguidor_id', '=', Auth::user()->id)
                              ->first();

        if(!$registro){
          $seguidor =	TbSeguido::create([
    				'usuario_seguidor_id'=>Auth::user()->id,
    				'usuario_seguido_id'=>$request->seguir_id,
    				'estado_id'=>1
    			]);
          return back();
        }else{
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $registro = TbSeguido::find($id);
      if($registro->delete()){
          return back();
      }else{
        dd('Error');
      }


    }
}
