<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calificacion;
use Auth;
use App\Publicacion;
use DB;
use App\TipoDenuncia;
use App\User;

class CalificacionesController extends Controller
{
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
      if ($request->estrellas < 1){
        flash('¡Debes seleccionarpor lo menos una estrella!')->error()->important();
        return redirect()->route('publicaciones.show', ['id' => $request->publicacion_id]);
      }
      $buscar =  Calificacion::where('publicacion_id', '=', $request->publicacion_id)
                              ->where('usuario_id', '=', Auth::user()->id)
                              ->first();

                              // dd($buscar);
      if ($buscar){

        flash('¡Ya ha calificado esta publicación!')->warning()->important();
        return redirect()->route('publicaciones.show', ['id' => $request->publicacion_id]);
      }

      $calificacion = new Calificacion();
      $calificacion->usuario_id = Auth::user()->id;
      $calificacion->publicacion_id = $request->publicacion_id;
      $calificacion->puntaje = $request->estrellas;
      if ($calificacion->save()){
        flash('Gracias por calificar.')->success()->important();
        $publicacion = Publicacion::find($request->publicacion_id);

        $num_cal = DB::table('tb_calificaciones')
                        ->where('publicacion_id', '=', $publicacion->id)->count();

        $sum_cal = DB::table('tb_calificaciones as c')
                        ->where('c.publicacion_id', '=', $publicacion->id)
                        // ->select('c.puntaje')
                        ->sum('c.puntaje');
                        // echo $num_cal. " -  " . $sum_cal;

        $publicacion->puntaje = $sum_cal / $num_cal;
        $publicacion->cant_cal = $num_cal;

        $publicacion->save();

        // TODO: Ojo verificar velocidad de procesamiento en servidor en los siguientes eventos

        $sum_puntaje = User::getSumPuntajePublicaciones($publicacion->user_id);

        $pub_calificadas = User::getNumPublicacionesCalificadas($publicacion->user_id);

        if ($pub_calificadas > 0){
          $promedio = $sum_puntaje/$pub_calificadas;
        }else{
          $promedio = 0;
        }

        $visitas = User::getNumVisitas($publicacion->user_id);

        $tipos_denuncias = TipoDenuncia::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id');
        return view ('main-panel.publicaciones.detalle', compact('publicacion','promedio','visitas', 'tipos_denuncias'));

      }else{
        flash('¡Hubo un error!')->warning()->important();
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
        //
    }
}
