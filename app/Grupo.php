<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_grupos';
    protected $fillable = ['id', 'programa_id', 'user_id', 'nombre', 'cantidad_est'];


    public function programa() {
        return $this->belongsTo('App\Programa','programa_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User','user_id', 'id');
    }

    public function salas() {
        return $this->hasMany('App\Sala','grupo_id', 'id');
    }


}
