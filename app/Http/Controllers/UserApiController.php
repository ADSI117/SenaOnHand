<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Midlleware\Cors;
use App\User;
class UserApiController extends Controller
{

  public function usuarios_todos(){
// graba aquiya  por fa ejecta el node.js
    $user= User::all();
    $response=['user'=>$user];
    return Response()->json($response,200);
  }


}
