<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\User;
use Auth;
use App\UsuarioCategoria;
use DB;

class CategoriasUsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // dd('Index de categorias');
      $categorias = DB::select('select c.* from tb_categorias as c
                              where c.id not in (
                              select uc.categoria_id from usuario_categoria as uc
                              where uc.user_id = '.Auth::user()->id.' and uc.categoria_id = c.id
                              )
                              group by c.id, c.nombre, c.descripcion, c.url_imagen, c.created_at, c.updated_at');

      $categorias = collect($categorias);


      // $categorias = Categoria::whereHas('usuario', function ($query){
      //   $query->where('user_id', '=', Auth::user()->id);
      // })->get();

      // dd($categorias);
      $instructores = User::where('rol_id', '=', '2')
                            // ->orderBy('puntaje', 'desc')
                            ->paginate(12);
        return view ('main-panel.usuarios-categorias.index', compact('categorias', 'instructores'));
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
        $usuario = User::find(Auth::user()->id);

        $registro = UsuarioCategoria::where('user_id', '=', $usuario->id)
                              ->where('categoria_id', '=', $request->categoria_id)
                              ->first();

        if(!$registro){
          $respuesta = $usuario->categorias()->attach($request->categoria_id);
          flash('Se ha agregado esta categoría')->success()->important();
          return back();

        }else{
          flash('Ya sigues esta categoría')->warning()->important();
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
      // dd('eliminar relacion usuario categoria');

        $usuario = User::find(Auth::user()->id);
        if($usuario->categorias()->detach($id)){
            return back();
        }else{
          dd('Error');
        }
    }
}
