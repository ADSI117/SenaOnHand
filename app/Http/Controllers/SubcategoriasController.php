<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategoria;
use App\Categoria;
use App\Http\Requests\RequestSubcategoria;
use Illuminate\Support\Facades\Cache;

class SubcategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

     /* //pasamos en un array los middlewares que queramos   
     

    $this->middleware('auth',['except'=>['show']]); 
    // luego le pasamos el parametro del middleware que creamos para que sea dinamico que seria el nombre del rol de la base de datos
    $this->middleware('roles:admin',['except'=>['edit','update','show']]); // hacemos un execept para que el usuario pueda modificar sus datos
    */
    }
    
    public function index(Request $request)
    {
        $subcategorias = Subcategoria::search($request->descripcion)->orderBy('id','ASC')->paginate(10);
        // dd($subcategorias);
        //return view('admin.subcategorias.index')->with('subcategorias',$subcategorias);
        return view('admin.subcategorias.index', compact('subcategorias'));
        
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
    public function store(RequestSubcategoria $request)
    {
        $subcategorias = new Subcategoria($request->all());
        $subcategorias->save();
       // Flash::success(' '.$tipos_denuncias->name.' se registro correctamente')->important();
        return redirect()->route('subcategorias.index');
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
    public function update(RequestSubcategoria $request, $id)
    {
        //dd($request->all());
        $subcategoria = Subcategoria::find($id);
        $subcategoria->descripcion = $request->descripcion;
        $subcategoria->categoria_id = $request->categoria_id;
        
        if ($subcategoria->save()){
           //Flash::success('el tipo_denuncia fue editado')->important();
        }else{
           // Flash::success('el tipo_denuncia no se edito')->important();
        }

        return redirect()->route('subcategorias.index');
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
