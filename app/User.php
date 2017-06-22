<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Response;
use Mail;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password',
         'rol_id','estado_id','grupo_id',
         'sede_id','tipo_doc_id','num_doc',
         'nombres','apellidos','fecha_nac',
         'profesion','url_foto'
    ];

    public function scopeSearch($query,$filtro) {
        return $query->where('nombres','LIKE', "%$filtro%")
                    ->orWhere('apellidos','LIKE', "%$filtro%")
                    ->orWhere('email','LIKE', "%$filtro%")
                    ->orWhere('num_doc','LIKE', "%$filtro%");
    }

    public function enviarEmailActivacion($datos){

      Mail::send('emails.nuevo-usuario', ['datos' => $datos], function ($msj) use ($datos)
      {
        $msj->subject('Activa tu cuenta de SenaOnHand');
        $msj->from('contacto1.diego@gmail.com', 'SenaOnHand');
        $msj->to($datos['email']);
      });
    }

    public static function getSumPuntajePublicaciones($user_id){
      return DB::table('tb_publicaciones')
                        ->where('user_id', '=', $user_id)
                        ->sum('puntaje');
    }

    public static function getNumPublicacionesCalificadas($user_id){

      return  DB::table('tb_publicaciones')
                        ->where('user_id', '=', $user_id)
                        ->where('cant_cal', '>', 0)
                        ->count();

    }

    // public static function getNumCalificaciones($user_id){
    //
    //   return  DB::table('tb_publicaciones')
    //                     ->where('user_id', '=', $user_id)
    //                     ->where('cant_cal', '>', 0)
    //                     ->count();
    //
    // }
    public static function getNumVisitas($user_id){
      return  DB::table('tb_publicaciones')
                        ->where('user_id', '=', $user_id)
                        ->sum('num_visitas');
    }

    public function getRol(){
      return $this->rol_id;
    }

    public function getEstado(){
      return $this->estado_id;
    }

    public function publicaciones() {
        return $this->hasMany('App\Publicacion');
    }

    public function comentarios() {
        return $this->hasMany('App\Comentario');
    }

    public function rol() {
        return $this->belongsTo('App\Rol','rol_id', 'id');
    }
    public function estado_usuario() {
        return $this->belongsTo('App\EstadoUsuario','estado_id', 'id');
    }

    public function tipo_doc() {
        return $this->belongsTo('App\TipoDoc','tipo_doc_id', 'id');
    }

    public function grupo() {
        return $this->belongsTo('App\Grupo','grupo_id', 'id');
    }
    public function sede() {
        return $this->belongsTo('App\Sede','sede_id', 'id');
    }



    public function categorias() {
            return $this->belongsToMany('App\Categoria', 'usuario_categoria')->withTimestamps();
        }

    public function seguidos() {
        // return $this->belongsToMany('App\User')->withTimestamps();
        return $this->hasMany('App\TbSeguido', 'usuario_seguidor_id', 'id');
    }

    public function seguidores() {
        // return $this->belongsToMany('App\User')->withTimestamps();
        return $this->hasMany('App\TbSeguido', 'usuario_seguido_id', 'id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
