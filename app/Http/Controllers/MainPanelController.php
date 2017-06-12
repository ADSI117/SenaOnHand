<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Imagen;
use App\TbSeguido;
use Auth;
use App\User;

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


      $publicaciones = Publicacion::orderBy('created_at', 'desc')->paginate(6);
      // dd($publicaciones);

      $imagenes = Imagen::all();
        return view('main-panel')->
        with('imagenes', $imagenes)
        ->with('publicaciones', $publicaciones)
        ->with('usuario', $usuario)
        ;
    }
}
