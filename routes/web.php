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
use App\Events\PruebaEvento;


Route::get('/', 'PublicPanelController@index');
// Route::get('inicio', 'PublicPanelController@index');

// Para generar enlace de activacion
Route::get('getlink', 'UsuariosController@getLink');

// Activar usuario
Route::get('activar', 'UsuariosController@activarUsuario');

Route::get('info-mensaje', function(){
  return view ('info-mensaje');
});

Route::get('info-suspendido', function(){
  return view ('info-suspendido');
});

Route::group(['prefix'=>'main-panel'], function (){

  Route::resource('publicaciones', 'PublicacionesController');
  Route::resource('usuarios', 'UsuariosController');
  Route::resource('categoria-usuario', 'CategoriasUsuariosController');
  Route::resource('instructores', 'InstructoresController');
  Route::resource('tags', 'TagsController');
  Route::resource('imagenes', 'ImagenesController');
  Route::resource('archivos', 'ArchivosController');
  Route::resource('videos', 'VideosController');
  Route::resource('seguidos', 'SeguidosController');
  Route::resource('mensajes', 'MensajesController');
  Route::resource('notificaciones', 'NotificacionesController');
  Route::resource('suscripciones', 'SeguidosController');
  Route::resource('comentarios', 'ComentariosController');
  Route::resource('denuncias', 'DenunciasController');
  Route::resource('busquedas', 'BusquedasController');
  Route::resource('calificaciones', 'CalificacionesController');
  Route::resource('salas', 'SalasController');
  Route::resource('seguidores', 'SeguidoresController');
  Route::resource('inst-destacados', 'InstructoresDestacadosController');
  Route::resource('admin-usuarios', 'AdminUsuariosController');


});

Route::get('admin', 'AdminController@index');
// para colo colocar rutas con variables solo es necesario colocar un slash y poner dos llaver, dentro contendra la variable, para uqe no sea obligatorio se pone signo de pregunta a lo ultimo, la funcion resibe la variable que creamos dentro de la ruta


//se realiza un grupo para la siguiente ruta, que quiere decir. que para poder acceder a ella se debe pasar por el prefijo. aqui dejo un ejemplo.


 Route::group(['prefix'=>'admin'],function(){

    Route::resource('tipos_denuncias','TiposDenunciasController');

    Route::resource('usuario','UsuarioMController');

    Route::resource('estados_comentarios','EstadosComentariosController');

    Route::resource('programas','ProgramasController');

    Route::resource('estados_usuarios','EstadosUsuariosController');

    Route::resource('estados_denuncias','EstadosDenunciasController');

    Route::resource('tipos_anuncios','TiposAnunciosController');

    Route::resource('tipos_docs','TiposDocsController');

    Route::resource('categorias','CategoriasController');

    Route::resource('estados_publicaciones','EstadosPublicacionesController');

    Route::resource('roles','RolesController');

    Route::resource('regionales','RegionalesController');

    Route::resource('subcategorias','SubcategoriasController');

    Route::resource('centros','CentrosController');

    Route::resource('sedes','SedesController');


 });

Auth::routes();

Route::get('/main-panel', 'MainPanelController@index')->name('main-panel');

Route::get('realtime', function(){
  event(new PruebaEvento('Probando realtime'));
  return 'Corre normal';
});
