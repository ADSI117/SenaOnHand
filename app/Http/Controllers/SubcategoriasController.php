<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategoria;
use App\Categoria;

class SubcategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subcategorias = Subcategoria::search($request->descripcion)->orderBy('id','DESC')->paginate(5);
        $categorias = Categoria::orderBy('id', 'asc')->pluck('descripcion', 'id');

        return view('admin.subcategorias.index', compact('subcategorias', 'categorias'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view ('admin.subcategorias.create');
        $categorias = Categoria::orderBy('descripcion', 'desc')->pluck('descripcion', 'id');


        return view('admin.subcategorias.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategorias = new Subcategoria($request->all());
        $subcategorias->save();
         return '{ "estado": 1, "mensaje": "Registro guardado"}';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return "{ 'listo': 'Errorrr al store.' }";
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
        $Subcategoria = Subcategoria::find($id);
        $Subcategoria->categoria;
        // DD($user);
        //return view('admin.subcategorias.edit')->with('Subcategoria',$Subcategoria);
        $categorias = Categoria::orderBy('descripcion', 'desc')->pluck('descripcion', 'id');
        return view ('admin.subcategorias.edit', ['subcategoria'=>$Subcategoria, 'categorias'=>$categorias]);
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
        //dd($request->all());
        $subcategoria = Subcategoria::find($id);
        $subcategoria->descripcion = $request->descripcion;
        $subcategoria->categoria_id = $request->categoria_id;

        if ($subcategoria->save()){
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
        $subcategoria = Subcategoria::find($id);
        $subcategoria->delete();

        return redirect()->route('subcategorias.index');
    }
}
