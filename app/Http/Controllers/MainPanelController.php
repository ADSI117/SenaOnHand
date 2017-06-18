<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Imagen;
use App\TbSeguido;
use Auth;
use App\User;
use DB;
use App\Categoria;

class MainPanelController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $seguidos = TbSeguido::all()->where('usuario_seguidor_id', '=', Auth::user()->id);
      $usuario = User::find(Auth::user()->id);


      // $publicaciones = Publicacion::orderBy('created_at', 'desc')->paginate(12);

      $publicaciones = DB::table('tb_publicaciones as p')
                            ->leftJoin('users as u', 'u.id', '=', 'p.user_id')
                            ->leftJoin('tb_subcategorias as s', 's.id', '=', 'p.subcategoria_id')
                            ->leftjoin('tb_categorias as c', 'c.id', '=', 's.categoria_id')
                            ->leftjoin('usuario_categoria as uc', 'uc.categoria_id', '=', 'c.id')
                            ->where('uc.user_id', '=', $usuario->id)
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
                                      'u.nombres',
                                      'u.apellidos',
                                      'u.url_foto')
                            ->orderBy('p.updated_at', 'desc')
                            ->paginate(12);

          $categorias = Categoria::all();

                            // dd($publicaciones);
      // dd($publicaciones);


        return view('main-panel', compact('publicaciones', 'usuario', 'categorias'));
    }
}
