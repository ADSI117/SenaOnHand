<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Denuncia;
use DB;

class GesDenunciasController extends Controller
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
      $denuncias =DB::table('tb_denuncias as d')
                      ->leftjoin('users as u', 'u.id', 'd.usuario_id')
                      ->leftjoin('tb_estados_denuncias as ed', 'ed.id', 'd.estado_id')
                      ->leftjoin('tb_tipos_denuncias as td', 'td.id', 'd.tipo_id')
                      ->leftjoin('tb_comentarios as c', 'c.id', 'd.comentario_id')
                      ->leftjoin('tb_publicaciones as p', 'p.id', 'd.publicacion_id')
                      ->select('d.*', 'u.nombres', 'u.apellidos', 'ed.descripcion as desc_den',
                       'td.descripcion as tip_den', 'c.comentario',
                       'p.titulo', 'ed.descripcion as estado')
                       ->where ('d.estado_id', '=', 1)
                      ->paginate(12);
      // dd($denuncias);
      return view('admin.ges-denuncias.index', compact('denuncias'));
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
