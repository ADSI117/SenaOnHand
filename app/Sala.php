<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_salas';
    protected $fillable = ['id', 'usuario_creador_id', 'usuario_amigo_id', 'grupo_id'];

    public static function encontrarOCrear($sala_id, $usuario_creador_id, $usuario_amigo_id, $grupo_id){

      if($sala_id){
        // echo "Recibi variable sala";
        return Sala::find($sala_id);

      }else if ($usuario_amigo_id){
        // echo "Hay usuario amigo";

        if (Sala::encontrarPorAmigo($usuario_creador_id, $usuario_amigo_id) == null){
          // echo "Crear por amigo";
          return Sala::crearPorAmigo($usuario_creador_id, $usuario_amigo_id);
        }else{
          // echo "Encontrar por amigo";
          return Sala::encontrarPorAmigo($usuario_creador_id, $usuario_amigo_id);
        }


      }else if ($grupo_id){
        return Sala::crearPorGrupo($usuario_creador_id, $grupo_id);
      }

    }

    public static function encontrarPorAmigo($usuario_creador_id, $usuario_amigo_id){
      // echo "--encontrar por amigo";
      return Sala::where('usuario_creador_id', '=', $usuario_creador_id)
                  ->where('usuario_amigo_id', '=', $usuario_amigo_id)
                  ->orWhere('usuario_creador_id', '=', $usuario_amigo_id)
                  ->where('usuario_amigo_id', '=', $usuario_creador_id)
                  ->first();
    }

    public static function crearPorGrupo($usuario_creador_id, $usuario_amigo_id, $grupo_id){
      // return "---fx crear";
      return Sala::create([
        'usuario_creador_id'  =>  $usuario_creador_id,
        'grupo_id'    =>  $grupo_id
      ]);
    }

    public static function crearPorAmigo($usuario_creador_id, $usuario_amigo_id){
      // echo "fx crear por amigo";
      return  Sala::create([
        'usuario_creador_id'  =>  $usuario_creador_id,
        'usuario_amigo_id'    =>  $usuario_amigo_id
      ]);
    }


    public function grupo() {
        return $this->belongsTo('App\Grupo','grupo_id', 'id');
    }

    public function user_amigo() {
        return $this->belongsTo('App\User','usuario_amigo_id', 'id');
    }

    public function user_creador() {
        return $this->belongsTo('App\User','usuario_creador_id', 'id');
    }

    public function users() {
        return $this->belongsToMany('App\User','mensajes', 'sala_id', 'user_id');
    }

    public function mensajes() {
        return $this->hasMany('App\Mensaje','sala_id','id');
    }


}
