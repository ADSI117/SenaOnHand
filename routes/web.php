<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'PublicPanelController@index');

Route::get('info-mensaje', function(){
  return view ('info-mensaje');
});

Route::get('info-suspendido', function(){
  return view ('info-suspendido');
});

Route::group(['prefix'=>'main-panel'], function (){

  Route::resource('publicaciones', 'PublicacionesController');


});

Route::get('admin', 'AdminController@index');
// para colo colocar rutas con variables solo es necesario colocar un slash y poner dos llaver, dentro contendra la variable, para uqe no sea obligatorio se pone signo de pregunta a lo ultimo, la funcion resibe la variable que creamos dentro de la ruta


//se realiza un grupo para la siguiente ruta, que quiere decir. que para poder acceder a ella se debe pasar por el prefijo. aqui dejo un ejemplo.


 Route::group(['prefix'=>'admin'],function(){

// rutas de TiposDenuncias

Route::resource('tipos_denuncias','TiposDenunciasController');


//Route::get('tipos_denuncias/{id}/destroy',[

	/*'uses'=> 'TiposDenunciasController@destroy',
	'as'=> 'admin.tipos_denuncias.destroy'

	]);*/

 // rutas de EStadosComentarios
Route::resource('estados_comentarios','EstadosComentariosController');
/*Route::get('estados_comentarios/{id}/destroy',[

		'uses' => 'EstadosComentariosController@destroy',
 		'as' => 'admin.estados_comentarios.destroy'

	]);*/

// rutas de Programas
Route::resource('programas','ProgramasController');
/*Route::get('programas/{id}/destroy',[

		'uses' => 'ProgramasController@destroy',
 		'as' => 'admin.programas.destroy'

	]);*/
// rutas de EStadosUsuarios
Route::resource('estados_usuarios','EstadosUsuariosController');
/*Route::get('estados_usuarios/{id}/destroy',[

		'uses' => 'EstadosUsuariosController@destroy',
 		'as' => 'admin.estados_usuarios.destroy'

	]);*/
// rutas de EStadosDenuncias
Route::resource('estados_denuncias','EstadosDenunciasController');
/*Route::get('estados_denuncias/{id}/destroy',[

	'uses'=> 'EstadosDenunciasController@destroy',
	'as'=> 'admin.estados_denuncias.destroy'

	]);*/
// rutas de TiposAnuncios
Route::resource('tipos_anuncios','TiposAnunciosController');
/*Route::get('tipos_anuncios/{id}/destroy',[

	'uses'=> 'TiposAnunciosController@destroy',
	'as'=> 'admin.tipos_anuncios.destroy'

	]);*/
// rutas de TiposDocs
Route::resource('tipos_docs','TiposDocsController');
/*Route::get('tipos_docs/{id}/destroy',[

	'uses'=> 'TiposDocsController@destroy',
	'as'=> 'admin.tipos_docs.destroy'

	]);*/
// rutas de Categorias
Route::resource('categorias','CategoriasController');
/*Route::get('categorias/{id}/destroy',[

	'uses'=> 'CategoriasController@destroy',
	'as'=> 'admin.categorias.destroy'

	]);*/
// rutas de EstadosPublicaciones
Route::resource('estados_publicaciones','EstadosPublicacionesController');
/*Route::get('estados_publicaciones/{id}/destroy',[

	'uses'=> 'EstadosPublicacionesController@destroy',
	'as'=> 'admin.estados_publicaciones.destroy'

	]);*/
// rutas de Roles
Route::resource('roles','RolesController');
/*Route::get('roles/{id}/destroy',[

	'uses'=> 'RolesController@destroy',
	'as'=> 'admin.roles.destroy'

	]);*/
// rutas de Regionales
Route::resource('regionales','RegionalesController');
/*Route::get('regionales/{id}/destroy',[

	'uses'=> 'RegionalesController@destroy',
	'as'=> 'admin.regionales.destroy'

	]);*/
// rutas de Subcategorias
Route::resource('subcategorias','SubcategoriasController');
/*Route::get('subcategorias/{id}/destroy',[

	'uses'=> 'SubcategoriasController@destroy',
	'as'=> 'admin.subcategorias.destroy'

	]);*/
// rutas de Centros
Route::resource('centros','CentrosController');
/*Route::get('centros/{id}/destroy',[

	'uses'=> 'CentrosController@destroy',
	'as'=> 'admin.centros.destroy'

	]);*/
// rutas de Sedes
Route::resource('sedes','SedesController');
/*Route::get('sedes/{id}/destroy',[

	'uses'=> 'SedesController@destroy',
	'as'=> 'admin.sedes.destroy'

	]); */

 });


 Route::get('probar', function(){
 	return 'Hay algo malo?';
 });

Auth::routes();

Route::get('/main-panel', 'MainPanelController@index')->name('main-panel');
