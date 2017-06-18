<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Imagen;

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

      $publicaciones = Publicacion::orderBy('created_at', 'desc')->get();
      $imagenes = Imagen::all();
        return view('main-panel')->
        with('imagenes', $imagenes)
        ->with('publicaciones', $publicaciones);
    }
}
