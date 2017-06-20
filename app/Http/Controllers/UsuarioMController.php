<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Cache;
use App\EstadoUsuario;
class UsuarioMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 
public function __construct(){

     /* pasamos en un array los middlewares que queramos   
     */

    $this->middleware('auth',['except'=>['show']]); 
    // luego le pasamos el parametro del middleware que creamos para que sea dinamico que seria el nombre del rol de la base de datos
    $this->middleware('roles:Admin'); // hacemos un execept para que el usuario pueda modificar sus datos
}



    public function index()

    {
     
           $key ="usuario.page." . request('page',1);  
            $user = Cache::rememberForever($key,function(){

            return User::orderBy('id','desc')->paginate(7);    

             });

          $estado= EstadoUsuario::orderBy('id','desc')->pluck('descripcion','id'); 
    

       return view('admin.usuario.index',compact('user','estado'));
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //return "bien papu :D";
        $user = Cache::rememberForever("usuario.{$id}",function() use($id){ // algo avanzado papu :D para el chache aprenda animal
            return  User::findOrFail($id); // findOrFail() es mejor papu  find es del diablo :V de vuelve un 404 si no encuetra el id la pagina
        }); 
      $estado= EstadoUsuario::orderBy('id','desc')->pluck('descripcion','id');

      return view('admin.usuario.edit',compact('user','estado'));

        
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
