<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_salas';
    protected $fillable = ['id', 'usuario_creador_id', 'usuario_amigo_id', 'grupo_id'];


    public function grupo() {
        return $this->belongsTo('App\Grupo','grupo_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User','usuario_amigo_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User','usuario_creador_id', 'id');
    }

    public function users() {
        return $this->belongsToMany('App\User','mensajes', 'sala_id', 'user_id');
    }

    public function mensajes() {
        return $this->hasMany('App\Mensaje','sala_id','id');
    }


}
