<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_mensajes';
    protected $fillable = ['id', 'usuario_id', 'sala_id', 'mensaje'];


    public function sala() {
        return $this->belongsTo('App\Sala','sala_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User','user_id', 'id');
    }


}
