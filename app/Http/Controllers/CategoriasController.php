<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Http\Requests\RequestCategoria;
use Storage;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorias = Categoria::search($request->descripcion)->orderBy('id','DESC')->paginate(5);
        return view('admin.categorias.index')->with('categorias',$categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCategoria $request)
    {
      // dd($request->all());

      if ($request->hasFile('url_imagen') && $request->url_imagen->isValid()){
        $imagen = $request->file('url_imagen');

        $nombre = 'soh_profile_' . time() . '.'. $imagen->getClientOriginalExtension();

        // dd($nombre);
        // $path = $request->file('imagen')->storeAs('avatars', $nombre);
        $path = Storage::putFileAs('public', $request->file('url_imagen'), $nombre);

        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;

        if ($path){
          $categoria->url_imagen = $nombre;
        }
      }

        $categoria->save();
       // Flash::success(' '.$tipos_denuncias->name.' se registro correctamente')->important();
        return '{ "estado": 1, "mensaje": "Registro creado"}';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return 'Equivocacion!';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $categoria = Categoria::find($id);
        // DD($user);
        return view('admin.categorias.edit')->with('categoria',$categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestCategoria $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->descripcion = $request->descripcion;

        if ($categoria->save()){
           return '{ "estado": 1, "mensaje": "Registro actualizado"}';
        }else{
           return '{ "estado": 0, "mensaje": "Registro no pudo actualizarse"}';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        //Flash::warning('el tipo_denuncia '.$tipo_denuncia->descripcion.' fue destroyer')->important();
        return redirect()->route('categorias.index');
    }
}
