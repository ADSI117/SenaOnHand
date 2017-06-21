<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Publicacion;

class BusquedasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->filtro){
          $query = $request->filtro;
          // dd($query);
           $idRol=2;


            $publicaciones = DB::table('tb_publicaciones as p')
                          ->leftJoin('publicacion_tag as pt', 'pt.publicacion_id', '=', 'p.id')
                          ->leftJoin('tb_tags as t', 't.id', '=', 'pt.tag_id')
                          ->leftJoin('users as u', 'u.id', '=', 'p.user_id')
                          ->where('p.titulo', 'like', "%$query%")
                          ->orWhere('p.contenido', 'like', "%$query%")
                          ->orWhere('t.descripcion', 'like', "%$query%")
                          ->select('p.*', 'u.nombres as nombres', 'u.apellidos as apellidos', 'u.url_foto as url_foto')
                          ->groupBy('p.id',
                                    'p.user_id',
                                    'p.subcategoria_id',
                                    'p.estado_id',
                                    'p.titulo',
                                    'p.contenido',
                                    'p.created_at',
                                    'p.updated_at',
                                    'p.puntaje',
                                    'p.cant_cal',
                                    'num_visitas',
                                    'u.nombres',
                                    'u.apellidos',
                                    'u.url_foto')
                          ->orderBy('p.updated_at', 'desc')
                          ->get();

            $usuarios = DB::table('users as u')
                                // ->select('u.id', 'u.nombres', 'u.apellidos', 'u.email')
                                ->select('u.*')
                                ->where('u.email', 'like', "%$query%")
                                ->orWhere('u.nombres', 'like', "%$query%")
                                ->orWhere('u.perfil', 'like', "%$query%")
                                ->get();

                                // dd($instructores);
                          // dd($publicaciones);
            return view ('main-panel.busquedas.index', compact('publicaciones', 'usuarios', 'query'));

        }
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
