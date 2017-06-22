<?php

use Illuminate\Http\Request;



// listo aqui vamos crear los contraladores no van hacer resource lo vamos ahcer a mano igual es muy fann_cascadetrain_on_file
// usuarios provemos que me devuelva todos los usuatios primero

// no lo veo


Route::get('usuarios_todos',[
  'uses'=>'UserApiController@usuarios_todos'
]);


// por abri el postam diego lo abres des las aplicaciones el se instala como aplicacion :D
//en el navegador? no en el pc esta con que puerto ?8000
