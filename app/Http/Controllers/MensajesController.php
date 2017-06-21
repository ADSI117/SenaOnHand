<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sala;
use App\Mensaje;
use Auth;
use App\User;
use App\Notifications\MensajeEnviado;

class MensajesController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('estado');
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
      // $usuarios = User::orderBy('id', 'desc')->pluck('nombres', 'id');
      // $usuarios = User::where('id', '!=', Auth::user()->id);
      $usuarios = User::all();

      // TODO: concatenar nombres y apellidos para llevar a la lista.

      return view('main-panel.mensajes.crear', compact('usuarios'));
        // dd($sala->encontrarOCrear(1, null, null));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar

        $this->validate($request, [
          'mensaje' => 'required',
          // 'usuario_amigo_id'  => 'required|exists:users,id'
        ]);

        // dd($request->sala_id);

        $sala = Sala::encontrarOCrear($request->sala_id, Auth::user()->id, $request->usuario_amigo_id, null);

        // echo "--Sala id: " . $sala->id;
        $mensaje = Mensaje::create([
                    'usuario_id'  =>  Auth::user()->id,
                    'sala_id'     => $sala->id,
                    'mensaje'     => $request->mensaje
                  ]);
        if ($mensaje){
          flash('Mensaje enviado.')->success()->important();
        }else{
          flash('¡Hubo un problema!')->success()->important();
        }

        // Actualizar updated_at de sala
        $sala->updated_at = date('Y-m-d H:i:s');
        $sala->save();

        // Enviar notificacion
        if (Auth::user()->id == $sala->usuario_amigo_id){
          // echo "--se alerta a usuario creador";
          $receptor = User::find($sala->usuario_creador_id);
        }else if (Auth::user()->id == $sala->usuario_creador_id) {
          // echo "--se alerta a usuario amigo";
          $receptor = User::find($sala->usuario_amigo_id);
        }


        $receptor->notify(new MensajeEnviado($mensaje));

        // return back();
        $mensajes = Mensaje::where('sala_id', '=', $sala->id)
                              ->orderBy('created_at', 'asc')
                              ->get();
        $cad = '';

        return view ('main-panel.mensajes.detalle', compact('sala', 'mensajes', 'cad'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mensaje = Mensaje::findOrFail($id);

        $sala = Sala::find($mensaje->sala_id);

        // Validar
        if($sala->usuario_amigo_id == Auth::user()->id || $sala->usuario_creador_id == Auth::user()->id){

          $mensajes = Mensaje::where('sala_id', '=', $sala->id)
          ->orderBy('created_at', 'asc')
          ->get();

          return view ('main-panel.mensajes.detalle', compact('sala', 'mensajes'));
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
