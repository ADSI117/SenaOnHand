<?php

namespace App\Traits;


use App\TbSeguido;
use Auth;


trait seguirdor

{

	public  function testTraits(){
		return "funciona perfectamente";
	}



	public function add_seguidores($user_id){

		$seguidor =	TbSeguido::create([
				'usuario_seguidor_id'=>Auth::user()->id,
				'usuario_seguido_id'=>$user_id,
				'estado'=>1
			]);
		if($seguidor){
			return  $seguidor;

		}else{
			return "revizar las rutas papus no las cambien :D";
		}
	}

}
