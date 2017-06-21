<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sala;
use App\Mensaje;
use Auth;
class SalasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $salas = Sala::where('usuario_amigo_id', '=', Auth::user()->id)
                      ->orWhere('usuario_creador_id', '=', Auth::user()->id)
                      ->orderBy('updated_at', 'desc')
                      ->get();


      return view ('main-panel.salas-chats.index', compact ('salas'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $sala = Sala::find($id);
      // $mensajes = Mensaje::where('sala_id', '=', $sala->id);


                            // Validar
      if($sala->usuario_amigo_id == Auth::user()->id || $sala->usuario_creador_id == Auth::user()->id){

        $mensajes = Mensaje::where('sala_id', '=', $sala->id)
                          ->orderBy('created_at', 'asc')
                          ->get();

        $cad = "";
        return view ('main-panel.mensajes.detalle', compact('sala', 'mensajes', 'cad'));

      }else{
        return back();
      }


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
        //
    }
}
